<?php

/**
 * Show form base class.
 *
 * @method Show getObject() Returns the current form's model object
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseShowForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'performance_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Performance'), 'add_empty' => false)),
      'show_at'                    => new sfWidgetFormDateTime(),
      'adult_tickets_sold'         => new sfWidgetFormInputText(),
      'adult_attendees'            => new sfWidgetFormInputText(),
      'child_tickets_sold'         => new sfWidgetFormInputText(),
      'child_attendees'            => new sfWidgetFormInputText(),
      'complimentary_tickets_sold' => new sfWidgetFormInputText(),
      'student_tickets_sold'       => new sfWidgetFormInputText(),
      'student_attendees'          => new sfWidgetFormInputText(),
      'created_at'                 => new sfWidgetFormDateTime(),
      'updated_at'                 => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'performance_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Performance'))),
      'show_at'                    => new sfValidatorDateTime(),
      'adult_tickets_sold'         => new sfValidatorInteger(array('required' => false)),
      'adult_attendees'            => new sfValidatorInteger(array('required' => false)),
      'child_tickets_sold'         => new sfValidatorInteger(array('required' => false)),
      'child_attendees'            => new sfValidatorInteger(array('required' => false)),
      'complimentary_tickets_sold' => new sfValidatorInteger(array('required' => false)),
      'student_tickets_sold'       => new sfValidatorInteger(array('required' => false)),
      'student_attendees'          => new sfValidatorInteger(array('required' => false)),
      'created_at'                 => new sfValidatorDateTime(),
      'updated_at'                 => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('show[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Show';
  }

}
