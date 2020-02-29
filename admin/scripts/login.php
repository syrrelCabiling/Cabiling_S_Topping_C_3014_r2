<?php


function login($username, $password, $ip){

   $pdo = Database::getInstance()->getConnection();
   $attempt = 0; //Times of failed logged in attempts as of now - it will increment by 1 every wrong login
   if($attempt<4){ //3 failed logins will result in a temporary ban.
   //Check instance
    $check_exist_query = 'SELECT COUNT(*) FROM tbl_users WHERE uname= :username AND pword= :password'; 
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username' => $username,
            ':password'=>$password
        )
    );




    if($user_set->fetchColumn()>0){
        //user exist
       $message = 'User Exists!';

        $get_user_query = 'SELECT * FROM tbl_users WHERE uname = :username;';
        $get_user_query .= ' AND pword = :password';
        $user_check = $pdo->prepare($get_user_query);
        $user_check->execute(
            array(
                ':username'=>$username,
                ':password'=>$password
            )
        );


        //TODO: finish the folowing lines so that when user logged in, the user_ip column updated by the $ip
        while($found_user = $user_check->fetch(PDO::FETCH_ASSOC)){
            $id = $found_user['ID'];
            $message = 'You just logged in!';

             //creating a locker for the user
             $_SESSION['ID'] = $id;
             $_SESSION['uname'] = $found_user['user_fname'];
 
            
            $update_query = 'UPDATE tbl_users SET user_ip = :ip WHERE ID = :id'; //instead of diaplying the id, display the ip instead
            $update_set = $pdo->prepare($update_query);
        //    echo $update_query; 
        //    exit;
            
            $update_set->execute(
               array(
                   ':ip'=>$ip,
                   ':id'=>$id
               )
            );
        } 

        if(isset($id)){
            redirect_to('index.php');

        }


    }else{
       
       $message = 'User does not exist!';

       $attempt++;
       echo ("This is attempt $attempt out of 3 ");
        
      
    }
    return $message;
}
}

function confirm_logged_in(){ // storing login data into the user locker/server
    if(!isset($_SESSION['ID'])){
        redirect_to('admin_login.php');
    }
}

function logout(){ //destroying the login data from the user locker/server
    session_destroy();
    redirect_to('admin_login.php');
}




?>


