<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version3 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('character', 'character_performer_id_performer_id', array(
             'name' => 'character_performer_id_performer_id',
             'local' => 'performer_id',
             'foreign' => 'id',
             'foreignTable' => 'performer',
             ));
        $this->createForeignKey('character', 'character_image_id_image_id', array(
             'name' => 'character_image_id_image_id',
             'local' => 'image_id',
             'foreign' => 'id',
             'foreignTable' => 'image',
             ));
        $this->addIndex('character', 'character_performer_id', array(
             'fields' => 
             array(
              0 => 'performer_id',
             ),
             ));
        $this->addIndex('character', 'character_image_id', array(
             'fields' => 
             array(
              0 => 'image_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('character', 'character_performer_id_performer_id');
        $this->dropForeignKey('character', 'character_image_id_image_id');
        $this->removeIndex('character', 'character_performer_id', array(
             'fields' => 
             array(
              0 => 'performer_id',
             ),
             ));
        $this->removeIndex('character', 'character_image_id', array(
             'fields' => 
             array(
              0 => 'image_id',
             ),
             ));
    }
}