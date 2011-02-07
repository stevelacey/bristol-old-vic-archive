<?php

/**
 * ProductionStaff form base class.
 *
 * @method ProductionStaff getObject() Returns the current form's model object
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseProductionStaffForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'production_id' => new sfWidgetFormInputHidden(),
      'role_id'       => new sfWidgetFormInputHidden(),
      'staff_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Staff'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'production_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('production_id')), 'empty_value' => $this->getObject()->get('production_id'), 'required' => false)),
      'role_id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('role_id')), 'empty_value' => $this->getObject()->get('role_id'), 'required' => false)),
      'staff_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Staff'))),
    ));

    $this->widgetSchema->setNameFormat('production_staff[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductionStaff';
  }

}
