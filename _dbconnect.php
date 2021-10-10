<?php

$servername="localhost";
$username="root";
$password="";
$database="user0000";


$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn) {
    die("your database not connected.Please check it Error  " .mysqle_connect_error());
}


?>