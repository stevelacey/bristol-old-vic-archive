<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version5 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->dropForeignKey('production', 'production_director_id_person_id');
        $this->dropForeignKey('production', 'production_producer_id_person_id');
        $this->dropForeignKey('production', 'production_technician_id_person_id');
        $this->createForeignKey('production_staff', 'production_staff_production_id_production_id', array(
             'name' => 'production_staff_production_id_production_id',
             'local' => 'production_id',
             'foreign' => 'id',
             'foreignTable' => 'production',
             ));
        $this->createForeignKey('production_staff', 'production_staff_role_id_role_id', array(
             'name' => 'production_staff_role_id_role_id',
             'local' => 'role_id',
             'foreign' => 'id',
             'foreignTable' => 'role',
             ));
        $this->createForeignKey('production_staff', 'production_staff_staff_id_staff_id', array(
             'name' => 'production_staff_staff_id_staff_id',
             'local' => 'staff_id',
             'foreign' => 'id',
             'foreignTable' => 'staff',
             ));
        $this->createForeignKey('role', 'role_department_id_department_id', array(
             'name' => 'role_department_id_department_id',
             'local' => 'department_id',
             'foreign' => 'id',
             'foreignTable' => 'department',
             ));
        $this->addIndex('production_staff', 'production_staff_production_id', array(
             'fields' => 
             array(
              0 => 'production_id',
             ),
             ));
        $this->addIndex('production_staff', 'production_staff_role_id', array(
             'fields' => 
             array(
              0 => 'role_id',
             ),
             ));
        $this->addIndex('production_staff', 'production_staff_staff_id', array(
             'fields' => 
             array(
              0 => 'staff_id',
             ),
             ));
        $this->addIndex('role', 'role_department_id', array(
             'fields' => 
             array(
              0 => 'department_id',
             ),
             ));
    }

    public function down()
    {
        $this->createForeignKey('production', 'production_director_id_person_id', array(
             'name' => 'production_director_id_person_id',
             'local' => 'director_id',
             'foreign' => 'id',
             'foreignTable' => 'person',
             ));
        $this->createForeignKey('production', 'production_producer_id_person_id', array(
             'name' => 'production_producer_id_person_id',
             'local' => 'producer_id',
             'foreign' => 'id',
             'foreignTable' => 'person',
             ));
        $this->createForeignKey('production', 'production_technician_id_person_id', array(
             'name' => 'production_technician_id_person_id',
             'local' => 'technician_id',
             'foreign' => 'id',
             'foreignTable' => 'person',
             ));
        $this->dropForeignKey('production_staff', 'production_staff_production_id_production_id');
        $this->dropForeignKey('production_staff', 'production_staff_role_id_role_id');
        $this->dropForeignKey('production_staff', 'production_staff_staff_id_staff_id');
        $this->dropForeignKey('role', 'role_department_id_department_id');
        $this->removeIndex('production_staff', 'production_staff_production_id', array(
             'fields' => 
             array(
              0 => 'production_id',
             ),
             ));
        $this->removeIndex('production_staff', 'production_staff_role_id', array(
             'fields' => 
             array(
              0 => 'role_id',
             ),
             ));
        $this->removeIndex('production_staff', 'production_staff_staff_id', array(
             'fields' => 
             array(
              0 => 'staff_id',
             ),
             ));
        $this->removeIndex('role', 'role_department_id', array(
             'fields' => 
             array(
              0 => 'department_id',
             ),
             ));
    }
}