<?php

class LayoutTable extends Doctrine_Table {
  public static function getInstance() {
    return Doctrine_Core::getTable('Layout');
  }

  public function findAllOrderedByVenue() {
    return Doctrine_Query::create()->
      from('Layout l')->
      leftJoin('l.Venue v')->
      orderBy('v.name asc')->
      execute();
  }
}