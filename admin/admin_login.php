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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Login Page</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="form">
                <h2 class="mx-auto">Login Page</h2>
                <?php echo !empty($message)? $message: ''; ?>
                <div class="form-group">
                <form action="admin_login.php" method="post" class="px-4 py-3 mx-auto shadow rounded"> <!-- Post is ideal to use here so information won't be exposed-->
                    <label for="">Username:</label>
                    <input type="text" name="username" value="" class="form-control">

                    <label for="">Password:</label>
                    <input type="password" name="password" id="password" value="" class="form-control">

                    <button name="submit" class="btn btn-danger mt-2">LOGIN</button>
                    </div>
                </form>
            </div>
            </div>
            </div>
            </div>
</body>
</html>