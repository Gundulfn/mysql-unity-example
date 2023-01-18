<?php
    include('connection.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $nameCheckQuery = "SELECT username FROM players WHERE username='".$username."'";
    $nameCheck = mysqli_query($connect, $nameCheckQuery) or die("Name check query failed"); //ERROR: name check query failed
    
    if(mysqli_num_rows($nameCheck) > 0)
    {
        echo "Name already exists"; //ERROR: name exists cannot register
        exit();
    }

    $salt = "\$5\$rounds=5000\$" . "steadmedhams" . "$username" . "\$";
    $hash = crypt($password, $salt);
    $score = 34;

    $sql = "INSERT INTO players (username, hash, salt, score) VALUES ('".$username."', '".$hash."', '".$salt."','".$score."')";
    $result = mysqli_query($connect, $sql);
?>