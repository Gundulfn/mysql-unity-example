<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'test_database_name';
   
    $connect = @new mysqli(
      $db_host,
      $db_user,
      $db_password,
      $db_db
    );

    if(mysqli_connect_errno())
    {
        echo "Connection Failed"; //ERROR: connection failed
        exit();
    }
?>
