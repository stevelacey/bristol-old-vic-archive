<?php

/**
 * Donation form base class.
 *
 * @method Donation getObject() Returns the current form's model object
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseDonationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'production_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Production'), 'add_empty' => false)),
      'sponsor_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sponsor'), 'add_empty' => false)),
      'amount'        => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'production_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Production'))),
      'sponsor_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Sponsor'))),
      'amount'        => new sfValidatorNumber(array('required' => false)),
      'description'   => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('donation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Donation';
  }

}
