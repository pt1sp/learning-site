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

        $sql = 'SELECT word, content, tag FROM technology WHERE 1';
        $stmt = $dsn->prepare($sql);
        $stmt->execute();

        $dsn = null;

        print '<table border="1">';
        print '<tr><td>単語</td><td>説明</td><td>タグ</td></tr>';
        while (true) {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($rec == false) {
                break;
            }
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
</body>

</html>