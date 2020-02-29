<?php 
require_once '../load.php';
confirm_logged_in();

if(isset($_POST['create'])){
    $fname = trim($_POST['user_fname']);
    $username = trim($_POST['uname']);
    $email = trim($_POST['email']);

    if(empty($email) || empty($username) || empty($fname)){
        $message = 'Please fill the required fields';
    }else{
        $message = createUser($fname, $username, $email);
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
    <title>Create User</title>
</head>
<body>
 
    <?php echo !empty($message)? $message: ''; ?>
    <div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="form">
            <h2>Register</h2>
    <form action="admin_login.php" method="post" class="px-4 py-3 mx-auto shadow rounded"> <!-- Post is ideal to use here so information won't be exposed-->
                <div class="form-group">
                    <label for="">First Name:</label>
                    <input type="text" name="name" id="" value="" class="form-control">

                    <label for="">Username:</label>
                    <input type="text" name="username" id="" value="" class="form-control">

                    <span class="span-op">Don't worry about your password for now. We'll email one for you!</span><br>

                    <label for="">Email:</label>
                    <input type="email" name="email" id="email" value="" class="form-control">

                    <button name="create" class="btn btn-danger mt-2">CREATE</button>

                    <p>Already a member?<a href="admin_login.php">LOGIN</a></span></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>