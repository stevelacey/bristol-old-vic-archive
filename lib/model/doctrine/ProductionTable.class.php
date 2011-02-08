<?php

class ProductionTable extends Doctrine_Table {
  public static function getInstance() {
    return Doctrine_Core::getTable('Production');
  }

  public function findByPerformer(Performer $performer) {
    return Doctrine_Query::create()->
      from('Production p')->
      leftJoin('p.Characters c')->
      where('c.performer_id = ?', $performer->getId())
      ->execute();
  }
}