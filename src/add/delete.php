<?php
require_once __DIR__ . '/../helpers.php';
$user = currentUser();

// Getting values from a form
$date = $_POST['btn'] ?? null;
$iduser = $user['id'] ?? null;

// Connecting to the structure
$pdo = getPDO();

// Getting the path from the database to delete QR code on the server
$query = "SELECT file FROM `SYIPfiles` WHERE date = '$date' AND iduser = '$iduser'";
$stmt = $pdo->prepare($query);
try {
    $stmt->execute();
} catch (\Exception $e) {
    die($e->getMessage());
}
$path = $stmt->fetch(PDO::FETCH_ASSOC);
$npath = $path['file'];
deleteQR($npath);

// Performing a deletion
$query = "DELETE FROM `SYIPfiles` WHERE date = '$date' AND iduser = '$iduser'";
$stmt = $pdo->prepare($query);
try {
    $stmt->execute();
} catch (\Exception $e) {
    die($e->getMessage());
}

// Updating the files id
$query = "ALTER TABLE `SYIPfiles` DROP id; 
ALTER TABLE `SYIPfiles` ADD id BIGINT(200) NOT NULL 
AUTO_INCREMENT FIRST, ADD PRIMARY KEY (id);";
$stmt = $pdo->prepare($query);
try {
    $stmt->execute();
} catch (\Exception $e) {
    die($e->getMessage());
}

redirect('/profile.php');
