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
<pre>
    <!-- input.html에서 넘어온 데이터를 DB에 입력 -->
    <?php
    require('dbconnect.php');
    // FORM에서 전송된 데이터를 입력하는 구문 생성
    $statement = $db->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
    $statement->execute(array($_POST['memo']));
    // $statement->bindParam(1, $_POST['memo']); 위 구문과 동일한 효과

    echo '메모가 등록되었습니다.';
    // $db->exec('INSERT INTO memos SET memo="' . $_POST['memo'] . '", created_at=NOW()');
    ?>
</pre>
</main>
</body>    
</html>
