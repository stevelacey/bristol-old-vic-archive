<?php

/**
 * ProductionSponsor form base class.
 *
 * @method ProductionSponsor getObject() Returns the current form's model object
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseProductionSponsorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'production_id' => new sfWidgetFormInputHidden(),
      'sponsor_id'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'production_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('production_id')), 'empty_value' => $this->getObject()->get('production_id'), 'required' => false)),
      'sponsor_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('sponsor_id')), 'empty_value' => $this->getObject()->get('sponsor_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('production_sponsor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductionSponsor';
  }

}
