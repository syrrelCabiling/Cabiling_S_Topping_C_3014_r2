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
                <!-- Timestamp here through php -->
                    <?php
                    //$logintime = "UPDATE tbl_users SET use_time = now() where uname = '$username'";
                    // mysqli_query($conn, $logintime);
                    
                    date_default_timezone_set('America/New_York');
                    $tstamp = time(); //literally just fetching the timestamp straight from the db
            
                    echo "Last login session: ".date('h:i A, l - d M Y', $tstamp)."<br>";?>  
                <!-- End of Timestamp -->

                <h2>Welcome! <?php echo $_SESSION['uname'];?></h2>
               
                <?php
date_default_timezone_set('America/Chicago');
//Here we define out main variables
$welcome_string="Welcome!";
$numeric_date=date("G");

//Start conditionals based on military time
if($numeric_date>=0&&$numeric_date<=11)
$welcome_string="Good Morning!";
else if($numeric_date>=12&&$numeric_date<=17)
$welcome_string="Good Afternoon!";
else if($numeric_date>=18&&$numeric_date<=23)
$welcome_string="Good Evening!";

//Display our greeting
echo "$welcome_string";
?>    
<a href="admin_login.php"><button class="btn btn-danger btn-sm mt-5 float-right">LOGOUT</button></a>

        </div>
    </div>
</div>

<div>
</div>
</body>
</html>