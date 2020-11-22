<?php
session_start();
$conn = new mysqli("localhost","root","","thinkwriteshare");
if($conn->connect_error)
{
    die("connection Failed".$conn->connect_error);
}


?>