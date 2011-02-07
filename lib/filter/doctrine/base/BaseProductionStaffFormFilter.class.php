<?php

/**
 * ProductionStaff filter form base class.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseProductionStaffFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'production_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Production'), 'add_empty' => true)),
      'role_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Role'), 'add_empty' => true)),
      'staff_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Staff'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'production_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Production'), 'column' => 'id')),
      'role_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Role'), 'column' => 'id')),
      'staff_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Staff'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('production_staff_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductionStaff';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'production_id' => 'ForeignKey',
      'role_id'       => 'ForeignKey',
      'staff_id'      => 'ForeignKey',
    );
  }
}
