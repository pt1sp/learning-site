<?php

    try {
            require_once('../common/common.php');
            $post = sanitize($_POST);
            $word = $post['word'];
            $tag = $post['tag'];
            $content = $post['content'];
            $dsn = 'mysql:dbname=learn;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'INSERT INTO technology(word,content,tag) VALUES (?, ?, ?)';
            $stmt = $dbh->prepare($sql);
            $data[] = $word;
            $data[] = $content;
            $data[] = $tag;
            $stmt->execute($data);

            $dbh = null;

            print $word;
            print 'を追加しました。<br />';

    } catch (Exception $e) {
            print 'ただいま障害により大変ご迷惑をおかけしております。';
            exit();
    }

    ?>

    <a href="add.php">さらに追加</a>
    <a href="index.php">メインメニュー</a>