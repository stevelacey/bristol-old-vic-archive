<?php

/**
 * Staff form base class.
 *
 * @method Staff getObject() Returns the current form's model object
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseStaffForm extends PersonForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['productions_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Production'));
    $this->validatorSchema['productions_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Production', 'required' => false));

    $this->widgetSchema   ['roles_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Role'));
    $this->validatorSchema['roles_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Role', 'required' => false));

    $this->widgetSchema->setNameFormat('staff[%s]');
  }

  public function getModelName()
  {
    return 'Staff';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['productions_list']))
    {
      $this->setDefault('productions_list', $this->object->Productions->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['roles_list']))
    {
      $this->setDefault('roles_list', $this->object->Roles->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveProductionsList($con);
    $this->saveRolesList($con);

    parent::doSave($con);
  }

  public function saveProductionsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['productions_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Productions->getPrimaryKeys();
    $values = $this->getValue('productions_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Productions', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Productions', array_values($link));
    }
  }

  public function saveRolesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['roles_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Roles->getPrimaryKeys();
    $values = $this->getValue('roles_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Roles', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Roles', array_values($link));
    }
  }

}
