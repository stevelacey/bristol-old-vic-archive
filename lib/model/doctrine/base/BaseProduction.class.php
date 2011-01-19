<?php

/**
 * BaseProduction
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $pvm_code
 * @property integer $image_id
 * @property integer $production_type_id
 * @property integer $genre_id
 * @property integer $company_id
 * @property integer $director_id
 * @property integer $producer_id
 * @property integer $technician_id
 * @property string $description
 * @property string $booking_status
 * @property string $contract_details
 * @property string $collaboration_nature
 * @property string $funding
 * @property string $notes
 * @property float $gross_income
 * @property Image $Image
 * @property ProductionType $Type
 * @property Genre $Genre
 * @property Company $Company
 * @property Person $Director
 * @property Person $Producer
 * @property Person $Technician
 * @property Doctrine_Collection $Performances
 * @property Doctrine_Collection $Characters
 * @property Doctrine_Collection $Images
 * 
 * @method string              getName()                 Returns the current record's "name" value
 * @method string              getPvmCode()              Returns the current record's "pvm_code" value
 * @method integer             getImageId()              Returns the current record's "image_id" value
 * @method integer             getProductionTypeId()     Returns the current record's "production_type_id" value
 * @method integer             getGenreId()              Returns the current record's "genre_id" value
 * @method integer             getCompanyId()            Returns the current record's "company_id" value
 * @method integer             getDirectorId()           Returns the current record's "director_id" value
 * @method integer             getProducerId()           Returns the current record's "producer_id" value
 * @method integer             getTechnicianId()         Returns the current record's "technician_id" value
 * @method string              getDescription()          Returns the current record's "description" value
 * @method string              getBookingStatus()        Returns the current record's "booking_status" value
 * @method string              getContractDetails()      Returns the current record's "contract_details" value
 * @method string              getCollaborationNature()  Returns the current record's "collaboration_nature" value
 * @method string              getFunding()              Returns the current record's "funding" value
 * @method string              getNotes()                Returns the current record's "notes" value
 * @method float               getGrossIncome()          Returns the current record's "gross_income" value
 * @method Image               getImage()                Returns the current record's "Image" value
 * @method ProductionType      getType()                 Returns the current record's "Type" value
 * @method Genre               getGenre()                Returns the current record's "Genre" value
 * @method Company             getCompany()              Returns the current record's "Company" value
 * @method Person              getDirector()             Returns the current record's "Director" value
 * @method Person              getProducer()             Returns the current record's "Producer" value
 * @method Person              getTechnician()           Returns the current record's "Technician" value
 * @method Doctrine_Collection getPerformances()         Returns the current record's "Performances" collection
 * @method Doctrine_Collection getCharacters()           Returns the current record's "Characters" collection
 * @method Doctrine_Collection getImages()               Returns the current record's "Images" collection
 * @method Production          setName()                 Sets the current record's "name" value
 * @method Production          setPvmCode()              Sets the current record's "pvm_code" value
 * @method Production          setImageId()              Sets the current record's "image_id" value
 * @method Production          setProductionTypeId()     Sets the current record's "production_type_id" value
 * @method Production          setGenreId()              Sets the current record's "genre_id" value
 * @method Production          setCompanyId()            Sets the current record's "company_id" value
 * @method Production          setDirectorId()           Sets the current record's "director_id" value
 * @method Production          setProducerId()           Sets the current record's "producer_id" value
 * @method Production          setTechnicianId()         Sets the current record's "technician_id" value
 * @method Production          setDescription()          Sets the current record's "description" value
 * @method Production          setBookingStatus()        Sets the current record's "booking_status" value
 * @method Production          setContractDetails()      Sets the current record's "contract_details" value
 * @method Production          setCollaborationNature()  Sets the current record's "collaboration_nature" value
 * @method Production          setFunding()              Sets the current record's "funding" value
 * @method Production          setNotes()                Sets the current record's "notes" value
 * @method Production          setGrossIncome()          Sets the current record's "gross_income" value
 * @method Production          setImage()                Sets the current record's "Image" value
 * @method Production          setType()                 Sets the current record's "Type" value
 * @method Production          setGenre()                Sets the current record's "Genre" value
 * @method Production          setCompany()              Sets the current record's "Company" value
 * @method Production          setDirector()             Sets the current record's "Director" value
 * @method Production          setProducer()             Sets the current record's "Producer" value
 * @method Production          setTechnician()           Sets the current record's "Technician" value
 * @method Production          setPerformances()         Sets the current record's "Performances" collection
 * @method Production          setCharacters()           Sets the current record's "Characters" collection
 * @method Production          setImages()               Sets the current record's "Images" collection
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
        $this->hasColumn('pvm_code', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('image_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('production_type_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('genre_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('company_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('director_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('producer_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('technician_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('booking_status', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('contract_details', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('collaboration_nature', 'string', null, array(
             'type' => 'string',
             'length' => '',
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
        $this->hasOne('Image', array(
             'local' => 'image_id',
             'foreign' => 'id'));

        $this->hasOne('ProductionType as Type', array(
             'local' => 'production_type_id',
             'foreign' => 'id'));

        $this->hasOne('Genre', array(
             'local' => 'genre_id',
             'foreign' => 'id'));

        $this->hasOne('Company', array(
             'local' => 'company_id',
             'foreign' => 'id'));

        $this->hasOne('Person as Director', array(
             'local' => 'director_id',
             'foreign' => 'id'));

        $this->hasOne('Person as Producer', array(
             'local' => 'producer_id',
             'foreign' => 'id'));

        $this->hasOne('Person as Technician', array(
             'local' => 'technician_id',
             'foreign' => 'id'));

        $this->hasMany('Performance as Performances', array(
             'local' => 'id',
             'foreign' => 'production_id'));

        $this->hasMany('Character as Characters', array(
             'local' => 'id',
             'foreign' => 'production_id'));

        $this->hasMany('Image as Images', array(
             'local' => 'id',
             'foreign' => 'production_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}