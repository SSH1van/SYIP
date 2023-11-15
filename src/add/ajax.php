<?php
require_once __DIR__ . '/../helpers.php';

// Number of output elements
$limit = 8;
$user = currentUser();
$iduser = $user['id'] ?? null;

// Connecting to the structure
$pdo = getPDO();
$page = intval(@$_GET['page']);
$page = (empty($page)) ? 1 : $page;
$start = ($page != 1) ? $page * $limit - $limit : 0;

// Getting data from a database
$query = "SELECT * FROM `SYIPfiles` WHERE iduser = '$iduser' LIMIT {$start}, {$limit}";
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
        <a class="content-href" href="index.php">
            <div class="contetn-inner">
                <div class="contetn-right">
                    <?php
                    echo $_SESSION['num']++;
                    ?>
                    <div class="content-name">
                        <?php echo $row['name']; ?>
                    </div>
                </div>

                <div class="content-date">
                    <?php echo $row['date']; ?>
                </div>
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
