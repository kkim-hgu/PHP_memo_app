<?php
// 공통처리구문
try {
    $db = new PDO('mysql:dbname=mydb;host=localhost;charset=utf8',
    'root', 'root');
} catch(PDOException $e) {
    echo 'DB Connection errot：' . $e->getMessage();
}
?>
