<?php

/**
 * ProductionStaff form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
class ProductionStaffForm extends BaseProductionStaffForm {
  public function configure() {
    unset($this['production_id'], $this['role_id']);
  }
}