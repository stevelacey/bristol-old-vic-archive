<?php

class DonationTable extends Doctrine_Table {
  public static function getInstance() {
    return Doctrine_Core::getTable('Donation');
  }

  public function findByProductionFunder(Production $production, Funder $funder) {
    return Doctrine_Query::create()->
      from('Donation d')->
      where('d.production_id = ?', $production->getId())->
      andWhere('d.funder_id = ?', $funder->getId())->
      execute();
  }
}