<?php
class Brand extends \PicOrm\Entity
{
    protected static $_tableName = 'brands';
    protected static $_primaryKey = "idBrand";
    protected static $_relations = array();

    protected static $_tableFields = array(
        'nameBrand',
        'noteBrand'
    );

    public $idBrand;
    public $nameBrand;
    public $noteBrand;

    protected static function defineRelations()
    {
        // create a relation between Brand and Car
        // based on this.idBrand = Car.idBrand
        self::addRelationOneToMany('idBrand', 'Car', 'idBrand');
    }
}

class Tag extends \PicOrm\Entity
{
    protected static $_tableName = 'tags';
    protected static $_primaryKey = "idTag";
    protected static $_relations = array();

    protected static $_tableFields = array(
        'libTag',
    );

    public $idTag;
    public $libTag = '';

    protected static function defineRelations()
    {
        self::addRelationManyToMany('idTag','Car','idCar','car_have_tag');
    }
}

class Car extends \PicOrm\Entity
{
    protected static $_tableName = 'cars';
    protected static $_primaryKey = "idCar";
    protected static $_relations = array();

    protected static $_tableFields = array(
        'idBrand',
        'nameCar',
        'noteCar'
    );

    public $idCar;
    public $idBrand;
    public $nameCar = '';

    protected static function defineRelations()
    {
        // create a relation between Car and Brand
        // based on this.idBrand = Brand.idBrand
        // nameBrand is added to autoget fields which is automatically fetched
        // when entity is loaded
        self::addRelationOneToOne('idBrand', 'Brand', 'idBrand', 'nameBrand');
        self::addRelationManyToMany("idCar","Tag","idTag","car_have_tag");
    }
}