<?php
// ハードコードされたパスワード
$valid_password = 'arigatou';

// フォームから送信されたパスワードを取得
$password = $_POST['password'];

// パスワードの照合
if ($password === $valid_password) {
    echo '認証成功<br />';
    print '<a href="view.php">日記を表示</a>
            <a href="add.php">日記を追加</a>';
} else {
    echo 'パスワードが間違っています。
            <a href="confirm.html">再入力</a>
            <a href="../index.php">メインメニュー</a>';
}
?>
