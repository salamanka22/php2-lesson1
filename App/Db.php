<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 25.06.2019
 * Time: 21:47
 */

namespace App;
//use \App\Config;

interface DbRules
{
    public function execute($sql, $substitutios = []);
    public function query($sql, $class, $substitutions = []);
    public function rules ();
}

class Db implements DbRules
{
    use Singleton;
    protected $dbh;
    public $rowCount;
    public $config;
    public $id;
    protected function __construct()
    {
        $this->config = \App\Config::instance();
        $this->dbh = new \PDO($this->config->data['DB_DRIVER'].':host=' . $this->config->data['DB_HOST'] . ';dbname='.$this->config->data['DB_NAME'], $this->config->data['DB_USER'], $this->config->data['DB_PASSWORD']);
        //echo 'Hellow Db!)';

    }
    public function rules (){}
    public function execute($sql, $substitutions = [])
    {
        $sth = $this->dbh->prepare($sql);
        if(count($substitutions) > 0){
            $res = $sth->execute($substitutions);
            $this->id = $this->dbh->lastInsertId();
        }else{
            $res = $sth->execute();
            $this->rowCount = $sth->rowCount();
        }
        
        
        return $res;
    }
    public function query($sql, $class, $substitutions = [])
    {
        $sth = $this->dbh->prepare($sql);
        if(count($substitutions) > 0){
            $res = $sth->execute($substitutions);
        }else{
            $res = $sth->execute();
        }
        if(false !== $res){
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
            //return $sth->fetchAll();
        }
        return [];
    }
}