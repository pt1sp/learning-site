<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST["content"];
    $date = date("Y-m-d"); // 現在の日付を取得
    
    // データベース接続
    $conn = new mysqli("localhost", "root", "", "learn");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // データベースに挿入
    $stmt = $conn->prepare("INSERT INTO diary (content, date) VALUES (?, ?)");
    $stmt->bind_param("ss", $content, $date);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // 成功したらリダイレクト
    header("Location: success.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>日記を追加</title>
</head>
<body>
    <h2>日記を追加</h2>
    <form method="post" action="add.php">
        内容: <textarea name="content" rows="5" cols="40" required></textarea><br><br>
        <input type="submit" value="追加">
    </form>
    <a href="view.php">日記を表示</a>
    <a href="../index.php">メインメニュー</a>
</body>
</html>
