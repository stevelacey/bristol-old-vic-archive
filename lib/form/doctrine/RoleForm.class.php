<?php

/**
 * Role form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
class RoleForm extends BaseRoleForm {
  public function configure() {
    unset(
      $this['production_list'], $this['staff_list']
    );
  }
}