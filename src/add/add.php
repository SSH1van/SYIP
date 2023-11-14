<?php
require_once __DIR__ . '/../helpers.php';
$user = currentUser();

$filePath = null;
$file = $_FILES['file'] ?? null;
$name = $_POST['name'] ?? null;
$city = $_POST['city'] ?? null;
$iduser = $user['id'] ?? null;
$date = date('Y-m-d H:i:s');


if (empty($name)) {
    setValidationError('name', 'Заполните поле');
}

if (empty($city)) {
    setValidationError('city', 'Заполните поле');
}

if($_FILES["file"]["error"] == 4){
    setValidationError('file', 'Файл нне загружен');
} else {
    $types = ['doc', 'docx', 'pdf'];
    $file_type =  pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if (!in_array($file_type, $types)) {
        setValidationError('file', 'Файл имеет неверный тип');
    }

    if (($file['size'] / 2000000) >= 1) {
        setValidationError('file', 'Файл должен быть меньше 2 мб');
    }
}

if (!empty($_SESSION['validation'])) {
    setOldValue('name', $name);
    setOldValue('city', $city);

    redirect('/profile.php');
}

if (!empty($file)) {
    $filePath = uploadFile($file, 'file');
}

$pdo = getPDO();

$query = "INSERT INTO SYIPfiles (name, city, file, iduser, date) VALUES (:name, :city, :file, :iduser, :date)";

$params = [
    'name' => $name,
    'city' => $city,
    'file' => $filePath,
    'iduser' => $iduser,
    'date' => $date
];

$stmt = $pdo->prepare($query);

try {
    $stmt->execute($params);
} catch (\Exception $e) {
    die($e->getMessage());
}

redirect('/');