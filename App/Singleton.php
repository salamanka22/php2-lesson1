<?php


namespace App;


class Singleton
{
    protected static $instance;
    public $counter;
    
    protected function __construct(){}
    
    public static function instance()
    {
        if( null === self::$instance ){
            self::$instance = new self;
        }
        return self::$instance;
    }
    
}