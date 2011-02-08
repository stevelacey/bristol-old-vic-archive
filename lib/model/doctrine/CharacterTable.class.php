<?php

class CharacterTable extends Doctrine_Table {
  public static function getInstance() {
    return Doctrine_Core::getTable('Character');
  }
  
  public function findByProductionPerformer(Production $production, Performer $performer) {
    return Doctrine_Query::create()->
      from('Character c')->
      where('c.production_id = ?', $production->getId())->
      andWhere('c.performer_id = ?', $performer->getId())->
      execute();
  }
}