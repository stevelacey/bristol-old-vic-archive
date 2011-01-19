<?php

/**
 * Show form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ShowForm extends BaseShowForm {
  public function configure() {
    unset(
      $this['performance_id'],
      $this['created_at'], $this['updated_at']
    );
  }
}