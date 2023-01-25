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

            // if(isset($_FILES["image"]) ){
                //     $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                //     $filename = $_FILES["image"]["name"];
                //     $filetype = $_FILES["image"]["type"];
                //     $filesize = $_FILES["image"]["size"];
                
                //     // Verify file extension
                //     $ext = pathinfo($filename, PATHINFO_EXTENSION);
                //     if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                
                //     // Verify file size - 5MB maximum
                //     $maxsize = 5 * 1024 * 1024;
                //     if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                
                //     // Verify MYME type of the file
                //     if(in_array($filetype, $allowed)){
                //         // Check whether file exists before uploading it
                //         if(file_exists("uploaded_images/" . $_FILES["image"]["name"])){
                //             echo $_FILES["image"]["name"] . " is already exists.";
                //         } else{
                //             move_uploaded_file($_FILES["image"]["tmp_name"], "uploaded_images/" . $_FILES["image"]["name"]);
                //             echo "Your file was uploaded successfully.";
                //         } 
                //     } else{
                //         echo "Error: There was a problem uploading your file. Please try again."; 
                //     }
                // } else{
                //     echo "Error: " . $_FILES["image"]["error"];
        
        
           
                
                // }
                
               

            for($i=0 ;$i < sizeof($_POST['title']) ;$i++){

                $image = $_FILES['image']['name'][$i];
                $filename = uniqid();
                $extension = pathinfo( $image, PATHINFO_EXTENSION);
                 $newname = "article-".$filename.".".$extension;
                $target = "uploaded_images/".$newname;
                move_uploaded_file($_FILES['image']['tmp_name'][$i],$target);



                $data = array(
                    'title' => $_POST['title'][$i],
                    'author' => $_POST['author'][$i],
                    'content' => $_POST['content'][$i],
                    'category' => $_POST['category'][$i],
                    'date_created' => $_POST['date_created'][$i],
                    'user_id' => $_POST['admin'][$i],   
                    'image' =>  $newname,
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
            $deletedimage=$_POST['image'];
         
            if (file_exists("uploaded_images/".$deletedimage)) {   
                unlink("uploaded_images/".$deletedimage); 
            }

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