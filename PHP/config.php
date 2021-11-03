<?php
$host = "localhost";
$user = "root";
$pass =  "";
$dbname = "jobportal2";

//connect mysql start
$link=mysqli_connect($host,$user,$pass,$dbname);

if($link->connect_error)
{
   die("connection failed:".$link->connect_error);
}

?>