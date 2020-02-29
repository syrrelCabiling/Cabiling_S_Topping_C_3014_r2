<?php 
    require_once '../load.php';
    $ip = $_SERVER['REMOTE_ADDR']; // $_ is a built-in variable

    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        

        if(!empty($username) && !empty($password)){
            //log in user
            $message = login($username, $password, $ip);
        }else{
            $message = 'Please fill out the required field';
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>
<body>
    <h2>Login Page</h2>
    <?php echo !empty($message)? $message: ''; ?>
    <form action="admin_login.php" method="post"> <!-- Post is ideal to use here so information won't be exposed-->
        <label for="">Username:</label>
        <input type="text" name="username" value="">

        <label for="">Password:</label>
        <input type="password" name="password" id="password" value="">

        <button name="submit">SUBMIT</button>
    </form>
</body>
</html>