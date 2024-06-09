<?php
try {
    $dsn = 'mysql:dbname=learn;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQLクエリを実行してカウントを取得
    $stmt = $pdo->query('SELECT COUNT(ID) FROM technology');
    $row_count = $stmt->fetchColumn();

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>learn</title>
</head>

<body>
    <a href="view.php">表示</a>
    <a href="add.php">追加</a>
    <a href="edit.php">編集</a>
    <a href="../index.php">メインメニュー</a>

    <p id="learn_count"><?php echo $row_count; ?></p>
</body>
<link rel="stylesheet" href="../style/style.css">
</html>