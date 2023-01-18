<?php
    include('connection.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $nameCheckQuery = "SELECT username, salt, hash, score FROM players WHERE username='".$username."'";
    $nameCheck = mysqli_query($connect, $nameCheckQuery) or die("Name check query failed"); //ERROR: name check query failed
    
    if(mysqli_num_rows($nameCheck) != 1)
    {
        echo "Either there is no user or there are more than one"; //ERROR: number of names matching != 1 
        exit();
    }

    $userInfo = mysqli_fetch_assoc($nameCheck);
    $salt = $userInfo["salt"];
    $hash = $userInfo["hash"];

    $loginHash = crypt($password, $salt);
    
    if($loginHash != $hash)
    {
        echo "Incorrect password"; //ERROR: incorrect password
        exit();
    }

    $score = $userInfo["score"];
    
    echo $score;
?>