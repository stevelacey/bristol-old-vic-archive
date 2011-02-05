<?php

/**
 * Performer form base class.
 *
 * @method Performer getObject() Returns the current form's model object
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BasePerformerForm extends PersonForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['gender'] = new sfWidgetFormChoice(array('choices' => array('Male' => 'Male', 'Female' => 'Female')));
    $this->validatorSchema['gender'] = new sfValidatorChoice(array('choices' => array(0 => 'Male', 1 => 'Female')));

    $this->widgetSchema->setNameFormat('performer[%s]');
  }

  public function getModelName()
  {
    return 'Performer';
  }

}
