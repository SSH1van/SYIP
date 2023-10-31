<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "RegisterUser";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if(!$connect) {
    die("Connection Fialed". mysqli_connect_error());
}
else {
    "Успех";
}
