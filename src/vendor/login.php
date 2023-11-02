<?php
require_once __DIR__ . '/../helpers.php';

$email = $_POST['email'] ?? null;
$pass = $_POST['pass'] ?? null;

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setOldValue('email', $email);
    setValidationError('email', 'Неверный формат электронной почты');
    setMessage('error', 'Ошибка валидации');
    redirect('/');
}

$user = findUser($email);

if (!$user) {
    setMessage('error', "Пользователь $email не найден");
    redirect('/');
}

if (hash("sha3-224", $pass) !== $user['pass']) {
    setMessage('error', 'Неверный пароль');
    redirect('/');
}

$_SESSION['user']['id'] = $user['id'];

redirect('/profile.php');
