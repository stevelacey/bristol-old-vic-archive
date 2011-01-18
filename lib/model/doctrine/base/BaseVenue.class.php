<?php

/**
 * BaseVenue
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $telephone
 * @property integer $capacity
 * @property Doctrine_Collection $Performances
 * 
 * @method string              getName()         Returns the current record's "name" value
 * @method string              getTelephone()    Returns the current record's "telephone" value
 * @method integer             getCapacity()     Returns the current record's "capacity" value
 * @method Doctrine_Collection getPerformances() Returns the current record's "Performances" collection
 * @method Venue               setName()         Sets the current record's "name" value
 * @method Venue               setTelephone()    Sets the current record's "telephone" value
 * @method Venue               setCapacity()     Sets the current record's "capacity" value
 * @method Venue               setPerformances() Sets the current record's "Performances" collection
 * 
 * @package    bristol-old-vic-archive
 * @subpackage model
 * @author     Steve Lacey
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVenue extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('venue');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('telephone', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('capacity', 'integer', 20, array(
             'type' => 'integer',
             'length' => '20',
             ));

        $this->option('orderBy', 'name asc');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Performance as Performances', array(
             'local' => 'id',
             'foreign' => 'venue_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}