<?php

/**
 * Role filter form base class.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseRoleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'department_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true)),
      'staff_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Staff')),
      'production_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Production')),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorPass(array('required' => false)),
      'department_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Department'), 'column' => 'id')),
      'staff_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Staff', 'required' => false)),
      'production_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Production', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('role_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addStaffListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ProductionStaff ProductionStaff')
      ->andWhereIn('ProductionStaff.staff_id', $values)
    ;
  }

  public function addProductionListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ProductionStaff ProductionStaff')
      ->andWhereIn('ProductionStaff.production_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Role';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'name'            => 'Text',
      'department_id'   => 'ForeignKey',
      'staff_list'      => 'ManyKey',
      'production_list' => 'ManyKey',
    );
  }
}
