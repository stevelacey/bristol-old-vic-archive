<?php

/**
 * Production filter form.
 *
 * @package    bristol-old-vic-archive
 * @subpackage filter
 * @author     Steve Lacey
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductionFormFilter extends BaseProductionFormFilter {
  public function configure() {
    $this->widgetSchema['start_at'] = new sfWidgetFormFilterDateUK();
    $this->widgetSchema['end_at'] = new sfWidgetFormFilterDateUK();
    $this->widgetSchema['created_at'] = new sfWidgetFormFilterDateUK();
  }
}
