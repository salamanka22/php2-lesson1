<?php
foreach($news as $news_obj){
    //var_dump($news_obj);
    echo '<a href="article.php?id=' . $news_obj->id . '"><h3>' . $news_obj->title . '</h3></a>';
    echo '<p>' . $news_obj->text . '</p>';
    echo '<p><a href="article.php?id=' . $news_obj->id . '">Подробнее...</a></p>';
    echo '<p><a href="index.php?id=' . $news_obj->id . '">Удалить новость</a></p>';
    echo '<br /><hr />';
}