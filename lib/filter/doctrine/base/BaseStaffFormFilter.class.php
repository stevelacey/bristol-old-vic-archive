<?php

/**
 * Staff filter form base class.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseStaffFormFilter extends PersonFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['productions_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Production'));
    $this->validatorSchema['productions_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Production', 'required' => false));

    $this->widgetSchema   ['roles_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Role'));
    $this->validatorSchema['roles_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Role', 'required' => false));

    $this->widgetSchema   ['role_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Role'));
    $this->validatorSchema['role_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Role', 'required' => false));

    $this->widgetSchema->setNameFormat('staff_filters[%s]');
  }

  public function addProductionsListColumnQuery(Doctrine_Query $query, $field, $values)
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

  public function addRolesListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('ProductionStaff.role_id', $values)
    ;
  }

  public function addRoleListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('ProductionStaff.role_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Staff';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'productions_list' => 'ManyKey',
      'roles_list' => 'ManyKey',
      'role_list' => 'ManyKey',
    ));
  }
}
