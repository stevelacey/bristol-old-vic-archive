<?php

/**
 * ProductionType form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductionTypeForm extends BaseProductionTypeForm {
  public function configure() {
    unset($this['created_at'], $this['updated_at']);
  }
}