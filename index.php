<?php
//declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 25.06.2019
 * Time: 21:37
 */
require_once 'autoload.php';

use \App\Model;
use \App\Models\User;

$users = \App\Models\User::findAll(0);

//$users = [1,2,3];
require_once __DIR__.'/templates/index.php';
/*
$article = new \App\Models\News;
$article->title = "Заголовок тестовой новости!";
$article->text = "Полный текст для нашей новой тестовой новости. Ну и конечно фродо Пидар.";

if(isset($_GET['id']) and !empty($_GET['id']) ){
    $article->delete($_GET['id']);
}

$news = \App\Models\News::findAll(100);
require_once __DIR__ . '/templates/News.php';

*/










/*
$user = new \App\Models\User();
$user->name = 'Frodo';
$user->email = 'pidar@gmail.com';
$user->insert();
*/



//var_dump($config->data);











/*
echo '<br /><hr />';
function sum (string $a, int $b)
{
    echo $a + $b;
}

sum(1.9, 2.3);
*/













/*
$news = \App\Models\News::findAll(3);
$users = \App\Models\User::findAll(0);

function sendEmail(User $user, string $message)
{
    echo 'Почта уходит на ' . $user->email;
}

sendEmail($users[2], 'Hello!!!');







*/

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
