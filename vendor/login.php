<?php
session_start();
require_once('connect.php');

$login = $_POST['login'];
$pass = $_POST['pass'];

if (empty($login) || empty($pass)) {
    $_SESSION['message'] = 'Заполните все поля';
    header('Location: ../regaut.php');
} else {
    $sql = "SELECT * FROM `SYIPusers` WHERE login = '$login' AND pass = '$pass'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0 ) {
        while ($row = $result->fetch_assoc()) {
            echo "Добро пожаловать, " . $row['login'];
        }
    } else {
        echo "Данный пользователь отсутствует";
    }
}
?>
