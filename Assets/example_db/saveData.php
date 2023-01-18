<?php
    include('connection.php');

    $username = $_POST['username'];
    $score = $_POST['score'];

    $nameCheckQuery = "SELECT username FROM players WHERE username='".$username."'";
    $nameCheck = mysqli_query($connect, $nameCheckQuery) or die("Name check query failed"); //ERROR: name check query failed
    
    if(mysqli_num_rows($nameCheck) != 1)
    {
        echo "Either there is no user or there are more than one"; //ERROR: number of names matching != 1 
        exit();
    }

    $updateQuery = "UPDATE players SET score = " .$score. " WHERE username = '".$username."' ";
    mysqli_query($connect, $updateQuery) or die("Save query failed");
?>