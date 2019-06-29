<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 25.06.2019
 * Time: 21:47
 */

namespace App;

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
    protected function __construct()
    {
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=php22', 'root', '');
        //echo 'Hellow Db!)';

    }
    public function rules (){}
    public function execute($sql, $substitutions = [])
    {
        $sth = $this->dbh->prepare($sql);
        if(count($substitutions) > 0){
            $res = $sth->execute($substitutions);
        }else{
            $res = $sth->execute();
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