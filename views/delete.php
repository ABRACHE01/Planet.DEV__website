<?php 
if(isset($_POST['delete_id'])){
    $existedArticle = new ArticleController();
    $existedArticle->deleteArticle();
}else{
    Redirect::to('dashboard');
}
?>