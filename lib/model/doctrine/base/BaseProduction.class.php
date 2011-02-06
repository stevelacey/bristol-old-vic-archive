<?php

/**
 * BaseProduction
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property integer $type_id
 * @property integer $genre_id
 * @property integer $layout_id
 * @property integer $company_id
 * @property integer $collaboration_id
 * @property integer $image_id
 * @property string $description
 * @property datetime $start_at
 * @property datetime $end_at
 * @property boolean $fundraiser
 * @property float $adult_ticket_price
 * @property float $child_ticket_price
 * @property float $student_ticket_price
 * @property string $funding
 * @property string $notes
 * @property float $gross_income
 * @property Type $Type
 * @property Genre $Genre
 * @property Layout $Layout
 * @property Company $Company
 * @property Collaboration $Collaboration
 * @property Image $Image
 * @property Doctrine_Collection $Staff
 * @property Doctrine_Collection $Roles
 * @property Doctrine_Collection $Sponsors
 * @property Doctrine_Collection $Characters
 * @property Doctrine_Collection $ProductionSponsor
 * @property Doctrine_Collection $ProductionStaff
 * 
 * @method string              getName()                 Returns the current record's "name" value
 * @method integer             getTypeId()               Returns the current record's "type_id" value
 * @method integer             getGenreId()              Returns the current record's "genre_id" value
 * @method integer             getLayoutId()             Returns the current record's "layout_id" value
 * @method integer             getCompanyId()            Returns the current record's "company_id" value
 * @method integer             getCollaborationId()      Returns the current record's "collaboration_id" value
 * @method integer             getImageId()              Returns the current record's "image_id" value
 * @method string              getDescription()          Returns the current record's "description" value
 * @method datetime            getStartAt()              Returns the current record's "start_at" value
 * @method datetime            getEndAt()                Returns the current record's "end_at" value
 * @method boolean             getFundraiser()           Returns the current record's "fundraiser" value
 * @method float               getAdultTicketPrice()     Returns the current record's "adult_ticket_price" value
 * @method float               getChildTicketPrice()     Returns the current record's "child_ticket_price" value
 * @method float               getStudentTicketPrice()   Returns the current record's "student_ticket_price" value
 * @method string              getFunding()              Returns the current record's "funding" value
 * @method string              getNotes()                Returns the current record's "notes" value
 * @method float               getGrossIncome()          Returns the current record's "gross_income" value
 * @method Type                getType()                 Returns the current record's "Type" value
 * @method Genre               getGenre()                Returns the current record's "Genre" value
 * @method Layout              getLayout()               Returns the current record's "Layout" value
 * @method Company             getCompany()              Returns the current record's "Company" value
 * @method Collaboration       getCollaboration()        Returns the current record's "Collaboration" value
 * @method Image               getImage()                Returns the current record's "Image" value
 * @method Doctrine_Collection getStaff()                Returns the current record's "Staff" collection
 * @method Doctrine_Collection getRoles()                Returns the current record's "Roles" collection
 * @method Doctrine_Collection getSponsors()             Returns the current record's "Sponsors" collection
 * @method Doctrine_Collection getCharacters()           Returns the current record's "Characters" collection
 * @method Doctrine_Collection getProductionSponsor()    Returns the current record's "ProductionSponsor" collection
 * @method Doctrine_Collection getProductionStaff()      Returns the current record's "ProductionStaff" collection
 * @method Production          setName()                 Sets the current record's "name" value
 * @method Production          setTypeId()               Sets the current record's "type_id" value
 * @method Production          setGenreId()              Sets the current record's "genre_id" value
 * @method Production          setLayoutId()             Sets the current record's "layout_id" value
 * @method Production          setCompanyId()            Sets the current record's "company_id" value
 * @method Production          setCollaborationId()      Sets the current record's "collaboration_id" value
 * @method Production          setImageId()              Sets the current record's "image_id" value
 * @method Production          setDescription()          Sets the current record's "description" value
 * @method Production          setStartAt()              Sets the current record's "start_at" value
 * @method Production          setEndAt()                Sets the current record's "end_at" value
 * @method Production          setFundraiser()           Sets the current record's "fundraiser" value
 * @method Production          setAdultTicketPrice()     Sets the current record's "adult_ticket_price" value
 * @method Production          setChildTicketPrice()     Sets the current record's "child_ticket_price" value
 * @method Production          setStudentTicketPrice()   Sets the current record's "student_ticket_price" value
 * @method Production          setFunding()              Sets the current record's "funding" value
 * @method Production          setNotes()                Sets the current record's "notes" value
 * @method Production          setGrossIncome()          Sets the current record's "gross_income" value
 * @method Production          setType()                 Sets the current record's "Type" value
 * @method Production          setGenre()                Sets the current record's "Genre" value
 * @method Production          setLayout()               Sets the current record's "Layout" value
 * @method Production          setCompany()              Sets the current record's "Company" value
 * @method Production          setCollaboration()        Sets the current record's "Collaboration" value
 * @method Production          setImage()                Sets the current record's "Image" value
 * @method Production          setStaff()                Sets the current record's "Staff" collection
 * @method Production          setRoles()                Sets the current record's "Roles" collection
 * @method Production          setSponsors()             Sets the current record's "Sponsors" collection
 * @method Production          setCharacters()           Sets the current record's "Characters" collection
 * @method Production          setProductionSponsor()    Sets the current record's "ProductionSponsor" collection
 * @method Production          setProductionStaff()      Sets the current record's "ProductionStaff" collection
 * 
 * @package    bristol-old-vic-archive
 * @subpackage model
 * @author     Steve Lacey
 * @version    SVN: $Id$
 */
abstract class BaseProduction extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('production');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('type_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('genre_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('layout_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('company_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('collaboration_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('image_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('start_at', 'datetime', null, array(
             'type' => 'datetime',
             'length' => '',
             ));
        $this->hasColumn('end_at', 'datetime', null, array(
             'type' => 'datetime',
             'length' => '',
             ));
        $this->hasColumn('fundraiser', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('adult_ticket_price', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('child_ticket_price', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('student_ticket_price', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('funding', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('notes', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('gross_income', 'float', null, array(
             'type' => 'float',
             ));

        $this->option('orderBy', 'name asc');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Type', array(
             'local' => 'type_id',
             'foreign' => 'id'));

        $this->hasOne('Genre', array(
             'local' => 'genre_id',
             'foreign' => 'id'));

        $this->hasOne('Layout', array(
             'local' => 'layout_id',
             'foreign' => 'id'));

        $this->hasOne('Company', array(
             'local' => 'company_id',
             'foreign' => 'id'));

        $this->hasOne('Collaboration', array(
             'local' => 'collaboration_id',
             'foreign' => 'id'));

        $this->hasOne('Image', array(
             'local' => 'image_id',
             'foreign' => 'id'));

        $this->hasMany('Staff', array(
             'refClass' => 'ProductionStaff',
             'local' => 'production_id',
             'foreign' => 'staff_id'));

        $this->hasMany('Role as Roles', array(
             'refClass' => 'ProductionStaff',
             'local' => 'production_id',
             'foreign' => 'role_id'));

        $this->hasMany('Sponsor as Sponsors', array(
             'refClass' => 'ProductionSponsor',
             'local' => 'production_id',
             'foreign' => 'sponsor_id'));

        $this->hasMany('Character as Characters', array(
             'local' => 'id',
             'foreign' => 'production_id'));

        $this->hasMany('ProductionSponsor', array(
             'local' => 'id',
             'foreign' => 'production_id'));

        $this->hasMany('ProductionStaff', array(
             'local' => 'id',
             'foreign' => 'production_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}