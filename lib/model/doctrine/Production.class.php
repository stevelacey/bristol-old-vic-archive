<?php

/**
 * Production
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    bristol-old-vic-archive
 * @subpackage model
 * @author     Steve Lacey
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Production extends BaseProduction {
  public function getStartDate($format) {
    return $this->getDateTimeObject('start_at')->format($format);
  }

  public function getEndDate($format) {
    return $this->getDateTimeObject('end_at')->format($format);
  }

  public function getVenue() {
    return $this->getLayout()->getVenue();
  }
}
