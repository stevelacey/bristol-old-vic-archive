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
      'id'                   => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormInputText(),
      'pvm_code'             => new sfWidgetFormInputText(),
      'type_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'add_empty' => true)),
      'genre_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Genre'), 'add_empty' => true)),
      'image_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Image'), 'add_empty' => true)),
      'company_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Company'), 'add_empty' => true)),
      'director_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Director'), 'add_empty' => true)),
      'producer_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Producer'), 'add_empty' => true)),
      'technician_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Technician'), 'add_empty' => true)),
      'description'          => new sfWidgetFormTextarea(),
      'booking_status'       => new sfWidgetFormTextarea(),
      'contract_details'     => new sfWidgetFormTextarea(),
      'collaboration_nature' => new sfWidgetFormTextarea(),
      'funding'              => new sfWidgetFormTextarea(),
      'notes'                => new sfWidgetFormTextarea(),
      'gross_income'         => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'sponsors_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Sponsor')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                 => new sfValidatorString(array('max_length' => 255)),
      'pvm_code'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'type_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'required' => false)),
      'genre_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Genre'), 'required' => false)),
      'image_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Image'), 'required' => false)),
      'company_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Company'), 'required' => false)),
      'director_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Director'), 'required' => false)),
      'producer_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Producer'), 'required' => false)),
      'technician_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Technician'), 'required' => false)),
      'description'          => new sfValidatorString(array('required' => false)),
      'booking_status'       => new sfValidatorString(array('required' => false)),
      'contract_details'     => new sfValidatorString(array('required' => false)),
      'collaboration_nature' => new sfValidatorString(array('required' => false)),
      'funding'              => new sfValidatorString(array('required' => false)),
      'notes'                => new sfValidatorString(array('required' => false)),
      'gross_income'         => new sfValidatorNumber(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
      'sponsors_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Sponsor', 'required' => false)),
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

    if (isset($this->widgetSchema['sponsors_list']))
    {
      $this->setDefault('sponsors_list', $this->object->Sponsors->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveSponsorsList($con);

    parent::doSave($con);
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
