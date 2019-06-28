<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 25.06.2019
 * Time: 21:37
 */
require_once 'autoload.php';

use \App\Model;
use \App\Models\User;

$news = \App\Models\News::findAll(3);
$users = \App\Models\User::findAll(0);

function sendEmail(User $user, string $message)
{
    echo 'Почта уходит на ' . $user->email;
}

sendEmail($users[2], 'Hello!!!');


//echo '<br /><pre>';
//var_dump($users);

//require_once __DIR__ . '/templates/News.php';










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
