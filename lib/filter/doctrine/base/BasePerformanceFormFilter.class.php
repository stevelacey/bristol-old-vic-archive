<?php

/**
 * Performance filter form base class.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BasePerformanceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'production_id'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Production'), 'add_empty' => true)),
      'venue_id'                        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Venue'), 'add_empty' => true)),
      'adult_tickets_available'         => new sfWidgetFormFilterInput(),
      'adult_ticket_price'              => new sfWidgetFormFilterInput(),
      'child_tickets_available'         => new sfWidgetFormFilterInput(),
      'child_ticket_price'              => new sfWidgetFormFilterInput(),
      'complimentary_tickets_available' => new sfWidgetFormFilterInput(),
      'student_tickets_available'       => new sfWidgetFormFilterInput(),
      'student_ticket_price'            => new sfWidgetFormFilterInput(),
      'setup_at'                        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'production_id'                   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Production'), 'column' => 'id')),
      'venue_id'                        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Venue'), 'column' => 'id')),
      'adult_tickets_available'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'adult_ticket_price'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'child_tickets_available'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'child_ticket_price'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'complimentary_tickets_available' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'student_tickets_available'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'student_ticket_price'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'setup_at'                        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('performance_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Performance';
  }

  public function getFields()
  {
    return array(
      'id'                              => 'Number',
      'production_id'                   => 'ForeignKey',
      'venue_id'                        => 'ForeignKey',
      'adult_tickets_available'         => 'Number',
      'adult_ticket_price'              => 'Number',
      'child_tickets_available'         => 'Number',
      'child_ticket_price'              => 'Number',
      'complimentary_tickets_available' => 'Number',
      'student_tickets_available'       => 'Number',
      'student_ticket_price'            => 'Number',
      'setup_at'                        => 'Date',
      'created_at'                      => 'Date',
      'updated_at'                      => 'Date',
    );
  }
}
