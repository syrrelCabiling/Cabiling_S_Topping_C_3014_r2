This
<?php
    include_once '../config/database.php';
    include_once '../config/database_old.php';


    #the NEW way
    $start = microtime(true);
    $i = 0;
    while($i<100){
        $database = Database::getInstance()->getConnection();
        $i++;
    }
    $new_time = microtime(true) - $start; //unique timestamp


    #the OLD way
    $start = microtime(true);
    $i = 0;
    while($i<100){
        $old_database = new Database_Old();
        $old_database_connection = $old_database->getConnection();
        $i++;
    }
    $old_time = microtime(true) - $start; //unique timestamp; once you hit this file, it's gonna give a unique timestamp


    printf('New Connection takes==> %s ms' .PHP_EOL, $new_time * 1000);
    printf('Old Connection takes==> %s ms' .PHP_EOL, $old_time * 1000);
    printf('You saved %s ms' .PHP_EOL, ($old_time - $new_time) * 1000);
    printf('New Connection only takes %s%% of old connection' .PHP_EOL, ($new_time/$old_time) * 1000);

?>

