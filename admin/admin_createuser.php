<?php 
require_once '../load.php';

confirm_logged_in();

if(isset($_POST['submit'])){
    $fname = trim($_POST['fname']);
    $username = trim($_POST['username']);
    $password = md5($_POST['password']);//hash security
    $email = trim($_POST['email']);

    if(empty($fname) || empty($username) || empty($password) || empty($email)){
        $message = 'Please fill the required fields';
    }else{
        $message = createUser($fname, $username, $password, $email);
    }
}

// function random_password( $length = 8 ) {
//     $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
//     $password = substr( str_shuffle( $chars ), 0, $length );
//     if (password_verify($_POST['password'], $password)) {
//     return $password;
// }
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
    <title>Create User</title>
</head>
<body>
 
    <?php echo !empty($message)? $message: ''; ?>
    <div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="form">
            <h2>Register</h2>
    <form action="admin_createuser.php" method="post" class="px-4 py-3 mx-auto shadow rounded"> <!-- Post is ideal to use here so information won't be exposed-->
                <div class="form-group">
                    <label for="">First Name:</label>
                    <input type="text" name="fname" id="" value="" class="form-control">

                    <label for="">Username:</label>
                    <input type="text" name="username" id="" value="" class="form-control">

                    <span class="span-op">Don't worry about your password for now. We'll email one for you!</span><br>
                    <input type="password" name="password" id="" value="" class="form-control">

                    <label for="">Email:</label>
                    <input type="email" name="email" id="email" value="" class="form-control">

                    <button name="submit" class="btn btn-danger mt-2">CREATE</button>

                    <p>Already a member?<a href="admin_login.php">LOGIN</a></span></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>