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

/**
 * Class User
 * @package App\Models
 */
class User extends Model
{
    const TABLE = 'users';
    /**
     * @var
     */
    public $email;
    /**
     * @var
     */
    public $name;
    
    /**
     * @param int $cnt
     * @return mixed
     */
    public static function findAll(int $cnt)
    {
        $db = \App\Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }
    
    /**
     * @param $id
     * @return bool
     */
    public static function findById($id)
    {
        $db = \App\Db::instance();
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