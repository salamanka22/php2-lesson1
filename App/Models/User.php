<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 25.06.2019
 * Time: 22:54
 */

namespace App\Models;

use App\Db;
use App\Model;

class User extends Model
{
    const TABLE = 'users';
    public $email;
    public $name;
    
    public static function findAll(int $cnt)
    {
        $db = new Db();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }
    
    public static function findById($id)
    {
        $db = new Db();
        $result = $db->query(
            'SELECT * FROM ' . self::TABLE . ' WHERE id = '.$id,
            //'SELECT * FROM foo WHERE id = 2',
            static::class
        );
        if( count($result) > 0 ){
            return $result;
        }
        return false;
    }
}