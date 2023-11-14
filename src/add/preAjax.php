<?php
$pdo = getPDO();
// Получение записей для первой страницы
$query = "SELECT * FROM `SYIPfiles`";
$stmt = $pdo->prepare($query);
try {
    $stmt->execute();
} catch (\Exception $e) {
    die($e->getMessage());
}
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Кол-во страниц 
$query = "SELECT COUNT(`id`) FROM `SYIPfiles`";
$stmt = $pdo->prepare($query);
try {
    $stmt->execute();
} catch (\Exception $e) {
    die($e->getMessage());
}
$total = $stmt->fetch(PDO::FETCH_COLUMN);


$amt = ceil($total / 3);
?>