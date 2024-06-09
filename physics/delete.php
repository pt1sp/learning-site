<?php
try {
    // データベースに接続
    $dsn = 'mysql:dbname=learn;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // POST リクエストから削除するレコードの ID を取得
    $ID = $_POST['ID'];

    // 削除するレコードを SQL を使って削除
    $sql = 'DELETE FROM physics WHERE ID=?';
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$ID]);

    // データベース接続を閉じる
    $dbh = null;

    // 削除が完了したら、編集画面にリダイレクト
    header('Location: edit.php');
    exit();
} catch (Exception $e) {
    // エラーが発生した場合はエラーメッセージを表示して終了
    echo 'エラーが発生しました: ' . $e->getMessage();
    exit();
}
?>
