<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

<title>PHP</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">PHP</h1>    
</header>

<main>
<h2>Practice</h2>
<pre>
    <!-- input.htmlから送られてきたデータをDBに保存 -->
    <?php
    require('dbconnect.php');
    // フォームから送信されてきた値などをDBに入れる場合はprepareなどをして安全性を高める
    $statement = $db->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
    $statement->execute(array($_POST['memo']));
    // $statement->bindParam(1, $_POST['memo']); 上記と同じ結果が得られる

    echo 'メッセージが登録されました';
    // $db->exec('INSERT INTO memos SET memo="' . $_POST['memo'] . '", created_at=NOW()');
    ?>
</pre>
</main>
</body>    
</html>