<?php
session_start();
require_once('connect.php');

$email = $_POST['email'];
$pass = $_POST['pass'];

if (empty($email) || empty($pass)) {
    $_SESSION['messageLogin'] = 'Заполните все поля';
    header('Location: ../regaut.php');
    die();
} else {
    $pass = hash('sha3-224', $pass);
    $sql = "SELECT * FROM `SYIPusers` WHERE email = '$email' AND pass = '$pass'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['user'] = [
                "id" => $row['id'],
                "name" => $row['name'],
                "email" => $row['email'],
            ];
            header('Location: ../profile.php');
            die();
        }
    } else {
        $_SESSION['messageLogin'] = 'Неверный email или пароль';
        header('Location: ../regaut.php');
        die();
    }
}
