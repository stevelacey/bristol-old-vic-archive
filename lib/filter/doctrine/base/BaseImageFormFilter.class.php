<?php

/**
 * Image filter form base class.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseImageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'caption'       => new sfWidgetFormFilterInput(),
      'production_id' => new sfWidgetFormFilterInput(),
      'person_id'     => new sfWidgetFormFilterInput(),
      'path'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'         => new sfValidatorPass(array('required' => false)),
      'caption'       => new sfValidatorPass(array('required' => false)),
      'production_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'person_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'path'          => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('image_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Image';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'title'         => 'Text',
      'caption'       => 'Text',
      'production_id' => 'Number',
      'person_id'     => 'Number',
      'path'          => 'Text',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
      'slug'          => 'Text',
    );
  }
}
