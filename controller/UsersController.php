<?php 


class UsersController{

    public function register(){

        if(isset($_POST['submit'])&& ($_POST['fullname' ]&& $_POST['password']!=="")){

            $options =[
                'cost' => 12
            ];

            $password = password_hash($_POST['password'],PASSWORD_BCRYPT,$options);
          
                $data = array(
                    'fullname' => $_POST['fullname'],
                    'email' =>  $_POST['email'],
                    'password' => $password,
                );
    
                $result = User::createUser($data);
                if ($result === 'ok') {
                    Session::set('success','account created successfuly ');
                    Redirect::to('login');
                   
             } else {
    
                    echo $result;
                }
            
        
    
        }
    }

    static public function auth(){ 


        if(isset($_POST['submit'])&&($_POST['email' ]&& $_POST['password']!=="")){

           
            $data['email'] = $_POST['email'];
          
            $result = User::login($data);
            // print_r($result);
            // die();
            if( $result -> email === $_POST['email'] && password_verify($_POST['password'] , $result-> password )){

                $_SESSION['logged'] = true;
                $_SESSION['fullname']= $result-> fullname;
                $_SESSION['id']= $result-> id;
                
                Redirect::to('home');
             

            }else{
                Session::set('error',' email or pzssword incorrect');
                Redirect::to('home');

            }
           
        

        }
    



    }

    static public function logout(){
        session_destroy();
    }
    static public function userCount(){

        $num = user::AdminsNum();

        return $num;


    }
    

}
