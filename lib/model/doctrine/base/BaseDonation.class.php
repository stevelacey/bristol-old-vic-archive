<?php

/**
 * BaseDonation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $production_id
 * @property integer $sponsor_id
 * @property float $donation
 * @property string $description
 * @property Production $Production
 * @property Sponsor $Sponsor
 * 
 * @method integer    getProductionId()  Returns the current record's "production_id" value
 * @method integer    getSponsorId()     Returns the current record's "sponsor_id" value
 * @method float      getDonation()      Returns the current record's "donation" value
 * @method string     getDescription()   Returns the current record's "description" value
 * @method Production getProduction()    Returns the current record's "Production" value
 * @method Sponsor    getSponsor()       Returns the current record's "Sponsor" value
 * @method Donation   setProductionId()  Sets the current record's "production_id" value
 * @method Donation   setSponsorId()     Sets the current record's "sponsor_id" value
 * @method Donation   setDonation()      Sets the current record's "donation" value
 * @method Donation   setDescription()   Sets the current record's "description" value
 * @method Donation   setProduction()    Sets the current record's "Production" value
 * @method Donation   setSponsor()       Sets the current record's "Sponsor" value
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
        $this->hasColumn('sponsor_id', 'integer', 20, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('donation', 'float', null, array(
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

        $this->hasOne('Sponsor', array(
             'local' => 'sponsor_id',
             'foreign' => 'id'));
    }
}