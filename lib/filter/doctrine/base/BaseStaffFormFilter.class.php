<?php

/**
 * Staff filter form base class.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseStaffFormFilter extends PersonFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('staff_filters[%s]');
  }

  public function getModelName()
  {
    return 'Staff';
  }
}
