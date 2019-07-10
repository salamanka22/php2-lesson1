<?php


namespace App\Models;

use App\Db;
use App\Model;
use App;

/**
 * Class News
 * @package App\Models
 */
class News extends Model
{
    const TABLE = 'news';
    /**
     * @var
     */
    public $title;
    /**
     * @var
     */
    public $text;
    
    public function getName()
    {
    
    }
    
    /**
     * @param $id
     * @return bool
     */
    public static function findById($id){
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
    
    /**
     * @param int $cnt
     * @return mixed
     */
    public static function findAll(int $cnt)
    {
        $db = \App\Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' LIMIT ' .$cnt,
            static::class
        );
    }
    
}