<?php
$servername = "localhost";
$username = "root";
$password = "GreenJeans33Winter1@";
$dbname = "buttons";
$pageurl = $_SERVER['REQUEST_URI'];
$userip = $_SERVER['REMOTE_ADDR'];
$date = date('m/d/Y h:i:s a', time());
$urlquery = $_SERVER['QUERY_STRING'];
$useragent =  $_SERVER['HTTP_USER_AGENT'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO analytics (pageurl, urlquery, userip, useragent, timestamp)
    VALUES ('$pageurl', '$urlquery', '$userip', '$useragent', '$date')";
    // use exec() because no results are returned
    $conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
?> 

