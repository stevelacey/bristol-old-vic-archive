<?php


class StaffTable extends PersonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Staff');
    }
}