<?php
// データベース接続
$conn = new mysqli("localhost", "root", "", "learn");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// データベースから日記を取得
$sql = "SELECT content, date FROM diary ORDER BY date, ID";
$result = $conn->query($sql);

$diaries = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $date = $row["date"];
        if (!isset($diaries[$date])) {
            $diaries[$date] = [];
        }
        $diaries[$date][] = $row["content"];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>日記を表示</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>日記一覧</h2>
    <table>
        <tr>
            <th>日付</th>
            <th>内容</th>
        </tr>
        <?php
        foreach ($diaries as $date => $contents) {
            echo "<tr><td>" . htmlspecialchars($date) . "</td><td>";
            foreach ($contents as $content) {
                echo htmlspecialchars($content) . "<br>";
            }
            echo "</td></tr>";
        }
 
?>

<a href="add.php">日記を追加</a><br />
<a href="../index.php">メインメニュー</a>