<?php

/**
 * Image form base class.
 *
 * @method Image getObject() Returns the current form's model object
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseImageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'title'         => new sfWidgetFormInputText(),
      'caption'       => new sfWidgetFormInputText(),
      'production_id' => new sfWidgetFormInputText(),
      'person_id'     => new sfWidgetFormInputText(),
      'path'          => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'slug'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'         => new sfValidatorString(array('max_length' => 255)),
      'caption'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'production_id' => new sfValidatorInteger(array('required' => false)),
      'person_id'     => new sfValidatorInteger(array('required' => false)),
      'path'          => new sfValidatorString(array('max_length' => 255)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'slug'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Image', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('image[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Image';
  }

}
