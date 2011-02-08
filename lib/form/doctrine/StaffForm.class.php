<?php

/**
 * Staff form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
class StaffForm extends BaseStaffForm {
  /**
   * @see PersonForm
   */
  public function configure() {
    parent::configure();
    
    unset($this['productions_list'], $this['roles_list']);
  }
}