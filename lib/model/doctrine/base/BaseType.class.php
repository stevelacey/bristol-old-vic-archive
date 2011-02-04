<?php

/**
 * BaseType
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property Doctrine_Collection $Productions
 * 
 * @method string              getName()        Returns the current record's "name" value
 * @method Doctrine_Collection getProductions() Returns the current record's "Productions" collection
 * @method Type                setName()        Sets the current record's "name" value
 * @method Type                setProductions() Sets the current record's "Productions" collection
 * 
 * @package    bristol-old-vic-archive
 * @subpackage model
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseType extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('type');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));

        $this->option('orderBy', 'name asc');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Production as Productions', array(
             'local' => 'id',
             'foreign' => 'type_id'));
    }
}