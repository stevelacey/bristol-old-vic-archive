<?php

/**
 * Venue form base class.
 *
 * @method Venue getObject() Returns the current form's model object
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseVenueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'name'           => new sfWidgetFormInputText(),
      'email'          => new sfWidgetFormInputText(),
      'telephone'      => new sfWidgetFormInputText(),
      'mobile'         => new sfWidgetFormInputText(),
      'address_line_1' => new sfWidgetFormInputText(),
      'address_line_2' => new sfWidgetFormInputText(),
      'address_line_3' => new sfWidgetFormInputText(),
      'address_line_4' => new sfWidgetFormInputText(),
      'post_code'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'           => new sfValidatorString(array('max_length' => 255)),
      'email'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telephone'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mobile'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address_line_1' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address_line_2' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address_line_3' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address_line_4' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'post_code'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('venue[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Venue';
  }

}
