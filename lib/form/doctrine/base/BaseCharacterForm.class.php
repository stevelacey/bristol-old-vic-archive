<?php

/**
 * Character form base class.
 *
 * @method Character getObject() Returns the current form's model object
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseCharacterForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInputText(),
      'gender'        => new sfWidgetFormChoice(array('choices' => array('Male' => 'Male', 'Female' => 'Female'))),
      'performer_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Performer'), 'add_empty' => false)),
      'production_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Production'), 'add_empty' => false)),
      'image_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Image'), 'add_empty' => true)),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 255)),
      'gender'        => new sfValidatorChoice(array('choices' => array(0 => 'Male', 1 => 'Female'))),
      'performer_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Performer'))),
      'production_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Production'))),
      'image_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Image'), 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('character[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Character';
  }

}
