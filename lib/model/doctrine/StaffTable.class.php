<?php

class StaffTable extends PersonTable {
  public static function getInstance() {
    return Doctrine_Core::getTable('Staff');
  }

  public function findByDepartment(Department $department) {
    return $this->findByDepartmentQuery($department)->execute();
  }

  public function findByDepartmentQuery(Department $department) {
    return Doctrine_Query::create()->
      from('Staff s')->
      leftJoin('s.ProductionStaff ps')->
      leftJoin('ps.Role r')->
      where('r.department_id = ?', $department->getId());
  }
  
  public function findOneByProductionRole(Production $production, Role $role) {
    return Doctrine_Query::create()->
      from('Staff s')->
      leftJoin('s.ProductionStaff ps')->
      where('ps.production_id = ?', $production->getId())->
      andWhere('ps.role_id = ?', $role->getId())->
      fetchOne();
  }
}