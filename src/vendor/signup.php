<?php

require_once __DIR__ . '/../helpers.php';

// Выносим данных из $_POST в отдельные переменные

$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$pass = $_POST['pass'] ?? null;

// Выполняем валидацию полученных данных с формы

if (empty($name)) {
    setValidationError('name', 'Неверное имя');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setValidationError('email', 'Указана неправильная почта');
}

if (empty($pass)) {
    setValidationError('pass', 'Пароль пустой');
}

$connect = getMSQ();

$sql = "SELECT id FROM SYIPusers WHERE email = '" . $email . "'";
$sdf = $connect->query($sql);

if ($sdf->num_rows > 0) {
    setValidationError('email', 'Почта занята');
}


// Если список с ошибками валидации не пустой, то производим редирект обратно на форму

if (!empty($_SESSION['validation'])) {
    setOldValue('name', $name);
    setOldValue('email', $email);
    redirect('/regaut.php');
}





$pass = hash("sha3-224", $pass);
$sql = "INSERT INTO `SYIPusers` (email,pass,name) VALUES ('$email', '$pass', '$name')";

$stmt = $connect->query($sql);

// try {
//     $stmt->execute();
// } catch (\Exception $e) {
//     die($e->getMessage());
// }

$sql = "ALTER TABLE `SYIPusers` DROP id; 
ALTER TABLE `SYIPusers` ADD id BIGINT(200) NOT NULL 
AUTO_INCREMENT FIRST, ADD PRIMARY KEY (id);";
$connect->multi_query($sql);

redirect('/regaut.php');
