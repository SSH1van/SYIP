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
    $pass = hash('sha3-224', $pass);
    $sql = "INSERT INTO `SYIPusers` (login,pass,email,name) VALUES ('$login', '$pass', '$email', '$sname')";
    if ($connect->query($sql)) {
        $_SESSION['messageSingup'] = 'Регистрация выполнена';
        header('Location: ../regaut.php');
        
        $sql = "ALTER TABLE `SYIPusers` DROP id; 
            ALTER TABLE `SYIPusers` ADD id BIGINT(200) NOT NULL 
            AUTO_INCREMENT FIRST, ADD PRIMARY KEY (id);";
        $connect->multi_query($sql);
    } else {
        echo "Ошибка: " . $connect->error;
    }
}
