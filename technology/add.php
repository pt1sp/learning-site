<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>learn</title>
</head>
<body>
    <p>単語追加</p>
    <form method="post" action="add_done.php" enctype="multipart/form-data">
        <p>単語</p>
        <input type="text" name="word">
        <p>タグ</p>
        <select id="tags" name="tag">
            <option value="technology">テクノロジー</option>
            <option value="science">サイエンス</option>
            <option value="art">アート</option>
            <option value="music">音楽</option>
            <option value="sports">スポーツ</option>
        </select>
        <p>説明</p>
        <input type="text" name="content">
        <input type="button" onclick="location.href='index.php'" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>
</html>