<?php
require_once __DIR__ . '/../helpers.php';
require_once __DIR__ . '/phpqrcode/qrlib.php';

$user = currentUser();
date_default_timezone_set("Europe/Moscow");

// Getting values from a form
$filePath = null;
$file = $_FILES['file'] ?? null;
$name = $_POST['name'] ?? null;
$city = $_POST['city'] ?? null;
$iduser = $user['id'] ?? null;
$date = date('Y-m-d H:i:s');

// Validation of data from the form
if (empty($name)) {
    setValidationError('name', 'Заполните поле');
}

if (empty($city)) {
    setValidationError('city', 'Заполните поле');
}

// Checking the correctness of the file
if ($_FILES["file"]["error"] == 4) {
    setValidationError('file', 'Файл нне загружен');
} else {
    $types = ['docx', 'pdf'];
    $file_type =  pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if (!in_array($file_type, $types)) {
        setValidationError('file', 'Файл имеет неверный тип');
    }

    if (($file['size'] / 2000000) >= 1) {
        setValidationError('file', 'Файл должен быть меньше 2 мб');
    }
}

// Checking the error list
if (!empty($_SESSION['validation'])) {
    setOldValue('name', $name);
    setOldValue('city', $city);

    redirect('/profile.php');
}

// Checking for file availability
if (!empty($file)) {
    $filePath = uploadFile($file, 'file');
}


// Getting a link to a page and generating a qr code
$str = "http://syip.ru/workplace.php?" . substr($filePath, 13, 10);
QRcode::png($str, __DIR__ . '/tmp.png', 'H', 6, 2);

$im = imagecreatefrompng(__DIR__ . '/tmp.png');
$width = imagesx($im);
$height = imagesy($im);
 
// Replacing white pixels with transparent
$bg_color = imageColorAllocate($im, 0, 0, 0);
imagecolortransparent ($im, $bg_color);
for ($x = 0; $x < $width; $x++) {
	for ($y = 0; $y < $height; $y++) {
		$color = imagecolorat($im, $x, $y);
		if ($color == 0) {
			imageSetPixel($im, $x, $y, $bg_color);
		}
	}
}

// Replacing black pixels with white ones
$fg_color = imageColorAllocate($im, 255, 255, 255);
for ($x = 0; $x < $width; $x++) {
	for ($y = 0; $y < $height; $y++) {
		$color = imagecolorat($im, $x, $y);
		if ($color == 1) {
			imageSetPixel($im, $x, $y, $fg_color);
		}
	}
}
 
// Output to the browser
// header('Content-Type: image/x-png');
// imagepng($im);


// Connecting to the database and transmitting parameters
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

// redirect('/profile.php');