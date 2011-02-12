<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version14 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('layout', 'created_at', 'timestamp', '25', array(
             'notnull' => '1',
             ));
        $this->addColumn('layout', 'updated_at', 'timestamp', '25', array(
             'notnull' => '1',
             ));
        $this->addColumn('venue', 'created_at', 'timestamp', '25', array(
             'notnull' => '1',
             ));
        $this->addColumn('venue', 'updated_at', 'timestamp', '25', array(
             'notnull' => '1',
             ));
    }

    public function down()
    {
        $this->removeColumn('layout', 'created_at');
        $this->removeColumn('layout', 'updated_at');
        $this->removeColumn('venue', 'created_at');
        $this->removeColumn('venue', 'updated_at');
    }
}