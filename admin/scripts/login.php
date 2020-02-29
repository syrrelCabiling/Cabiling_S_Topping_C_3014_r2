<?php

function login($username, $password, $ip){

   $pdo = Database::getInstance()->getConnection();
   //Check instance
    $check_exist_query = 'SELECT COUNT(*) FROM tbl_user WHERE user_name= :username'; 
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username' => $username,
        )
    );

    if($user_set->fetchColumn()>0){
        //user exist
        //$message = 'User Exists!';

        $get_user_query = 'SELECT * FROM tbl_user WHERE user_name = :username;';
        $get_user_query .= ' AND user_pass = :password';
        $user_check = $pdo->prepare($get_user_query);
        $user_check->execute(
            array(
                ':username'=>$username,
                ':password'=>$password
            )
        );


        //TODO: finish the folowing lines so that when user logged in, the user_ip column updated by the $ip
        while($found_user = $user_check->fetch(PDO::FETCH_ASSOC)){
            $id = $found_user['user_id'];
            $message = 'You just logged in!';

            //creating a locker for the user
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $$found_user['user_fname'];


            
            $update_query = 'UPDATE tbl_user SET user_ip = :ip WHERE user_id = :id'; //instead of diaplying the id, display the ip instead
            $update_set = $pdo->prepare($update_query);
           //echo $update_query; exit;
            
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
    }
    return $message;
}



?>

<?php 

// function login($username, $password, $ip){
// } THIS IS ALREADY AT THE TOP

function confirm_logged_in(){ // storing login data into the user locker/server
    if(!isset($_SESSION['user_id'])){
        redirect_to('admin_login.php');
    }
}

function logout(){ //destroying the login data from the user locker/server
    session_destroy();
    redirect_to('admin_login.php');
}
?>