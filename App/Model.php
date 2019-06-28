<?php


namespace App;

abstract class Model
{
    const TABLE = 'foo';
    abstract public static function findAll(int $cnt);

    
   abstract public static function findById($id);
}