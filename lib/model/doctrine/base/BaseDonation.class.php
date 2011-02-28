<?php

/**
 * BaseDonation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $production_id
 * @property integer $funder_id
 * @property float $amount
 * @property string $description
 * @property Production $Production
 * @property Funder $Funder
 * 
 * @method integer    getProductionId()  Returns the current record's "production_id" value
 * @method integer    getFunderId()      Returns the current record's "funder_id" value
 * @method float      getAmount()        Returns the current record's "amount" value
 * @method string     getDescription()   Returns the current record's "description" value
 * @method Production getProduction()    Returns the current record's "Production" value
 * @method Funder     getFunder()        Returns the current record's "Funder" value
 * @method Donation   setProductionId()  Sets the current record's "production_id" value
 * @method Donation   setFunderId()      Sets the current record's "funder_id" value
 * @method Donation   setAmount()        Sets the current record's "amount" value
 * @method Donation   setDescription()   Sets the current record's "description" value
 * @method Donation   setProduction()    Sets the current record's "Production" value
 * @method Donation   setFunder()        Sets the current record's "Funder" value
 * 
 * @package    bristol-old-vic-archive
 * @subpackage model
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseDonation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('donation');
        $this->hasColumn('production_id', 'integer', 20, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('funder_id', 'integer', 20, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('amount', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Production', array(
             'local' => 'production_id',
             'foreign' => 'id'));

        $this->hasOne('Funder', array(
             'local' => 'funder_id',
             'foreign' => 'id'));
    }
}