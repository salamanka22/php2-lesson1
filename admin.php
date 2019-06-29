<?php
require_once 'autoload.php';

use \App\Model;
use \App\Models\User;

$article = new \App\Models\News;

if(isset($_POST) and !empty($_POST)){
    $article->title = $_POST['title'];
    $article->text = $_POST['text'];
    $article->save();
    if(null !== $article->id){
        header( 'Refresh: 3; url=index.php' );
        echo "Новая запись № $article->id успешно добавлена!<br />";
    }else{
        echo "Ошибка при добавлении записи.";
    }
}
?>
<?php
if(isset($_GET['id']) and !empty($_GET['id'])){
    $article->id = $_GET['id'];
    
}
else {
    ?>
    <p>Форма добавления новостей:</p>
    <form action="admin.php" method="post">
        <p><input type="text" name="title" lang="200"/></p>
        <p><textarea name="text" rows="20" cols="40"></textarea></p>
        <p><input type="submit" name="insert" value="Добавить новость"/></p>
    </form>
    <?php
}
?>
