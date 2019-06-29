<?php


namespace App;


class Config
{
    use Singleton;
    protected static $instance;
    public $data = [];
    
    protected function __construct(){
        require_once __DIR__ . '/../db_config.php';
        $this->data['DB_DRIVER'] = DB_DRIVER;
        $this->data['DB_HOST'] = DB_HOST;
        $this->data['DB_NAME'] = DB_NAME;
        $this->data['DB_USER'] = DB_USER;
        $this->data['DB_PASSWORD'] = DB_PASSWORD;
    }
    
    public static function instance()
    {
        if( null === static::$instance ){
            static::$instance = new static;
        }
        return static::$instance;
    }
}