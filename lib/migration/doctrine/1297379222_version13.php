<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version13 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('layout', 'layout_image_id_image_id', array(
             'name' => 'layout_image_id_image_id',
             'local' => 'image_id',
             'foreign' => 'id',
             'foreignTable' => 'image',
             ));
        $this->createForeignKey('performer', 'performer_image_id_image_id', array(
             'name' => 'performer_image_id_image_id',
             'local' => 'image_id',
             'foreign' => 'id',
             'foreignTable' => 'image',
             ));
        $this->createForeignKey('person', 'person_image_id_image_id', array(
             'name' => 'person_image_id_image_id',
             'local' => 'image_id',
             'foreign' => 'id',
             'foreignTable' => 'image',
             ));
        $this->createForeignKey('production', 'production_shot_image_id_image_id', array(
             'name' => 'production_shot_image_id_image_id',
             'local' => 'shot_image_id',
             'foreign' => 'id',
             'foreignTable' => 'image',
             ));
        $this->createForeignKey('production', 'production_set_design_image_id_image_id', array(
             'name' => 'production_set_design_image_id_image_id',
             'local' => 'set_design_image_id',
             'foreign' => 'id',
             'foreignTable' => 'image',
             ));
        $this->createForeignKey('staff', 'staff_image_id_image_id', array(
             'name' => 'staff_image_id_image_id',
             'local' => 'image_id',
             'foreign' => 'id',
             'foreignTable' => 'image',
             ));
        $this->addIndex('layout', 'layout_image_id', array(
             'fields' => 
             array(
              0 => 'image_id',
             ),
             ));
        $this->addIndex('performer', 'performer_image_id', array(
             'fields' => 
             array(
              0 => 'image_id',
             ),
             ));
        $this->addIndex('person', 'person_image_id', array(
             'fields' => 
             array(
              0 => 'image_id',
             ),
             ));
        $this->addIndex('production', 'production_shot_image_id', array(
             'fields' => 
             array(
              0 => 'shot_image_id',
             ),
             ));
        $this->addIndex('production', 'production_set_design_image_id', array(
             'fields' => 
             array(
              0 => 'set_design_image_id',
             ),
             ));
        $this->addIndex('staff', 'staff_image_id', array(
             'fields' => 
             array(
              0 => 'image_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('layout', 'layout_image_id_image_id');
        $this->dropForeignKey('performer', 'performer_image_id_image_id');
        $this->dropForeignKey('person', 'person_image_id_image_id');
        $this->dropForeignKey('production', 'production_shot_image_id_image_id');
        $this->dropForeignKey('production', 'production_set_design_image_id_image_id');
        $this->dropForeignKey('staff', 'staff_image_id_image_id');
        $this->removeIndex('layout', 'layout_image_id', array(
             'fields' => 
             array(
              0 => 'image_id',
             ),
             ));
        $this->removeIndex('performer', 'performer_image_id', array(
             'fields' => 
             array(
              0 => 'image_id',
             ),
             ));
        $this->removeIndex('person', 'person_image_id', array(
             'fields' => 
             array(
              0 => 'image_id',
             ),
             ));
        $this->removeIndex('production', 'production_shot_image_id', array(
             'fields' => 
             array(
              0 => 'shot_image_id',
             ),
             ));
        $this->removeIndex('production', 'production_set_design_image_id', array(
             'fields' => 
             array(
              0 => 'set_design_image_id',
             ),
             ));
        $this->removeIndex('staff', 'staff_image_id', array(
             'fields' => 
             array(
              0 => 'image_id',
             ),
             ));
    }
}