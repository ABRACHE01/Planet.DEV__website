<?php 

class User{

     static public function AdminsNum(){
          
          $stmt = DB::connect()->prepare('SELECT * FROM user ');
          
          return  $stmt->rowCount();
          
       
         
          
     }
    static public function createUser($data){
     
        $stmt = DB::connect()->prepare('INSERT into `user`( `fullname`, `email`,`password`) values( :fullname, :email,:password) ');
        $stmt->bindParam(':fullname', $data['fullname']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);

        if ($stmt->execute()) {

             return 'ok';
        } else {
             return 'error';
        }
        $stmt = null;


    }
 
    static public function login($data){ 
       
        $email = $data['email'];
        try {

             $query = "  SELECT * FROM `user` WHERE email=:email";
             $stmt = DB::connect() ->prepare($query);
             $stmt->execute(array( ":email" => $email ));
             $user= $stmt->fetch(PDO::FETCH_OBJ);
             return $user ;

        } catch (PDOException $ex) {

             echo 'errore' . $ex->getMessage();
        }

        
        
   }
   


}
