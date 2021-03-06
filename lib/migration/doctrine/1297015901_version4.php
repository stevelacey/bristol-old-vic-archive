<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version4 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('department', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'name' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
        $this->createTable('production_staff', array(
             'production_id' => 
             array(
              'type' => 'integer',
              'primary' => '1',
              'length' => '20',
             ),
             'role_id' => 
             array(
              'type' => 'integer',
              'primary' => '1',
              'length' => '20',
             ),
             'staff_id' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'length' => '20',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'production_id',
              1 => 'role_id',
             ),
             ));
        $this->createTable('role', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'name' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'department_id' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'length' => '20',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
    }

    public function down()
    {
        $this->dropTable('department');
        $this->dropTable('production_staff');
        $this->dropTable('role');
    }
}