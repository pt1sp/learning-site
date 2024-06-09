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
                "hardware" => "ハードウェア",
                "software" => "ソフトウェア",
                "network" => "ネットワーク",
                "security" => "セキュリティ",
                "basic" => "基礎理論",
                "algorithm" => "アルゴリズム",
                "computer_component" => "コンピュータ構成要素",
                "system_component" => "システム構成要素",
                "user_interface" => "ユーザーインターフェース",
                "information_media" => "情報メディア",
                "database" => "データベース",
                "system_developed_technology" => "システム開発技術",
                "software_development_management_technology" => "ソフトウェア開発管理技術",
                "project_management" => "プロジェクトマネジメント",
                "service_management" => "サービスマネジメント",
                "system_audit" => "システム監査",
                "system_strategy" => "システム戦略",
                "system_plan" => "システム企画",
                "management_strategy" => "経営戦略マネジメント",
                "technology_strategy_management" => "技術戦略マネジメント",
                "business_industry" => "ビジネスインダストリ",
                "corporate_activities" => "企業活動",
                "legal" => "法務"
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
