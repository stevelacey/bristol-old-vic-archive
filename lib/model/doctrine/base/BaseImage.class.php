<?php

/**
 * BaseImage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property string $caption
 * @property string $path
 * @property Doctrine_Collection $Character
 * @property Doctrine_Collection $Productions
 * 
 * @method string              getTitle()       Returns the current record's "title" value
 * @method string              getCaption()     Returns the current record's "caption" value
 * @method string              getPath()        Returns the current record's "path" value
 * @method Doctrine_Collection getCharacter()   Returns the current record's "Character" collection
 * @method Doctrine_Collection getProductions() Returns the current record's "Productions" collection
 * @method Image               setTitle()       Sets the current record's "title" value
 * @method Image               setCaption()     Sets the current record's "caption" value
 * @method Image               setPath()        Sets the current record's "path" value
 * @method Image               setCharacter()   Sets the current record's "Character" collection
 * @method Image               setProductions() Sets the current record's "Productions" collection
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
        $this->hasColumn('caption', 'string', 255, array(
             'type' => 'string',
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
        $this->hasMany('Character', array(
             'local' => 'id',
             'foreign' => 'image_id'));

        $this->hasMany('Production as Productions', array(
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