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
    <!-- input.html에서 받은 데이터를 DB에서 제거 -->
    <?php
    require('dbconnect.php');
 
    if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {

        $id = $_REQUEST['id'];

        $statement = $db->prepare('DELETE FROM memos WHERE id=?');
        $statement->execute(array($id));
    }
    ?>
    Memo deleted!
</pre>
<p><a href="index.php">Return</a></p>
</main>
</body>    
</html>
