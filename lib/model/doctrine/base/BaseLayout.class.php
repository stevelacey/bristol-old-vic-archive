<?php

/**
 * BaseLayout
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property integer $venue_id
 * @property integer $image_id
 * @property integer $capacity
 * @property Venue $Venue
 * @property Image $Image
 * @property Doctrine_Collection $Productions
 * 
 * @method string              getName()        Returns the current record's "name" value
 * @method integer             getVenueId()     Returns the current record's "venue_id" value
 * @method integer             getImageId()     Returns the current record's "image_id" value
 * @method integer             getCapacity()    Returns the current record's "capacity" value
 * @method Venue               getVenue()       Returns the current record's "Venue" value
 * @method Image               getImage()       Returns the current record's "Image" value
 * @method Doctrine_Collection getProductions() Returns the current record's "Productions" collection
 * @method Layout              setName()        Sets the current record's "name" value
 * @method Layout              setVenueId()     Sets the current record's "venue_id" value
 * @method Layout              setImageId()     Sets the current record's "image_id" value
 * @method Layout              setCapacity()    Sets the current record's "capacity" value
 * @method Layout              setVenue()       Sets the current record's "Venue" value
 * @method Layout              setImage()       Sets the current record's "Image" value
 * @method Layout              setProductions() Sets the current record's "Productions" collection
 * 
 * @package    bristol-old-vic-archive
 * @subpackage model
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseLayout extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('layout');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('venue_id', 'integer', 20, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('image_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('capacity', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));

        $this->option('orderBy', 'name asc');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Venue', array(
             'local' => 'venue_id',
             'foreign' => 'id',
             'onDelete' => 'cascade',
             'cascade' => array(
             0 => 'delete',
             )));

        $this->hasOne('Image', array(
             'local' => 'image_id',
             'foreign' => 'id'));

        $this->hasMany('Production as Productions', array(
             'local' => 'id',
             'foreign' => 'layout_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}