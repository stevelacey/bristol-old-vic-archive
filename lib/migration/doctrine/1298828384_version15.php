<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version15 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->renameColumn('donation', 'donation', 'amount');
    }

    public function down()
    {
        $this->renameColumn('donation', 'amount', 'donation');
    }
}