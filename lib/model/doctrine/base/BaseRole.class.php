<?php

/**
 * BaseRole
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property integer $department_id
 * @property Department $Department
 * @property Doctrine_Collection $Productions
 * @property Doctrine_Collection $Staff
 * @property Doctrine_Collection $ProductionStaff
 * 
 * @method string              getName()            Returns the current record's "name" value
 * @method integer             getDepartmentId()    Returns the current record's "department_id" value
 * @method Department          getDepartment()      Returns the current record's "Department" value
 * @method Doctrine_Collection getProductions()     Returns the current record's "Productions" collection
 * @method Doctrine_Collection getStaff()           Returns the current record's "Staff" collection
 * @method Doctrine_Collection getProductionStaff() Returns the current record's "ProductionStaff" collection
 * @method Role                setName()            Sets the current record's "name" value
 * @method Role                setDepartmentId()    Sets the current record's "department_id" value
 * @method Role                setDepartment()      Sets the current record's "Department" value
 * @method Role                setProductions()     Sets the current record's "Productions" collection
 * @method Role                setStaff()           Sets the current record's "Staff" collection
 * @method Role                setProductionStaff() Sets the current record's "ProductionStaff" collection
 * 
 * @package    bristol-old-vic-archive
 * @subpackage model
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseRole extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('role');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('department_id', 'integer', 20, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 20,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Department', array(
             'local' => 'department_id',
             'foreign' => 'id'));

        $this->hasMany('Production as Productions', array(
             'refClass' => 'ProductionStaff',
             'local' => 'role_id',
             'foreign' => 'production_id'));

        $this->hasMany('Staff', array(
             'refClass' => 'ProductionStaff',
             'local' => 'role_id',
             'foreign' => 'role_id'));

        $this->hasMany('ProductionStaff', array(
             'local' => 'id',
             'foreign' => 'role_id'));
    }
}