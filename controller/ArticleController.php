<?php
class ArticleController
{

    public function getAllArticle()
    {
        $article = Article::getAll();

        return $article;
    }

    public function getAdminArticle()
    {
        $article = Article::getAdminArt($_SESSION['id']);

        return $article;
    }

    public function getOneArticle()
    {
        if(isset($_POST['id'])){
            $data = array(
                'id' => $_POST['id'] 
            );
        }
       $article = Article::getArticle($data);
       return $article;
    }

    public function addArticle()
    {
        if (isset($_POST['ok'])) {

            for($i=0 ;$i < sizeof($_POST['title']) ;$i++){

                $data = array(
                    'title' => $_POST['title'][$i],
                    'author' => $_POST['author'][$i],
                    'content' => $_POST['content'][$i],
                    'category' => $_POST['category'][$i],
                    'date_created' => $_POST['date_created'][$i],
                    'user_id' => $_POST['admin'][$i],    
                );  
                $result = Article::add($data);
            }
           
            if ($result === 'ok') {
                Session::set('success','Article Ajouter');
                Redirect::to('dashboard');
            } else {

                echo $result;
            }
        }
    }

    public function deleteArticle()
    {
        if(isset($_POST['delete_id'])){
            $data['article_id']=$_POST['delete_id'];
            $result = Article::delete($data);
            if ($result === 'ok') {
                Session::set('error','Article Deleted');
                Redirect::to('dashboard');
            } else {
                echo $result;
            }

        }
      
    }

    public function  findArticle(){

        if(isset($_POST['search'])){
            $data = array('search' => $_POST['search']);
        }
        $articles= Article::searchArticle($data);
        return   $articles;
    }
    
    public function  updateArticle()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $_POST['id'],
                'title' => $_POST['title'],
                'author' => $_POST['author'],
                'content' => $_POST['content'],
                'category' => $_POST['category'],
                'date_created' => $_POST['date_created'],
            );

            $result = Article::update($data);
            if ($result === 'ok') {
                Session::set('info','Article Updated');
                Redirect::to('dashboard');
            } else {
                echo $result;
            }
        }
    }
   

}