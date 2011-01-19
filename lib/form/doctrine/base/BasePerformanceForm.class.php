<?php

/**
 * Performance form base class.
 *
 * @method Performance getObject() Returns the current form's model object
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BasePerformanceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                              => new sfWidgetFormInputHidden(),
      'production_id'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Production'), 'add_empty' => false)),
      'venue_id'                        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Venue'), 'add_empty' => false)),
      'adult_tickets_available'         => new sfWidgetFormInputText(),
      'adult_ticket_price'              => new sfWidgetFormInputText(),
      'child_tickets_available'         => new sfWidgetFormInputText(),
      'child_ticket_price'              => new sfWidgetFormInputText(),
      'complimentary_tickets_available' => new sfWidgetFormInputText(),
      'student_tickets_available'       => new sfWidgetFormInputText(),
      'student_ticket_price'            => new sfWidgetFormInputText(),
      'setup_at'                        => new sfWidgetFormDateTime(),
      'created_at'                      => new sfWidgetFormDateTime(),
      'updated_at'                      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'production_id'                   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Production'))),
      'venue_id'                        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Venue'))),
      'adult_tickets_available'         => new sfValidatorInteger(array('required' => false)),
      'adult_ticket_price'              => new sfValidatorNumber(array('required' => false)),
      'child_tickets_available'         => new sfValidatorInteger(array('required' => false)),
      'child_ticket_price'              => new sfValidatorNumber(array('required' => false)),
      'complimentary_tickets_available' => new sfValidatorInteger(array('required' => false)),
      'student_tickets_available'       => new sfValidatorInteger(array('required' => false)),
      'student_ticket_price'            => new sfValidatorNumber(array('required' => false)),
      'setup_at'                        => new sfValidatorDateTime(array('required' => false)),
      'created_at'                      => new sfValidatorDateTime(),
      'updated_at'                      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('performance[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Performance';
  }

}
