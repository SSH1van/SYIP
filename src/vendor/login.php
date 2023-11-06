<?php
require_once __DIR__ . '/../helpers.php';

// Getting values from a form
$email = $_POST['email'] ?? null;
$pass = $_POST['pass'] ?? null;


if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
    setOldValue('lemail', $email);
    setValidationError('lemail', 'Некорректая почта');
    setMessage('error', 'Ошибка валидации');
    
    redirect('/regaut.php');
}

$user = findUser($email);

if (!$user || hash("sha3-224", $pass) !== $user['pass']) {
    setOldValue('lemail', $email);
    setMessage('error', "Неверная почта или пароль");
    redirect('/regaut.php');
}

$_SESSION['user']['id'] = $user['id'];

redirect('/profile.php');
