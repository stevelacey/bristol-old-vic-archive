<?php

/**
 * BasePerformer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property enum $gender
 * @property Doctrine_Collection $Characters
 * 
 * @method enum                getGender()     Returns the current record's "gender" value
 * @method Doctrine_Collection getCharacters() Returns the current record's "Characters" collection
 * @method Performer           setGender()     Sets the current record's "gender" value
 * @method Performer           setCharacters() Sets the current record's "Characters" collection
 * 
 * @package    bristol-old-vic-archive
 * @subpackage model
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BasePerformer extends Person
{
    public function setTableDefinition()
    {
        parent::setTableDefinition();
        $this->setTableName('performer');
        $this->hasColumn('gender', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'Male',
              1 => 'Female',
             ),
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Character as Characters', array(
             'local' => 'id',
             'foreign' => 'performer_id',
             'onDelete' => 'cascade',
             'cascade' => array(
             0 => 'delete',
             )));
    }
}