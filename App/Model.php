<?php


namespace App;

abstract class Model
{
    public $id;
    const TABLE = 'news';
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
       
       $sql = "INSERT INTO " . static::TABLE . " (" . implode(',', $columns) . ") VALUES (" . implode(',', array_keys($values)) . ")";
       
       $db = Db::instance();
       $res = $db->execute($sql, $values);
       $this->id = $db->id;
       return $res;
   }
   
   public function update()
   {
      $sql = "UPDATE " . static::TABLE . " SET title='$this->title', text='$this->text' WHERE id='$this->id'";
       $db = Db::instance();
       $values = [$this->title, $this->text, $this->id];
       $res = $db->execute($sql);
       if(true == $res and $db->rowCount > 0){
           $result = "Запись $this->id таблицы " . static::TABLE . " обновлена успешно затронуто строк: ".$db->rowCount;
       }else{
           $result = "Ошибка обновления записи id = $this->id в таблице " . static::TABLE . " Результат: $res затронуто строк: ".$db->rowCount;
       }
       return $result;
   }
   
   public function save()
   {
       if(null == $this->id){
           $result = $this->insert();
       }else{
           $result = $this->update();
       }
       return $result;
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