<?php

/**
 * BaseProductionSponsor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $production_id
 * @property integer $sponsor_id
 * @property Production $Production
 * @property Sponsor $Sponsor
 * 
 * @method integer           getProductionId()  Returns the current record's "production_id" value
 * @method integer           getSponsorId()     Returns the current record's "sponsor_id" value
 * @method Production        getProduction()    Returns the current record's "Production" value
 * @method Sponsor           getSponsor()       Returns the current record's "Sponsor" value
 * @method ProductionSponsor setProductionId()  Sets the current record's "production_id" value
 * @method ProductionSponsor setSponsorId()     Sets the current record's "sponsor_id" value
 * @method ProductionSponsor setProduction()    Sets the current record's "Production" value
 * @method ProductionSponsor setSponsor()       Sets the current record's "Sponsor" value
 * 
 * @package    bristol-old-vic-archive
 * @subpackage model
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseProductionSponsor extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('production_sponsor');
        $this->hasColumn('production_id', 'integer', 20, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 20,
             ));
        $this->hasColumn('sponsor_id', 'integer', 20, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 20,
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