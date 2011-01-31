<?php

/**
 * Show filter form base class.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseShowFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'performance_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Performance'), 'add_empty' => true)),
      'show_at'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'adult_tickets_sold'         => new sfWidgetFormFilterInput(),
      'adult_attendees'            => new sfWidgetFormFilterInput(),
      'child_tickets_sold'         => new sfWidgetFormFilterInput(),
      'child_attendees'            => new sfWidgetFormFilterInput(),
      'complimentary_tickets_sold' => new sfWidgetFormFilterInput(),
      'student_tickets_sold'       => new sfWidgetFormFilterInput(),
      'student_attendees'          => new sfWidgetFormFilterInput(),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'performance_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Performance'), 'column' => 'id')),
      'show_at'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'adult_tickets_sold'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'adult_attendees'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'child_tickets_sold'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'child_attendees'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'complimentary_tickets_sold' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'student_tickets_sold'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'student_attendees'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('show_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Show';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'performance_id'             => 'ForeignKey',
      'show_at'                    => 'Date',
      'adult_tickets_sold'         => 'Number',
      'adult_attendees'            => 'Number',
      'child_tickets_sold'         => 'Number',
      'child_attendees'            => 'Number',
      'complimentary_tickets_sold' => 'Number',
      'student_tickets_sold'       => 'Number',
      'student_attendees'          => 'Number',
      'created_at'                 => 'Date',
      'updated_at'                 => 'Date',
    );
  }
}
