<?php
session_start();
require_once __DIR__ . '/config.php';

function redirect(string $path)
{
    header("Location: $path");
    die();
}

function setValidationError(string $fieldName, string $message): void
{
    $_SESSION['validation'][$fieldName] = $message;
}

function hasValidationError(string $fieldName): bool
{
    return isset($_SESSION['validation'][$fieldName]);
}

function validationErrorAttr(string $fieldName): string
{
    return isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function validationErrorMessage(string $fieldName): string
{
    $message = $_SESSION['validation'][$fieldName] ?? '';
    unset($_SESSION['validation'][$fieldName]);
    return $message;
}

function setOldValue(string $key, mixed $value): void
{
    $_SESSION['old'][$key] = $value;
}

function old(string $key)
{
    $value = $_SESSION['old'][$key] ?? '';
    unset($_SESSION['old'][$key]);
    return $value;
}

function uploadFile(array $file, string $prefix = ''): string
{
    $uploadPath = __DIR__ . '/../uploads/files';

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = $prefix . '_' . time() . ".$ext";

    if (!move_uploaded_file($file['tmp_name'], "$uploadPath/$fileName")) {
        die('Ошибка при загрузке файла на сервер');
    }

    return "uploads/files/$fileName";
}

function createQR(string $filePath = ''): string
{
    // Getting a link to a page and generating a qr code
    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . "/workplace.php?" . substr($filePath, 19, 10);
    $imgPath = __DIR__ . '/../uploads/img/' . substr($filePath, 19, 10) .  '.png';
    QRcode::png($url, $imgPath, 'H', 6, 2);
    return $imgPath;
}

function transparentWhiteQR(string $imgPath = ''): string
{
    $im = imagecreatefrompng($imgPath);
    $width = imagesx($im);
    $height = imagesy($im);

    // Replacing white pixels with transparent
    $bg_color = imageColorAllocate($im, 0, 0, 0);
    imagecolortransparent($im, $bg_color);
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

    // Save new image
    imagepng($im, $imgPath);
    $imgPath = substr($imgPath, -26);
    return $imgPath;
}

function deleteQR(string $path = ''): void
{
    $filePath = __DIR__ . '/..//' . $path;
    $imgPath = __DIR__ . '/../uploads/img/' . substr($path, 19, 10) . '.png';

    if (file_exists($filePath) && file_exists($imgPath)) {
        unlink($filePath);
        unlink($imgPath);
    } else { /* File not found. */
    }
}

function setMessage(string $key, string $message): void
{
    $_SESSION['message'][$key] = $message;
}

function hasMessage(string $key): bool
{
    return isset($_SESSION['message'][$key]);
}

function getMessage(string $key): string
{
    $message = $_SESSION['message'][$key] ?? '';
    unset($_SESSION['message'][$key]);
    return $message;
}

function getPDO(): PDO
{
    try {
        return new \PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';charset=utf8;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
    } catch (\PDOException $e) {
        die("Connection error: {$e->getMessage()}");
    }
}

function findUser(string $email): array|bool
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM SYIPusers WHERE email = :email");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}


function currentUser(): array|false
{
    $pdo = getPDO();

    if (!isset($_SESSION['user'])) {
        return false;
    }

    $userId = $_SESSION['user']['id'] ?? null;

    $stmt = $pdo->prepare("SELECT * FROM SYIPusers WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function logout(): void
{
    unset($_SESSION['user']['id']);
    redirect('/regaut.php');
}

function checkAuth(): void
{
    if (!isset($_SESSION['user']['id'])) {
        redirect('/regaut.php');
    }
}

function checkGuest(): void
{
    if (isset($_SESSION['user']['id'])) {
        redirect('/profile.php');
    }
}
