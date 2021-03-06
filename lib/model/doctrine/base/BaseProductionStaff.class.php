<?php

/**
 * BaseProductionStaff
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $production_id
 * @property integer $role_id
 * @property integer $staff_id
 * @property Production $Production
 * @property Role $Role
 * @property Staff $Staff
 * 
 * @method integer         getProductionId()  Returns the current record's "production_id" value
 * @method integer         getRoleId()        Returns the current record's "role_id" value
 * @method integer         getStaffId()       Returns the current record's "staff_id" value
 * @method Production      getProduction()    Returns the current record's "Production" value
 * @method Role            getRole()          Returns the current record's "Role" value
 * @method Staff           getStaff()         Returns the current record's "Staff" value
 * @method ProductionStaff setProductionId()  Sets the current record's "production_id" value
 * @method ProductionStaff setRoleId()        Sets the current record's "role_id" value
 * @method ProductionStaff setStaffId()       Sets the current record's "staff_id" value
 * @method ProductionStaff setProduction()    Sets the current record's "Production" value
 * @method ProductionStaff setRole()          Sets the current record's "Role" value
 * @method ProductionStaff setStaff()         Sets the current record's "Staff" value
 * 
 * @package    bristol-old-vic-archive
 * @subpackage model
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseProductionStaff extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('production_staff');
        $this->hasColumn('production_id', 'integer', 20, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 20,
             ));
        $this->hasColumn('role_id', 'integer', 20, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 20,
             ));
        $this->hasColumn('staff_id', 'integer', 20, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 20,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Production', array(
             'local' => 'production_id',
             'foreign' => 'id'));

        $this->hasOne('Role', array(
             'local' => 'role_id',
             'foreign' => 'id'));

        $this->hasOne('Staff', array(
             'local' => 'staff_id',
             'foreign' => 'id'));
    }
}