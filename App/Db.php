<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 25.06.2019
 * Time: 21:47
 */

namespace App;


class Db extends Singleton
{
    protected $dbh;
    protected function __construct()
    {
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=php22', 'root', '');
        //echo 'Hellow Db!)';

    }
    public function execute($sql, $substitutios = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();
        return $res;
    }
    public function query($sql, $class, $substitutions = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();
        if(false !== $res){
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
            //return $sth->fetchAll();
        }
        return [];
    }
}