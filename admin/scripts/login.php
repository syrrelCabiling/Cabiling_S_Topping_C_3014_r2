<?php

// $logintime = "UPDATE tbl_users SET use_time = now() where uname = '$username'";
// mysqli_query($conn, $logintime);

function login($username, $password, $ip){

   $pdo = Database::getInstance()->getConnection();
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
    }
    return $message;
}

?>