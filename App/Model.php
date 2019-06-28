<?php


namespace App;

abstract class Model
{
    const TABLE = 'foo';
    abstract public static function findAll($cnt);

    
   abstract public static function findById($id);
}