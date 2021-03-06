<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version2 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->dropForeignKey('character', 'character_actor_id_person_id');
        $this->dropForeignKey('person', 'person_image_id_image_id');
        $this->createTable('performer', array(
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
             'email' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'telephone' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'gender' => 
             array(
              'type' => 'enum',
              'values' => 
              array(
              0 => 'Male',
              1 => 'Female',
              ),
              'notnull' => '1',
              'length' => '',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
        $this->createTable('staff', array(
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
             'email' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'telephone' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
        $this->removeColumn('character', 'actor_id');
        $this->removeColumn('image', 'production_id');
        $this->removeColumn('image', 'person_id');
        $this->removeColumn('person', 'image_id');
        $this->removeColumn('person', 'gender');
        $this->addColumn('character', 'performer_id', 'integer', '20', array(
             'notnull' => '1',
             ));
        $this->addColumn('character', 'image_id', 'integer', '20', array(
             ));
    }

    public function down()
    {
        $this->dropTable('performer');
        $this->dropTable('staff');
        $this->addColumn('character', 'actor_id', 'integer', '20', array(
             'notnull' => '1',
             ));
        $this->addColumn('image', 'production_id', 'integer', '20', array(
             ));
        $this->addColumn('image', 'person_id', 'integer', '20', array(
             ));
        $this->addColumn('person', 'image_id', 'integer', '20', array(
             ));
        $this->addColumn('person', 'gender', 'enum', '', array(
             'values' => 
             array(
              0 => 'Male',
              1 => 'Female',
             ),
             'notnull' => '1',
             ));
        $this->removeColumn('character', 'performer_id');
        $this->removeColumn('character', 'image_id');
        $this->createForeignKey('character', 'character_actor_id_person_id', array(
             'name' => 'character_actor_id_person_id',
             'local' => 'actor_id',
             'foreign' => 'id',
             'foreignTable' => 'person',
             ));
        $this->createForeignKey('person', 'person_image_id_image_id', array(
             'name' => 'person_image_id_image_id',
             'local' => 'image_id',
             'foreign' => 'id',
             'foreignTable' => 'image',
             ));
    }
}