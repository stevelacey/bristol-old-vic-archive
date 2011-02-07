<?php

class ProductionStaffTable extends Doctrine_Table {
  public static function getInstance() {
    return Doctrine_Core::getTable('ProductionStaff');
  }
  
  public function findOneByProductionRole(Production $production, Role $role) {
    return Doctrine_Query::create()->
      from('ProductionStaff ps')->
      where('ps.production_id = ?', $production->getId())->
      andWhere('ps.role_id = ?', $role->getId())->
      fetchOne();
  }
}