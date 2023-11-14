<?php
require_once __DIR__ . '/../helpers.php';

// Кол-во элементов
$limit = 12;

// Подключение к БД
$pdo = getPDO();

// Получение записей для текущей страницы
$page = intval(@$_GET['page']);
$page = (empty($page)) ? 1 : $page;
$start = ($page != 1) ? $page * $limit - $limit : 0;
$query = "SELECT * FROM `SYIPfiles` LIMIT {$start}, {$limit}";

$stmt = $pdo->prepare($query);
try {
    $stmt->execute();
} catch (\Exception $e) {
    die($e->getMessage());
}

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($items as $row) {
?>
    <div class="content-block">
        <a class="content-href" href="index.php">
            <div class="contetn-inner">
                <div class="content-name">
                    <?php echo $row['name']; ?>
                </div>
                <div class="content-date">
                    <?php echo $row['date']; ?>
                </div>
            </div>
        </a>
    </div>
<?php
}
