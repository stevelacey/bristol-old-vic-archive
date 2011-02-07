<?php

/**
 * Role form base class.
 *
 * @method Role getObject() Returns the current form's model object
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseRoleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInputText(),
      'department_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => false)),
      'staff_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Staff')),
      'production_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Production')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 255)),
      'department_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Department'))),
      'staff_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Staff', 'required' => false)),
      'production_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Production', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Role', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('role[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Role';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['staff_list']))
    {
      $this->setDefault('staff_list', $this->object->Staff->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['production_list']))
    {
      $this->setDefault('production_list', $this->object->Production->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveStaffList($con);
    $this->saveProductionList($con);

    parent::doSave($con);
  }

  public function saveStaffList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['staff_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Staff->getPrimaryKeys();
    $values = $this->getValue('staff_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Staff', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Staff', array_values($link));
    }
  }

  public function saveProductionList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['production_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Production->getPrimaryKeys();
    $values = $this->getValue('production_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Production', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Production', array_values($link));
    }
  }

}
