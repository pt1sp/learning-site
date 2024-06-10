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
        $ID = $_POST['id'];
        $dsn = 'mysql:dbname=learn;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT word, content, tag FROM physics WHERE ID=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $ID;
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $word = $rec['word'];
        $content = $rec['content'];
        $tag = $rec['tag'];

        $dbh = null;
    }
    catch (Exception $e) {
        print 'エラー: ' . $e->getMessage();
        exit();
    }

    ?>

    <form method="post" action="edited.php">
        <input type="hidden" name="ID" value="<?php print $ID; ?>">
        <p>題名</p>
        <input type="text" name="word" id="words" value="<?php print $word; ?>">
        <p>タグ</p>
        <select name="tag">
            <?php
            // タグ名と日本語名の対応関係を持つ連想配列
            $tag_names = array(
                "nothing" => "未定",
            );

            foreach ($tag_names as $tag_value => $tag_name) {
                $selected = ($tag_value == $tag) ? 'selected' : '';
                echo '<option value="' . $tag_value . '" ' . $selected . '>' . $tag_name . '</option>';
            }
            ?>
        </select>

        <p>説明</p>
        <textarea class="large-textarea" name="content"><?php print $content; ?></textarea>

        <input type="button" onclick="location.href='edit.php'" value="戻る">
        <input type="submit" value="OK">
    </form>

    <form method="post" action="delete.php">
        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
        <input type="submit" value="削除">
    </form>

</body>
<link rel="stylesheet" href="../style/style.css">
</html>
