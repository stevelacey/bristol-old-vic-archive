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
      'id'                             => new sfWidgetFormInputHidden(),
      'name'                           => new sfWidgetFormInputText(),
      'type_id'                        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'add_empty' => true)),
      'genre_id'                       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Genre'), 'add_empty' => true)),
      'layout_id'                      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Layout'), 'add_empty' => true)),
      'company_id'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Company'), 'add_empty' => true)),
      'collaboration_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Collaboration'), 'add_empty' => true)),
      'shot_image_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Shot'), 'add_empty' => true)),
      'set_design_image_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SetDesign'), 'add_empty' => true)),
      'description'                    => new sfWidgetFormTextarea(),
      'start_at'                       => new sfWidgetFormDateTime(),
      'end_at'                         => new sfWidgetFormDateTime(),
      'number_of_performances'         => new sfWidgetFormInputText(),
      'matinee_performance_time'       => new sfWidgetFormTime(),
      'evening_performance_time'       => new sfWidgetFormTime(),
      'various_performance_times'      => new sfWidgetFormInputCheckbox(),
      'seating'                        => new sfWidgetFormChoice(array('choices' => array('Reserved' => 'Reserved', 'Partially Reserved' => 'Partially Reserved', 'Not Reserved' => 'Not Reserved'))),
      'fundraiser'                     => new sfWidgetFormInputCheckbox(),
      'full_ticket_min_price'          => new sfWidgetFormInputText(),
      'full_ticket_max_price'          => new sfWidgetFormInputText(),
      'concessionary_ticket_min_price' => new sfWidgetFormInputText(),
      'concessionary_ticket_max_price' => new sfWidgetFormInputText(),
      'notes'                          => new sfWidgetFormTextarea(),
      'complete'                       => new sfWidgetFormInputCheckbox(),
      'created_at'                     => new sfWidgetFormDateTime(),
      'updated_at'                     => new sfWidgetFormDateTime(),
      'staff_list'                     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Staff')),
      'roles_list'                     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Role')),
      'funders_list'                   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Funder')),
    ));

    $this->setValidators(array(
      'id'                             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                           => new sfValidatorString(array('max_length' => 255)),
      'type_id'                        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'required' => false)),
      'genre_id'                       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Genre'), 'required' => false)),
      'layout_id'                      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Layout'), 'required' => false)),
      'company_id'                     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Company'), 'required' => false)),
      'collaboration_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Collaboration'), 'required' => false)),
      'shot_image_id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Shot'), 'required' => false)),
      'set_design_image_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SetDesign'), 'required' => false)),
      'description'                    => new sfValidatorString(array('required' => false)),
      'start_at'                       => new sfValidatorDateTime(array('required' => false)),
      'end_at'                         => new sfValidatorDateTime(array('required' => false)),
      'number_of_performances'         => new sfValidatorInteger(array('required' => false)),
      'matinee_performance_time'       => new sfValidatorTime(array('required' => false)),
      'evening_performance_time'       => new sfValidatorTime(array('required' => false)),
      'various_performance_times'      => new sfValidatorBoolean(array('required' => false)),
      'seating'                        => new sfValidatorChoice(array('choices' => array(0 => 'Reserved', 1 => 'Partially Reserved', 2 => 'Not Reserved'), 'required' => false)),
      'fundraiser'                     => new sfValidatorBoolean(array('required' => false)),
      'full_ticket_min_price'          => new sfValidatorNumber(array('required' => false)),
      'full_ticket_max_price'          => new sfValidatorNumber(array('required' => false)),
      'concessionary_ticket_min_price' => new sfValidatorNumber(array('required' => false)),
      'concessionary_ticket_max_price' => new sfValidatorNumber(array('required' => false)),
      'notes'                          => new sfValidatorString(array('required' => false)),
      'complete'                       => new sfValidatorBoolean(array('required' => false)),
      'created_at'                     => new sfValidatorDateTime(),
      'updated_at'                     => new sfValidatorDateTime(),
      'staff_list'                     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Staff', 'required' => false)),
      'roles_list'                     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Role', 'required' => false)),
      'funders_list'                   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Funder', 'required' => false)),
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

    if (isset($this->widgetSchema['funders_list']))
    {
      $this->setDefault('funders_list', $this->object->Funders->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveStaffList($con);
    $this->saveRolesList($con);
    $this->saveFundersList($con);

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

  public function saveFundersList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['funders_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Funders->getPrimaryKeys();
    $values = $this->getValue('funders_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Funders', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Funders', array_values($link));
    }
  }

}
