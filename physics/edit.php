<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>learn</title>
    <script>
        function validateForm() {
  var radioButtons = document.getElementsByName("id");
  var isChecked = false;
  for (var i = 0; i < radioButtons.length; i++) {
    if (radioButtons[i].checked) {
      isChecked = true;
      break;
    }
  }
  if (!isChecked) {
    alert("編集する項目を選択してください。");
    return false; // フォームの送信をキャンセル
  }
  return true; // フォームの送信を許可
}

    </script>
</head>
<body>
    
<?php

try {
    $dsn = 'mysql:dbname=learn;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT ID, word, content FROM physics';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;

    print '<form method="post" action="edit_done.php" enctype="multipart/form-data" onsubmit="return validateForm();">';
    print '<table border="1">';
    print '<tr><td>編集</td><td>題名</td><td>説明</td></tr>';
    while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print '<tr>';
        print '<td><input type="radio" name="id" value="' . $rec['ID'] . '"></td>';
        print '<td>' . $rec['word'] . '</td>';
        print '<td>' . $rec['content'] . '</td>';
        print '</tr>';
    }
    print '</table>';
    print '<input type="submit" value="編集">';
    print '</form>';
}
catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}

?>

<input type="button" onclick="location.href='index.php'" value="戻る">
</body>
<link rel="stylesheet" href="../style/style.css">
<script src="../style/script.js"></script>
</html>