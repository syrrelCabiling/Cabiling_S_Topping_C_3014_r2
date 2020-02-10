<?php 
    require_once '../load.php';


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
<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
                <!-- Timestamp here through php -->
                    <?php
                    date_default_timezone_set('America/New_York');
                    $tstamp = time(); //literally just fetching the timestamp straight from the db

                    echo "Last login session: ".date('h:i A, l - d M Y', $tstamp)."<br>";?>
                <!-- End of Timestamp -->

            <h2>Welcome to your Dashboard! Admin 1</h2>
        </div>
    </div>
</div>
</body>
</html>