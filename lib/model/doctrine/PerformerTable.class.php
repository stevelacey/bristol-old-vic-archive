<?php


class PerformerTable extends PersonTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Performer');
    }
}