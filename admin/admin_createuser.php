<?php 
require_once '../load.php';

confirm_logged_in();

if(isset($_POST['submit'])){
    $fname = trim($_POST['fname']);
    $username = trim($_POST['username']);
    //$password = trim($_POST['password']); we don't need this for now. 
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
<body><div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="form">
                <h2>REGISTER</h2>
                <?php echo !empty($message)? $message: ''; ?>
                <form action="admin_createuser.php" method="post" class="px-4 py-3 mx-auto shadow rounded">
                    <label>First Name</label>
                    <input type="text" name="fname" value="" class="form-control">
                    <label>Username</label>
                    <input type="text" name="username" value="" class="form-control">
                    <label>Don't worry about your password for now. We'll email one for you!</label>
                    <input type="text" name="password" value="" disabled class="form-control">
                    <label>Email</label>
                    <input type="email" name="email" value="" class="form-control">
                    <button name="submit" class="btn btn-danger mt-2">SIGNUP</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>