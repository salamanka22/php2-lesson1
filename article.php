<?php
require_once 'autoload.php';
if(isset($_GET['id']) and !empty($_GET['id'])){
    $news_id = $_GET['id'];
    $news = \App\Models\News::findById($news_id);
    
    foreach($news as $news_obj){
        //var_dump($news_obj);
        echo '<h3>' . $news_obj->title . '</h3>';
        echo '<p>' . $news_obj->text . '</p>';
        echo '<p><a href="index.php"> << Назад</a></p>';
        //echo '<br /><hr />';
    }






}else{
    echo '<h2>Упс... новость не найдена! Возможно в ссылке не указан id</h2>';
}



