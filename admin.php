<?php
require_once 'autoload.php';

use \App\Model;
use \App\Models\User;

$article = new \App\Models\News;

if(isset($_POST) and !empty($_POST)){
    if(isset($_POST['article_id']) and !empty($_POST['article_id'])){
        $article->id = $_POST['article_id'];
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $result = $article->save();
        //header( 'Refresh: 3; url=index.php' );
        echo $result."<br />";
    }else{
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $result =  $article->save();
        header( 'Refresh: 3; url=index.php' );
        echo "Новая запись № $article->id успешно добавлена!<br />";
        echo $result;
    }
}
?>
<?php
if(isset($_GET['id']) and !empty($_GET['id'])){
    $article->id = $_GET['id'];
    $up_article = \App\Models\News::findById($article->id);
    ?>

    <p>Форма редактирования новостей:</p>
    <form action="admin.php" method="post">
        <p><input type="hidden" name="article_id" value="<?php echo $article->id; ?>"/></p>
        <p><input type="text" name="title" size="255" value="<?php echo $up_article[0]->title; ?>"/></p>
        <p><textarea name="text" rows="20" cols="60"><?php echo $up_article[0]->text; ?></textarea></p>
        <p><input type="submit" name="update" value="Отправить изменения"/></p>
    </form>
    
    <?php
}
else {
    ?>
    <p>Форма добавления новостей:</p>
    <form action="admin.php" method="post">
        <p><input type="text" name="title" size="255"/></p>
        <p><textarea name="text" rows="20" cols="60"></textarea></p>
        <p><input type="submit" name="insert" value="Добавить новость"/></p>
    </form>
    <?php
}
?>
<p>
    <a href="index.php">На главную!</a>
</p>
