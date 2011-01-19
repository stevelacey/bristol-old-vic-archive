<?php

/**
 * BaseCharacter
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property enum $gender
 * @property integer $actor_id
 * @property integer $production_id
 * @property Person $Actor
 * @property Production $Production
 * 
 * @method string     getName()          Returns the current record's "name" value
 * @method enum       getGender()        Returns the current record's "gender" value
 * @method integer    getActorId()       Returns the current record's "actor_id" value
 * @method integer    getProductionId()  Returns the current record's "production_id" value
 * @method Person     getActor()         Returns the current record's "Actor" value
 * @method Production getProduction()    Returns the current record's "Production" value
 * @method Character  setName()          Sets the current record's "name" value
 * @method Character  setGender()        Sets the current record's "gender" value
 * @method Character  setActorId()       Sets the current record's "actor_id" value
 * @method Character  setProductionId()  Sets the current record's "production_id" value
 * @method Character  setActor()         Sets the current record's "Actor" value
 * @method Character  setProduction()    Sets the current record's "Production" value
 * 
 * @package    bristol-old-vic-archive
 * @subpackage model
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseCharacter extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('character');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('gender', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'Male',
              1 => 'Female',
             ),
             'notnull' => true,
             ));
        $this->hasColumn('actor_id', 'integer', 20, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('production_id', 'integer', 20, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 20,
             ));

        $this->option('orderBy', 'name asc');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Person as Actor', array(
             'local' => 'actor_id',
             'foreign' => 'id'));

        $this->hasOne('Production', array(
             'local' => 'production_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}