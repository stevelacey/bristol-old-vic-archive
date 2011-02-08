<?php

class RoleTable extends Doctrine_Table {
  public static function getInstance() {
    return Doctrine_Core::getTable('Role');
  }
  
  public function findByProductionStaff(Production $production, Staff $staff) {
    return Doctrine_Query::create()->
      from('Role r')->
      leftJoin('r.ProductionStaff ps')->
      where('ps.production_id = ?', $production->getId())->
      andWhere('ps.staff_id = ?', $staff->getId())->
      execute();
  }
}