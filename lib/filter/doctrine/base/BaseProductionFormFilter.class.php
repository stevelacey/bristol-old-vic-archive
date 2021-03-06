<?php

/**
 * Production filter form base class.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseProductionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type_id'                        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'add_empty' => true)),
      'genre_id'                       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Genre'), 'add_empty' => true)),
      'layout_id'                      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Layout'), 'add_empty' => true)),
      'company_id'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Company'), 'add_empty' => true)),
      'collaboration_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Collaboration'), 'add_empty' => true)),
      'shot_image_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Shot'), 'add_empty' => true)),
      'set_design_image_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SetDesign'), 'add_empty' => true)),
      'description'                    => new sfWidgetFormFilterInput(),
      'start_at'                       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'end_at'                         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'number_of_performances'         => new sfWidgetFormFilterInput(),
      'matinee_performance_time'       => new sfWidgetFormFilterInput(),
      'evening_performance_time'       => new sfWidgetFormFilterInput(),
      'various_performance_times'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'seating'                        => new sfWidgetFormChoice(array('choices' => array('' => '', 'Reserved' => 'Reserved', 'Partially Reserved' => 'Partially Reserved', 'Not Reserved' => 'Not Reserved'))),
      'fundraiser'                     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'full_ticket_min_price'          => new sfWidgetFormFilterInput(),
      'full_ticket_max_price'          => new sfWidgetFormFilterInput(),
      'concessionary_ticket_min_price' => new sfWidgetFormFilterInput(),
      'concessionary_ticket_max_price' => new sfWidgetFormFilterInput(),
      'notes'                          => new sfWidgetFormFilterInput(),
      'complete'                       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'                     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'staff_list'                     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Staff')),
      'roles_list'                     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Role')),
      'funders_list'                   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Funder')),
    ));

    $this->setValidators(array(
      'name'                           => new sfValidatorPass(array('required' => false)),
      'type_id'                        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Type'), 'column' => 'id')),
      'genre_id'                       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Genre'), 'column' => 'id')),
      'layout_id'                      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Layout'), 'column' => 'id')),
      'company_id'                     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Company'), 'column' => 'id')),
      'collaboration_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Collaboration'), 'column' => 'id')),
      'shot_image_id'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Shot'), 'column' => 'id')),
      'set_design_image_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SetDesign'), 'column' => 'id')),
      'description'                    => new sfValidatorPass(array('required' => false)),
      'start_at'                       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'end_at'                         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'number_of_performances'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'matinee_performance_time'       => new sfValidatorPass(array('required' => false)),
      'evening_performance_time'       => new sfValidatorPass(array('required' => false)),
      'various_performance_times'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'seating'                        => new sfValidatorChoice(array('required' => false, 'choices' => array('Reserved' => 'Reserved', 'Partially Reserved' => 'Partially Reserved', 'Not Reserved' => 'Not Reserved'))),
      'fundraiser'                     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'full_ticket_min_price'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'full_ticket_max_price'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'concessionary_ticket_min_price' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'concessionary_ticket_max_price' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'notes'                          => new sfValidatorPass(array('required' => false)),
      'complete'                       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'                     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'staff_list'                     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Staff', 'required' => false)),
      'roles_list'                     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Role', 'required' => false)),
      'funders_list'                   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Funder', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('production_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addStaffListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ProductionStaff ProductionStaff')
      ->andWhereIn('ProductionStaff.staff_id', $values)
    ;
  }

  public function addRolesListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ProductionStaff ProductionStaff')
      ->andWhereIn('ProductionStaff.role_id', $values)
    ;
  }

  public function addFundersListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.Donation Donation')
      ->andWhereIn('Donation.funder_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Production';
  }

  public function getFields()
  {
    return array(
      'id'                             => 'Number',
      'name'                           => 'Text',
      'type_id'                        => 'ForeignKey',
      'genre_id'                       => 'ForeignKey',
      'layout_id'                      => 'ForeignKey',
      'company_id'                     => 'ForeignKey',
      'collaboration_id'               => 'ForeignKey',
      'shot_image_id'                  => 'ForeignKey',
      'set_design_image_id'            => 'ForeignKey',
      'description'                    => 'Text',
      'start_at'                       => 'Date',
      'end_at'                         => 'Date',
      'number_of_performances'         => 'Number',
      'matinee_performance_time'       => 'Text',
      'evening_performance_time'       => 'Text',
      'various_performance_times'      => 'Boolean',
      'seating'                        => 'Enum',
      'fundraiser'                     => 'Boolean',
      'full_ticket_min_price'          => 'Number',
      'full_ticket_max_price'          => 'Number',
      'concessionary_ticket_min_price' => 'Number',
      'concessionary_ticket_max_price' => 'Number',
      'notes'                          => 'Text',
      'complete'                       => 'Boolean',
      'created_at'                     => 'Date',
      'updated_at'                     => 'Date',
      'staff_list'                     => 'ManyKey',
      'roles_list'                     => 'ManyKey',
      'funders_list'                   => 'ManyKey',
    );
  }
}
