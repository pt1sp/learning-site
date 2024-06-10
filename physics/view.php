<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>learn</title>
</head>

<body>
<?php
    try {
        $dsn = 'mysql:dbname=learn;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dsn = new PDO($dsn, $user, $password);
        $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // タグの一覧を取得
        $tag_sql = 'SELECT DISTINCT tag FROM physics';
        $tag_stmt = $dsn->query($tag_sql);
        $tags = $tag_stmt->fetchAll(PDO::FETCH_ASSOC);

        // タグのプルダウンメニューを生成
        print '<form method="get" action="">
        <select name="tag">
            <option value="">全てのタグ</option>
            <option value="nothing">未定</option>
        </select>
        <input type="submit" value="絞り込む">
        </form>';

        // タグで絞り込んで表示
        $tag_filter = isset($_GET['tag']) ? $_GET['tag'] : '';
        $sql = 'SELECT word, content, tag FROM physics';
        if (!empty($tag_filter)) {
            $sql .= ' WHERE tag = :tag';
        }
        $stmt = $dsn->prepare($sql);
        if (!empty($tag_filter)) {
            $stmt->bindParam(':tag', $tag_filter, PDO::PARAM_STR);
        }
        $stmt->execute();

        $dsn = null;

        print '<table border="1">';
        print '<tr><td>題名</td><td>説明</td><td>タグ</td></tr>';
        while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
            print '<tr>';
            print '<td>' . $rec['word'] . '</td>';
            print '<td>' . $rec['content'] . '</td>';
            print '<td>' . $rec['tag'] . '</td>';
            print '</tr>';
        }
        print '</table>';
    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }
    ?>

    <input type="button" onclick="location.href='index.php'" value="戻る">
</body>

</html>
