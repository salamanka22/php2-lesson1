<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 25.06.2019
 * Time: 21:37
 */
require_once 'autoload.php';
$news = \App\Models\News::findAll(3);


require_once __DIR__ . '/templates/News.php';










/*
 //echo 'Hello World!';
//$users = \App\Models\User::findById(1);
//$users = \App\Models\User::findAll();
//echo \App\Model::TABLE;
//echo \App\Models\User::TABLE;
//echo '<br /><pre>';
$db = new \App\Db();
//$res = $db->execute('CREATE TABLE foo (id SERIAL)');

$data = $db->query(
    'SELECT * FROM users',
    'App\Models\User'
);
echo '<pre>';
var_dump($data);
*/
