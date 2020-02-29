<?php 


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';


function createUser($fname, $username, $email){
    $pdo = Database::getInstance()->getConnection();
    
    //TODO: finish the below so that it can run a SQL query
    // to create a new user with provided data
    $create_user_query = 'INSERT INTO tbl_user(user_fname, user_name, user_pass, user_email, user_ip)';
    $create_user_query .= ' VALUES(:fname, :username, :password, :email, "no" )';

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $random_pword = random_pw($chars, 8);

    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_result = $create_user_set->execute(
        array(
            ':fname'=>$fname,
            ':username'=>$username,
            ':password'=>$random_pword,
            ':email'=>$email,
        )
    );
     //TODO: redirect to index.php if creat user successfully
    // otherwise, return a error message
    if($create_user_result){

        
        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        
        //Enable SMTP debugging
        // SMTP::DEBUG_OFF = off (for production use)
        // SMTP::DEBUG_CLIENT = client messages
        // SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
        
        //Set the encryption mechanism to use - STARTTLS or SMTPS
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'csyrrel@gmail.com';
        
        //Password to use for SMTP authentication
        $mail->Password = '@Hibernate08';
        
        //Set who the message is to be sent from
        $mail->setFrom('csyrrel@gmail.com', 'Syrrel C.');
        
        //Set an alternative reply-to address
        $mail->addReplyTo('csyrrel@gmail.com', 'Syrrel C.');
        
        //Set who the message is to be sent to
        $mail->addAddress($email, $fname);
        
        //Set the subject line
        $mail->Subject = 'Your New Password!!';
        
        $mail->Body='
        Hi there! Here is your new passord and credentials!
        Username: `$username`
        Password: `$random_pw`
        Sign Back In: http://localhost:8888/Cabiling_S_Topping_C_3014_r2/admin/index.php';
        
        
        if(!$mail->send()){
            echo 'Credentials sent!';
        } else{
            echo 'The message did not go through. Try again';
        }
        
    
        
       // return $result;



        redirect_to('index.php');
    }else{
        return 'The user did not go through';
    }
}