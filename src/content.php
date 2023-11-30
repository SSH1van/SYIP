<?php
require_once __DIR__ . '/session.php';
require_once __DIR__ . '/config.php';

// Number of output elements
$limit = 9;

// Connecting to the structure
$pdo = new \PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';charset=utf8;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
$page = intval(@$_GET['page']);
$page = (empty($page)) ? 1 : $page;
$start = ($page != 1) ? $page * $limit - $limit : 0;

// Getting data from a database
$query = "SELECT * FROM `SYIPfiles` LIMIT {$start}, {$limit}";
$stmt = $pdo->prepare($query);
try {
    $stmt->execute();
} catch (\Exception $e) {
    die($e->getMessage());
}
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Markup of output data
foreach ($items as $row) {
?>
    <div class="content-block">
        <a class="content-href" href="workplace.php?<?php echo substr($row['file'], 19, 10); ?>" target="_blank" rel="noopener noreferrer">
            <div class="content-into">
                <div class="content-left">
                    <div class="content-num"><?php echo $_SESSION['num']++; ?></div>
                    <div class="content-name"> <?php echo $row['name']; ?> </div>
                </div>
                <div class="content-author"> <?php echo $row['author']; ?> </div>
            </div>
        </a>
    </div>
<?php
}

// The number of content downloads when scrolling
$query = "SELECT COUNT(`id`) FROM `SYIPfiles`";
$stmt = $pdo->prepare($query);
try {
    $stmt->execute();
} catch (\Exception $e) {
    die($e->getMessage());
}
$total = $stmt->fetch(PDO::FETCH_COLUMN);

$amt = ceil($total / $limit);
