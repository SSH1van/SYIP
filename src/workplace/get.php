<?php
require_once __DIR__ . '/../helpers.php';

$user = currentUser();
$iduser = $user['id'] ?? null;

// Connecting to the structure
$pdo = getPDO();

// Getting author
$query = "SELECT name FROM `SYIPusers` WHERE id = '$iduser'";
$stmt = $pdo->prepare($query);
$stmt->execute();
$stmtName = $stmt->fetch(\PDO::FETCH_ASSOC);

// Getting data from a database
$query = "SELECT * FROM `SYIPfiles` WHERE file LIKE '%$url.%'";
$stmt = $pdo->prepare($query);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Markup of output data
foreach ($items as $row) {
?>
    <div class="work-title"><?php echo $row['name']; ?></div>
    <div class="work-block">
        <img src="<?php echo $row['img']; ?>" alt="" class="work-img">
        <div class="work-block-inner">
            <div class="work-text work-author"><?php echo $stmtName['name']; ?></div>
            <div class="work-text work-data"><?php echo $row['date']; ?></div>

            <a class="button" href="<?php echo $row['file']; ?>" download="<?php echo $row['name']; ?>">
                <button class="button__self">
                    <div class="button__inner">
                        <svg class="button__icon" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 17l4 4 4-4" />
                            <path d="M12 12v9" />
                            <path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29" />
                        </svg>
                        <span class="button__text">Скачать файл</span>
                    </div>
                </button>
            </a>
        </div>
    </div>
<?php
}
