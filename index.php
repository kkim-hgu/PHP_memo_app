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
<!-- 메모 목록 -->
<?php
require('dbconnect.php');
// 데이터 입력
// $count = $db->exec('INSERT INTO my_items SET maker_id=1, item_name="もも", price=210, keyword="缶詰,ピンク,甘い"');
// echo $count . '개의 데이터를 입력했습니다.';

// db에서 데이터 가져오기
// $records = $db->query('SELECT * FROM my_items');
// while ($record = $records->fetch()) {
//     print($record['item_name'] . "\n");
// }

// URL의 파라미터 확인
if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else { // URL의 파라미터 리셋
    $page = 1;
}
$start = 5 * ($page - 1);

$memos = $db->prepare('SELECT * FROM memos ORDER BY id DESC LIMIT ?, 5');
$memos->bindParam(1, $start, PDO::PARAM_INT);
$memos->execute();
?>

<article>
    <?php while ($memo = $memos->fetch()): ?>
        <!-- mb_substr 문자열 갯수 처리 -->
        <p><a href="memo.php?id=<?php print($memo['id']); ?>">
        <?php print(mb_substr($memo['memo'], 0, 50)); ?></a></p>
        <time><?php print($memo['created_at']); ?></time>
        <hr>
    <?php endwhile; ?>

    <!-- 페이징 -->
    <?php if ($page >=2): ?>
        <a href="index.php?page=<?php print($page-1); ?>"><?php print($page-1); ?> page</a>
    <?php endif; ?>
    |
    <?php
    $counts = $db->query('SELECT COUNT(*) as cnt FROM memos');
    $count = $counts->fetch();
    $max_page = ceil($count['cnt'] / 5);
    if ($page < $max_page):
    ?>
        <a href="index.php?page=<?php print($page+1); ?>"><?php print($page+1); ?> page</a>
    <?php endif; ?>
</article>

</main>
</body>    
</html>
