<?php 
    $host = 'localhost';
    $username = 'root';
    // $passwd = '';
    $db = 'oal';
    $passwd = 'root';
    $season = "Fall";
    $year= 2021;
    
    $mysqli = mysqli_connect($host, $username, $passwd, $db);

    // function query($table){
    //     $query = mysqli_connect("SELECT * FROM ")
    // }

    if (!$mysqli) {
        die("Connection Failed" . mysqli_connect_error());
    }

?>