<?php 
if(isset($_POST['delete_id']) && isset($_POST['image']) ){
    $existedArticle = new ArticleController();
    $existedArticle->deleteArticle();
}else{
    Redirect::to('dashboard');
}
?>