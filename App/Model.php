<?php


namespace App;

abstract class Model
{
    public $id;
    const TABLE = 'users';
    abstract public static function findAll(int $cnt);

    
   abstract public static function findById($id);
   
   public function isNew(){
       return empty($this->id);
   }
   
   public function insert(){
       if(!$this->isNew()){
           return;
       }
       
       $columns = [];
       $values = [];
       foreach ($this as $k => $v){
           if('id' == $k){
               continue;
           }
           $columns[] = $k;
           $values[':'.$k] = $v;
       }
       //var_dump($values);
       
       //$sql='INSERT INTO' . static::TABLE . ' (' . implode(",", $columns) . ') VALUES (' . implode(",", $values) . ')';
       
       //$sql = "INSERT INTO " . static::TABLE . " (" . implode(',', $columns) . ") VALUES ('pidar@gmail.com','Frodo')";
       $sql = "INSERT INTO " . static::TABLE . " (" . implode(',', $columns) . ") VALUES (" . implode(',', array_keys($values)) . ")";
       
       
       echo $sql."<br />";
       
       $db = Db::instance();
       $res = $db->execute($sql, $values);
       var_dump($res);
   }
}