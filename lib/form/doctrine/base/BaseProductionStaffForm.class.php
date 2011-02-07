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
      'id'            => new sfWidgetFormInputHidden(),
      'production_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Production'), 'add_empty' => false)),
      'role_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Role'), 'add_empty' => false)),
      'staff_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Staff'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'production_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Production'))),
      'role_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Role'))),
      'staff_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Staff'))),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ProductionStaff', 'column' => array('production_id', 'role_id')))
    );

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
