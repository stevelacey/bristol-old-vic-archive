<?php

/**
 * Performer filter form base class.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BasePerformerFormFilter extends PersonFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['gender'] = new sfWidgetFormChoice(array('choices' => array('' => '', 'Male' => 'Male', 'Female' => 'Female')));
    $this->validatorSchema['gender'] = new sfValidatorChoice(array('required' => false, 'choices' => array('Male' => 'Male', 'Female' => 'Female')));

    $this->widgetSchema->setNameFormat('performer_filters[%s]');
  }

  public function getModelName()
  {
    return 'Performer';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'gender' => 'Enum',
    ));
  }
}
