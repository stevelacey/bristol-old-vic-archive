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

    $this->widgetSchema->setNameFormat('staff[%s]');
  }

  public function getModelName()
  {
    return 'Staff';
  }

}
