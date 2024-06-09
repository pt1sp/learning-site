<?php
try {
    $ID = $_POST['ID'];
    $word = $_POST['word'];
    $tag = $_POST['tag'];
    $content = $_POST['content'];

    $dsn = 'mysql:dbname=learn;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'UPDATE technology SET word=?, tag=?, content=? WHERE ID=?';
    $stmt = $dbh->prepare($sql);
    $data = array($word, $tag, $content, $ID);
    $stmt->execute($data);

    $dbh = null;

    echo '更新が完了しました。';
} catch (Exception $e) {
    echo 'エラー: ' . $e->getMessage();
    exit();
}
?>

<input type="button" onclick="location.href='edit.php'" value="戻る">