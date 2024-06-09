<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>learn</title>
</head>

<body>
    <form method="post" action="add_done.php" enctype="multipart/form-data">
        <p>題名</p>
        <input type="text" id="words" name="word">
        <p>タグ</p>
        <select id="tags" name="tag">
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
        <p>説明</p>
        <textarea class="large-textarea" name="content" placeholder="ここにテキストを入力"></textarea>
        <input type="button" onclick="location.href='index.php'" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>

<link rel="stylesheet" href="../style/style.css">

</html>