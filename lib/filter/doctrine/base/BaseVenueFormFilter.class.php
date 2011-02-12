<?php

/**
 * Venue filter form base class.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseVenueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'          => new sfWidgetFormFilterInput(),
      'telephone'      => new sfWidgetFormFilterInput(),
      'mobile'         => new sfWidgetFormFilterInput(),
      'address_line_1' => new sfWidgetFormFilterInput(),
      'address_line_2' => new sfWidgetFormFilterInput(),
      'address_line_3' => new sfWidgetFormFilterInput(),
      'address_line_4' => new sfWidgetFormFilterInput(),
      'post_code'      => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'           => new sfValidatorPass(array('required' => false)),
      'email'          => new sfValidatorPass(array('required' => false)),
      'telephone'      => new sfValidatorPass(array('required' => false)),
      'mobile'         => new sfValidatorPass(array('required' => false)),
      'address_line_1' => new sfValidatorPass(array('required' => false)),
      'address_line_2' => new sfValidatorPass(array('required' => false)),
      'address_line_3' => new sfValidatorPass(array('required' => false)),
      'address_line_4' => new sfValidatorPass(array('required' => false)),
      'post_code'      => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('venue_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Venue';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'name'           => 'Text',
      'email'          => 'Text',
      'telephone'      => 'Text',
      'mobile'         => 'Text',
      'address_line_1' => 'Text',
      'address_line_2' => 'Text',
      'address_line_3' => 'Text',
      'address_line_4' => 'Text',
      'post_code'      => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
