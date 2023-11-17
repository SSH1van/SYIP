<?php
require_once __DIR__ . '/../helpers.php';
$user = currentUser();

// Getting values from a form
$date = $_POST['btn'] ?? null;
$iduser = $user['id'] ?? null;

// Connecting to the database and performing a deletion
$pdo = getPDO();
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
