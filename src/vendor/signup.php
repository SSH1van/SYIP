<?php
require_once __DIR__ . '/../helpers.php';

// Getting values from a form
$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$pass = $_POST['pass'] ?? null;

// Connecting to the structure
$pdo = getPDO();

// Validation of data from the form
if (empty($name)) {
    setValidationError('name', 'Неверное имя');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setValidationError('email', 'Указана неправильная почта');
}

if (empty($pass)) {
    setValidationError('pass', 'Пароль пустой');
}

// Checking for the absence of email in the database
$query = "SELECT id FROM SYIPusers WHERE email = '" . $email . "'";
$stmt = $pdo->prepare($query);
try {
    $stmt->execute();
} catch (\Exception $e) {
    die($e->getMessage());
}

if ($stmt->fetchColumn() > 0) {
    setValidationError('email', 'Почта занята');
}

if (strlen($pass) < 8) {
    setValidationError('pass', 'Пароль не менее 8 символов');
}


// Checking the error list
if (!empty($_SESSION['validation'])) {
    setOldValue('name', $name);
    setOldValue('email', $email);
    redirect('/regaut.php');
}

$query = "INSERT INTO SYIPusers (name, email, pass) VALUES (:name, :email, :pass)";
$params = [
    'name' => $name,
    'email' => $email,
    'pass' => hash("sha3-224", $pass)
];
$stmt = $pdo->prepare($query);
try {
    $stmt->execute($params);
} catch (\Exception $e) {
    die($e->getMessage());
}

setValidationError('accept', 'Регистрация выполнена');
redirect('/regaut.php');
