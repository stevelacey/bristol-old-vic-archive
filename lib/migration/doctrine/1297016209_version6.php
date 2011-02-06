<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version6 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->removeColumn('production', 'director_id');
        $this->removeColumn('production', 'producer_id');
        $this->removeColumn('production', 'technician_id');
    }

    public function down()
    {
        $this->addColumn('production', 'director_id', 'integer', '20', array(
             ));
        $this->addColumn('production', 'producer_id', 'integer', '20', array(
             ));
        $this->addColumn('production', 'technician_id', 'integer', '20', array(
             ));
    }
}