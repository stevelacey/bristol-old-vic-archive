<?php

/**
 * BaseImage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property string $path
 * @property Doctrine_Collection $Person
 * @property Doctrine_Collection $Production
 * @property Doctrine_Collection $Layout
 * 
 * @method string              getTitle()      Returns the current record's "title" value
 * @method string              getPath()       Returns the current record's "path" value
 * @method Doctrine_Collection getPerson()     Returns the current record's "Person" collection
 * @method Doctrine_Collection getProduction() Returns the current record's "Production" collection
 * @method Doctrine_Collection getLayout()     Returns the current record's "Layout" collection
 * @method Image               setTitle()      Sets the current record's "title" value
 * @method Image               setPath()       Sets the current record's "path" value
 * @method Image               setPerson()     Sets the current record's "Person" collection
 * @method Image               setProduction() Sets the current record's "Production" collection
 * @method Image               setLayout()     Sets the current record's "Layout" collection
 * 
 * @package    bristol-old-vic-archive
 * @subpackage model
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseImage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('image');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('path', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Person', array(
             'local' => 'id',
             'foreign' => 'image_id'));

        $this->hasMany('Production', array(
             'local' => 'id',
             'foreign' => 'shot_image_id'));

        $this->hasMany('Layout', array(
             'local' => 'id',
             'foreign' => 'image_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'title',
             ),
             'canUpdate' => true,
             ));
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}