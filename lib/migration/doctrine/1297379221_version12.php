<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version12 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->dropForeignKey('production', 'production_image_id_image_id');
        $this->removeColumn('production', 'image_id');
        $this->removeColumn('image', 'caption');
        $this->addColumn('layout', 'image_id', 'integer', '20', array(
             ));
        $this->addColumn('performer', 'image_id', 'integer', '20', array(
             ));
        $this->addColumn('person', 'image_id', 'integer', '20', array(
             ));
        $this->addColumn('production', 'shot_image_id', 'integer', '20', array(
             ));
        $this->addColumn('production', 'set_design_image_id', 'integer', '20', array(
             ));
        $this->addColumn('staff', 'image_id', 'integer', '20', array(
             ));
    }

    public function down()
    {
        $this->addColumn('image', 'caption', 'string', '255', array(
             ));
        $this->createForeignKey('production', 'production_image_id_image_id', array(
             'name' => 'production_image_id_image_id',
             'local' => 'image_id',
             'foreign' => 'id',
             'foreignTable' => 'image',
             ));
        $this->addColumn('production', 'image_id', 'integer', '20', array(
             ));
        $this->removeColumn('layout', 'image_id');
        $this->removeColumn('performer', 'image_id');
        $this->removeColumn('person', 'image_id');
        $this->removeColumn('production', 'shot_image_id');
        $this->removeColumn('production', 'set_design_image_id');
        $this->removeColumn('staff', 'image_id');
    }
}