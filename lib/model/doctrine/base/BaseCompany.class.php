<?php

/**
 * BaseCompany
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $email
 * @property string $telephone
 * @property string $description
 * @property Doctrine_Collection $Productions
 * 
 * @method string              getName()        Returns the current record's "name" value
 * @method string              getEmail()       Returns the current record's "email" value
 * @method string              getTelephone()   Returns the current record's "telephone" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method Doctrine_Collection getProductions() Returns the current record's "Productions" collection
 * @method Company             setName()        Sets the current record's "name" value
 * @method Company             setEmail()       Sets the current record's "email" value
 * @method Company             setTelephone()   Sets the current record's "telephone" value
 * @method Company             setDescription() Sets the current record's "description" value
 * @method Company             setProductions() Sets the current record's "Productions" collection
 * 
 * @package    bristol-old-vic-archive
 * @subpackage model
 * @author     Steve Lacey
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCompany extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('company');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('telephone', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));

        $this->option('orderBy', 'name asc');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Production as Productions', array(
             'local' => 'id',
             'foreign' => 'company_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}