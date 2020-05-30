<!doctype html>
<html lang="ko">
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
<!-- 메모내용 표시 -->
<?php
require('dbconnect.php');

$id = $_REQUEST['id'];
// $id가 숫자인지 체크
if (!is_numeric($id) || $id <= 0) {
    print('1이상의 숫자이어야 합니다.');
    exit();
}

$memos = $db->prepare('SELECT * FROM memos WHERE id=?');
$memos->execute(array($id));
$memo = $memos->fetch();
?>
<article>
    <pre><?php print($memo['memo']); ?></pre>

    <a href="update.php?id=<?php print($memo['id']); ?>">수정</a>
    |
    <a href="delete.php?id=<?php print($memo['id']); ?>">삭제</a>
    |
    <a href="index.php">Return</a>
</article>
</main>
</body>    
</html>
