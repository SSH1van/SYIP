<?php
session_start();
require_once('connect.php');

$login = $_POST['login'];
$pass = $_POST['pass'];

if (empty($login) || empty($pass)) {
    $_SESSION['messageLogin'] = 'Заполните все поля';
    header('Location: ../regaut.php');
} else {
    $pass = hash('sha3-224', $pass);
    $sql = "SELECT * FROM `SYIPusers` WHERE login = '$login' AND pass = '$pass'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0 ) {
        while ($row = $result->fetch_assoc()) {
            // echo "Добро пожаловать, " . $row['login'];
            header('Location: /index.php');
        }
    } else {
        $_SESSION['messageLogin'] = 'Данный пользователь отсутствует';
        header('Location: ../regaut.php');
    }
}
