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
    <title>Dashboard</title>
</head>
<body>
    <!-- user's name not showing up -->
    <h2>Welcome to your Dashboard <?php echo $_SESSION['user_name'];?>!</h2> 

    <a href="admin_createuser.php">Create User</a>


    <a href="admin_login.php">Sign out</a>
</body>
</html>