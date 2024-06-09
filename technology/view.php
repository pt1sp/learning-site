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
        $tag_sql = 'SELECT DISTINCT tag FROM technology';
        $tag_stmt = $dsn->query($tag_sql);
        $tags = $tag_stmt->fetchAll(PDO::FETCH_ASSOC);

        // タグのプルダウンメニューを生成
        print '<form method="get" action="">
        <select name="tag">
            <option value="">全てのタグ</option>
            <option value="hardware">ハードウェア</option>
            <option value="software">ソフトウェア</option>
            <option value="network">ネットワーク</option>
            <option value="security">セキュリティ</option>
            <option value="basic">基礎理論</option>
            <option value="algorithm">アルゴリズム</option>
            <option value="computer_component">コンピュータ構成要素</option>
            <option value="system_component">システム構成要素</option>
            <option value="user_interface">ユーザーインターフェース</option>
            <option value="information_media">情報メディア</option>
            <option value="database">データベース</option>
            <option value="system_developed_technology">システム開発技術</option>
            <option value="software_development_management_technology">ソフトウェア開発管理技術</option>
            <option value="project_management">プロジェクトマネジメント</option>
            <option value="service_management">サービスマネジメント</option>
            <option value="system_audit">システム監査</option>
            <option value="system_strategy">システム戦略</option>
            <option value="system_plan">システム企画</option>
            <option value="management_strategy">経営戦略マネジメント</option>
            <option value="technology_strategy_management">技術戦略マネジメント</option>
            <option value="business_industry">ビジネスインダストリ</option>
            <option value="corporate_activities">企業活動</option>
            <option value="legal">法務</option>
        </select>
        <input type="submit" value="絞り込む">
        </form>';

        // タグで絞り込んで表示
        $tag_filter = isset($_GET['tag']) ? $_GET['tag'] : '';
        $sql = 'SELECT word, content, tag FROM technology';
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
        print '<tr><td>単語</td><td>説明</td><td>タグ</td></tr>';
        while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
            print '<tr>';
            print '<td>' . $rec['word'] . '</td>';
            print '<td>' . $rec['content'] . '</td>';
        
            // タグの値に応じて日本語のタグ名を表示
            switch ($rec['tag']) {
                case 'hardware':
                    print '<td>ハードウェア</td>';
                    break;
                case 'software':
                    print '<td>ソフトウェア</td>';
                    break;
                case 'network':
                    print '<td>ネットワーク</td>';
                    break;
                case 'security':
                    print '<td>セキュリティ</td>';
                    break;
                case 'basic':
                    print '<td>基礎理論</td>';
                    break;
                case 'algorithm':
                    print '<td>アルゴリズム</td>';
                    break;
                case 'computer_component':
                    print '<td>コンピュータ構成要素</td>';
                    break;
                case 'system_component':
                    print '<td>システム構成要素</td>';
                    break;
                case 'user_interface':
                    print '<td>ユーザーインターフェース</td>';
                    break;
                case 'information_media':
                    print '<td>情報メディア</td>';
                    break;
                case 'database':
                    print '<td>データベース</td>';
                    break;
                case 'system_developed_technology':
                    print '<td>システム開発技術</td>';
                    break;
                case 'software_development_management_technology':
                    print '<td>ソフトウェア開発管理技術</td>';
                    break;
                case 'project_management':
                    print '<td>プロジェクトマネジメント</td>';
                    break;
                case 'service_management':
                    print '<td>サービスマネジメント</td>';
                    break;
                case 'system_audit':
                    print '<td>システム監査</td>';
                    break;
                case 'system_strategy':
                    print '<td>システム戦略</td>';
                    break;
                case 'system_plan':
                    print '<td>システム企画</td>';
                    break;
                case 'management_strategy':
                    print '<td>経営戦略マネジメント</td>';
                    break;
                case 'technology_strategy_management':
                    print '<td>技術戦略マネジメント</td>';
                    break;
                case 'business_industry':
                    print '<td>ビジネスインダストリ</td>';
                    break;
                case 'corporate_activities':
                    print '<td>企業活動</td>';
                    break;
                case 'legal':
                    print '<td>法務</td>';
                    break;
                default:
                    print '<td>' . $rec['tag'] . '</td>'; // デフォルトはそのままの値を表示
                    break;
            }
        
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
