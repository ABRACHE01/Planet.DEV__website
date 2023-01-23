<?php

class Article
{

     static public function getAll()
     {
          $stmt = DB::connect()->prepare('SELECT a.*, c.name,d.fullname FROM article a JOIN category c ON a.category_id = c.category_id JOIN user d ON a.user_id = d.id;');
          $stmt->execute();
          return $stmt->fetchAll();
          $stmt = null;
     }
     static public function getAdminArt($currentAdmin)
     {
          $stmt = DB::connect()->prepare("SELECT a.*, c.name,d.fullname FROM article a JOIN category c ON a.category_id = c.category_id JOIN user d ON a.user_id = d.id WHERE a.user_id = '$currentAdmin' ;");
          $stmt->execute();
          return $stmt->fetchAll();
          $stmt = null;
     }

     static public function getArticle($data)
     {

          $id = $data['id'];

          try {

               $query = 'SELECT a.*, c.name FROM article a JOIN category c ON a.category_id = c.category_id WHERE a.article_id = :id';
               $stmt = DB::connect()->prepare($query);
               $stmt->execute(array(":id" => $id));
               $article = $stmt->fetch(PDO::FETCH_OBJ);

               return $article;
          } catch (PDOException $ex) {

               echo 'errore' . $ex->getMessage();
          }
     }

     static public function add($data)
     {

          $stmt = DB::connect()->prepare('INSERT into `article`(  `title`, `author`, `content`, `category_id`, `date_created`, `user_id`) values( :title, :author, :content, :category,:date_created ,:user_id ) ');
          $stmt->bindParam(':title', $data['title']);
          $stmt->bindParam(':author', $data['author']);
          $stmt->bindParam(':content', $data['content']);
          $stmt->bindParam(':category', $data['category']);
          $stmt->bindParam(':date_created', $data['date_created']);
          $stmt->bindParam(':user_id', $data['user_id']);




          if ($stmt->execute()) {
               return 'ok';
          } else {
               return 'error';
          }

          $stmt = null;
     }

     static public function delete($data)
     {
          $id = $data['article_id'];

          try {

               $query = "  DELETE FROM `article` WHERE article_id=:id";
               $stmt = DB::connect()->prepare($query);
               $stmt = DB::connect()->prepare($query);
               $stmt->execute(array(":id" => $id));

               if ($stmt->execute()) {
                    return 'ok';
               }
          } catch (PDOException $ex) {

               echo 'errore' . $ex->getMessage();
          }
     }


     static public function searchArticle($data)
     {
          $search = $data['search'];
          try {
               $query = " SELECT a.*, c.name,d.fullname FROM article a JOIN category c ON a.category_id = c.category_id JOIN user d ON a.user_id = d.id  where title like ? or name like ?";
               $stmt = DB::connect()->prepare($query);
               $stmt->execute(array('%' . $search . '%','%' . $search . '%'));
               $article = $stmt->fetchAll();
               return $article;
          } catch (PDOException $ex) {

               echo 'errore' . $ex->getMessage();
          }
     }
   
     static public function update($data)
     {

          $stmt = DB::connect()->prepare('UPDATE `article` SET `title`= :title, `author`=:author, `content`=:content, `content`=:content, `category_id`=:category where article_id = :id');
          $stmt->bindParam(':id', $data['id']);
          $stmt->bindParam(':title', $data['title']);
          $stmt->bindParam(':author', $data['author']);
          $stmt->bindParam(':content', $data['content']);
          $stmt->bindParam(':category', $data['category']);
          $stmt->bindParam(':date_created', $data['date_created']);

          // die(print_r($data));

          if ($stmt->execute()) {
               return 'ok';
          } else {
               return 'error';
          }

          $stmt = null;
     }

     static public function rowCount($user)
     {



          $stmt = DB::connect()->prepare("SELECT * FROM `$user`");


          $stmt->execute();
          $res = $stmt->rowCount();
          return $res;
     }
}
