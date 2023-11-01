<?php
session_start();
require_once('connect.php');

$email = $_POST['email'];
$pass =  $_POST['pass'];
$name = $_POST['name'];

if (empty($email) || empty($pass) || empty($name)) {
    $_SESSION['messageSignup'] = 'Заполните все поля';
    header('Location: ../regaut.php');
    exit();
}

$sql = "SELECT id FROM SYIPusers WHERE email = '" . $email . "'";
$sdf = $connect->query($sql);
if ($sdf->num_rows > 0) {
    $_SESSION['messageSignup'] = 'Email занят';
    header('Location: ../regaut.php');
} else {
    $pass = hash('sha3-224', $pass);
    $sql = "INSERT INTO `SYIPusers` (email,pass,name) VALUES ('$email', '$pass', '$name')";
    if ($connect->query($sql)) {
        $_SESSION['messageSignup'] = 'Регистрация выполнена';
        header('Location: ../regaut.php');

        $sql = "ALTER TABLE `SYIPusers` DROP id; 
            ALTER TABLE `SYIPusers` ADD id BIGINT(200) NOT NULL 
            AUTO_INCREMENT FIRST, ADD PRIMARY KEY (id);";
        $connect->multi_query($sql);
    } else {
        echo "Ошибка: " . $connect->error;
    }
}
