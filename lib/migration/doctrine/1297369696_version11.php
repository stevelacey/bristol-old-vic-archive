<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version11 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->removeColumn('production', 'gross_income');
    }

    public function down()
    {
        $this->addColumn('production', 'gross_income', 'float', '', array(
             ));
    }
}