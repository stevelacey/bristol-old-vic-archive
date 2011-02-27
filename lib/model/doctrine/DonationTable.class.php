<?php

class DonationTable extends Doctrine_Table {
  public static function getInstance() {
    return Doctrine_Core::getTable('Donation');
  }

  public function findByProductionSponsor(Production $production, Sponsor $sponsor) {
    return Doctrine_Query::create()->
      from('Donation d')->
      where('d.production_id = ?', $production->getId())->
      andWhere('d.sponsor_id = ?', $sponsor->getId())->
      execute();
  }
}