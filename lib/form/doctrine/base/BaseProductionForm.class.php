<?php

/**
 * Production form base class.
 *
 * @method Production getObject() Returns the current form's model object
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseProductionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'name'                   => new sfWidgetFormInputText(),
      'type_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'add_empty' => true)),
      'genre_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Genre'), 'add_empty' => true)),
      'layout_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Layout'), 'add_empty' => true)),
      'company_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Company'), 'add_empty' => true)),
      'collaboration_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Collaboration'), 'add_empty' => true)),
      'image_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Image'), 'add_empty' => true)),
      'description'            => new sfWidgetFormTextarea(),
      'start_at'               => new sfWidgetFormDateTime(),
      'end_at'                 => new sfWidgetFormDateTime(),
      'number_of_performances' => new sfWidgetFormInputText(),
      'fundraiser'             => new sfWidgetFormInputCheckbox(),
      'adult_ticket_price'     => new sfWidgetFormInputText(),
      'child_ticket_price'     => new sfWidgetFormInputText(),
      'student_ticket_price'   => new sfWidgetFormInputText(),
      'notes'                  => new sfWidgetFormTextarea(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
      'staff_list'             => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Staff')),
      'roles_list'             => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Role')),
      'sponsors_list'          => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Sponsor')),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                   => new sfValidatorString(array('max_length' => 255)),
      'type_id'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'required' => false)),
      'genre_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Genre'), 'required' => false)),
      'layout_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Layout'), 'required' => false)),
      'company_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Company'), 'required' => false)),
      'collaboration_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Collaboration'), 'required' => false)),
      'image_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Image'), 'required' => false)),
      'description'            => new sfValidatorString(array('required' => false)),
      'start_at'               => new sfValidatorDateTime(array('required' => false)),
      'end_at'                 => new sfValidatorDateTime(array('required' => false)),
      'number_of_performances' => new sfValidatorInteger(array('required' => false)),
      'fundraiser'             => new sfValidatorBoolean(array('required' => false)),
      'adult_ticket_price'     => new sfValidatorNumber(array('required' => false)),
      'child_ticket_price'     => new sfValidatorNumber(array('required' => false)),
      'student_ticket_price'   => new sfValidatorNumber(array('required' => false)),
      'notes'                  => new sfValidatorString(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(),
      'updated_at'             => new sfValidatorDateTime(),
      'staff_list'             => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Staff', 'required' => false)),
      'roles_list'             => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Role', 'required' => false)),
      'sponsors_list'          => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Sponsor', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('production[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Production';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['staff_list']))
    {
      $this->setDefault('staff_list', $this->object->Staff->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['roles_list']))
    {
      $this->setDefault('roles_list', $this->object->Roles->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['sponsors_list']))
    {
      $this->setDefault('sponsors_list', $this->object->Sponsors->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveStaffList($con);
    $this->saveRolesList($con);
    $this->saveSponsorsList($con);

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

  public function saveSponsorsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sponsors_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Sponsors->getPrimaryKeys();
    $values = $this->getValue('sponsors_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Sponsors', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Sponsors', array_values($link));
    }
  }

}
