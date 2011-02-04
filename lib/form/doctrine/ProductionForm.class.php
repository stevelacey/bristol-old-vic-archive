<?php

/**
 * Production form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage form
 * @author     Steve Lacey
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductionForm extends BaseProductionForm {
  public function configure() {
    $this->widgetSchema['start_at'] = new sfWidgetFormDate();
    $this->widgetSchema['end_at'] = new sfWidgetFormDate();

    unset(
      $this['image_id'],
      $this['created_at'], $this['updated_at']
    );
  }
}