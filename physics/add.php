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
        
        <p>説明</p>
        <textarea class="large-textarea" name="content" placeholder="ここにテキストを入力"></textarea>
        <input type="button" onclick="location.href='index.php'" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>

<link rel="stylesheet" href="../style/style.css">

</html>