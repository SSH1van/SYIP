<?php
session_start();
require_once('connect.php');

$email = $_POST['email'];
$sname = $_POST['sname'];
$login = $_POST['login'];
$pass =  $_POST['pass'];

if (empty($login) || empty($pass) || empty($email) || empty($sname)) {
    $_SESSION['messageSingup'] = 'Заполните все поля';
    header('Location: ../regaut.php');
} else {
    $sql = "INSERT INTO `SYIPusers` (login,pass,email,name) VALUES ('$login', '$pass', '$email', '$sname')";
    if ($connect->query($sql)) {
        echo  "Регистрация выполнена";
        $sql = "ALTER TABLE `SYIPusers` DROP id; 
            ALTER TABLE `SYIPusers` ADD id BIGINT(200) NOT NULL 
            AUTO_INCREMENT FIRST, ADD PRIMARY KEY (id);";
        $connect->multi_query($sql);
    } else {
        echo "Ошибка: " . $connect->error;
    }
}?>