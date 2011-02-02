<?php

/**
 * ProductionType form base class.
 *
 * @method ProductionType getObject() Returns the current form's model object
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseProductionTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'production_id' => new sfWidgetFormInputHidden(),
      'type_id'       => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'production_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('production_id')), 'empty_value' => $this->getObject()->get('production_id'), 'required' => false)),
      'type_id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('type_id')), 'empty_value' => $this->getObject()->get('type_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('production_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductionType';
  }

}
