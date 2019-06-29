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
       
       
       //echo $sql."<br />";
       
       $db = Db::instance();
       $res = $db->execute($sql, $values);
       //var_dump($res);
       //echo "<br />";
       
       $this->id = $db->id;
       //echo $this->id;
   }
   
   public function update()
   {
      //$sql = "UPDATE " . static::TABLE . "";
   }
   
   public function save()
   {
       if(null == $this->id){
           $this->insert();
       }else{
           $this->update();
       }
   }

   public function delete($id){
       $sql = "DELETE FROM ". static::TABLE . " WHERE id=".$id;
       $db = Db::instance();
       $res = $db->execute($sql);
       if(true == $res and $db->rowCount > 0){
           echo "Запись $id удачно удалена из таблицы ".static::TABLE . " затронуто строк: ".$db->rowCount;
       }else{
           echo "Ошибка удаления записи id = $id! Результат: $res затронуто строк: ".$db->rowCount;
       }
   }
}