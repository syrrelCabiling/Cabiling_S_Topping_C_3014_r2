<?php 
    require_once '../load.php';
    confirm_logged_in();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Dashboard</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <h2>Welcome to your Dashboard <?php echo $_SESSION['user_name'];?>!</h2> 

    <a href="admin_createuser.php"><button class="btn-sm btn-primary">Create User</button></a>


    <a href="admin_login.php"><button class="btn-sm btn-danger">LOGOUT</button></a>
    </div>
    </div>
    </div>
</body>
</html>