<?php
require_once __DIR__ . '/config.php';

// Connecting to the structure
$pdo = new \PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';charset=utf8;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);

// Getting the number of records
$query = "SELECT count(*) FROM `SYIPfiles`";
$stmt = $pdo->prepare($query);
$stmt->execute();

// Parameters for displaying only the last three records
$limit = $stmt->fetch(\PDO::FETCH_ASSOC);
$limit = $limit['count(*)'];
if ($limit > 3) {
    $start = $limit - 3;
} else {
    $start = 0;
}

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
                    <div class="content-name"> <?php echo $row['name']; ?> </div>
                    <div class="content-author"> <?php echo $row['author']; ?> </div>
                </div>
            </div>
        </a>
    </div>
<?php
}
