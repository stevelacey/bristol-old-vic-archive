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
      'name'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'layout_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Layout'), 'add_empty' => true)),
      'type_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'add_empty' => true)),
      'genre_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Genre'), 'add_empty' => true)),
      'image_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Image'), 'add_empty' => true)),
      'company_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Company'), 'add_empty' => true)),
      'director_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Director'), 'add_empty' => true)),
      'producer_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Producer'), 'add_empty' => true)),
      'technician_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Technician'), 'add_empty' => true)),
      'description'          => new sfWidgetFormFilterInput(),
      'booking_status'       => new sfWidgetFormFilterInput(),
      'contract_details'     => new sfWidgetFormFilterInput(),
      'collaboration_nature' => new sfWidgetFormFilterInput(),
      'start_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'end_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fundraiser'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'adult_ticket_price'   => new sfWidgetFormFilterInput(),
      'child_ticket_price'   => new sfWidgetFormFilterInput(),
      'student_ticket_price' => new sfWidgetFormFilterInput(),
      'funding'              => new sfWidgetFormFilterInput(),
      'notes'                => new sfWidgetFormFilterInput(),
      'gross_income'         => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'sponsors_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Sponsor')),
    ));

    $this->setValidators(array(
      'name'                 => new sfValidatorPass(array('required' => false)),
      'layout_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Layout'), 'column' => 'id')),
      'type_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Type'), 'column' => 'id')),
      'genre_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Genre'), 'column' => 'id')),
      'image_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Image'), 'column' => 'id')),
      'company_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Company'), 'column' => 'id')),
      'director_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Director'), 'column' => 'id')),
      'producer_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Producer'), 'column' => 'id')),
      'technician_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Technician'), 'column' => 'id')),
      'description'          => new sfValidatorPass(array('required' => false)),
      'booking_status'       => new sfValidatorPass(array('required' => false)),
      'contract_details'     => new sfValidatorPass(array('required' => false)),
      'collaboration_nature' => new sfValidatorPass(array('required' => false)),
      'start_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'end_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fundraiser'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'adult_ticket_price'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'child_ticket_price'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'student_ticket_price' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'funding'              => new sfValidatorPass(array('required' => false)),
      'notes'                => new sfValidatorPass(array('required' => false)),
      'gross_income'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'sponsors_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Sponsor', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('production_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addSponsorsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.ProductionSponsor ProductionSponsor')
      ->andWhereIn('ProductionSponsor.sponsor_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Production';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'name'                 => 'Text',
      'layout_id'            => 'ForeignKey',
      'type_id'              => 'ForeignKey',
      'genre_id'             => 'ForeignKey',
      'image_id'             => 'ForeignKey',
      'company_id'           => 'ForeignKey',
      'director_id'          => 'ForeignKey',
      'producer_id'          => 'ForeignKey',
      'technician_id'        => 'ForeignKey',
      'description'          => 'Text',
      'booking_status'       => 'Text',
      'contract_details'     => 'Text',
      'collaboration_nature' => 'Text',
      'start_at'             => 'Date',
      'end_at'               => 'Date',
      'fundraiser'           => 'Boolean',
      'adult_ticket_price'   => 'Number',
      'child_ticket_price'   => 'Number',
      'student_ticket_price' => 'Number',
      'funding'              => 'Text',
      'notes'                => 'Text',
      'gross_income'         => 'Number',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'sponsors_list'        => 'ManyKey',
    );
  }
}
