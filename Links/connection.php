<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_data";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    
	die("failed to connect!");
}
