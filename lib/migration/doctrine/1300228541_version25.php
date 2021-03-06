<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version25 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->dropForeignKey('character', 'character_image_id_image_id');
        $this->removeColumn('character', 'image_id');
    }

    public function down()
    {
        $this->addColumn('character', 'image_id', 'integer', '20', array(
             ));
        $this->createForeignKey('character', 'character_image_id_image_id', array(
             'name' => 'character_image_id_image_id',
             'local' => 'image_id',
             'foreign' => 'id',
             'foreignTable' => 'image',
             ));
    }
}