<?php
require_once ('lib/print.php'); // require_once : 중복해서 선언하는 것을 방지함
// php는 한번 정의된 함수는 재정의 할수 없음
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            A/S 게시판
        </title>
        <link rel="stylesheet" href="style_php.css">
    </head>
    <body>
        <h1><a href="index.php">A/S 요청 게시판</a></h1>
        <p id="login"><a href="author.php">회원관리</a></p>
        <div id="grid">
            <div id="list">
                <a class="button" href="create.php">글쓰기</a>
                <ol id="menu_title">
                    <?php
                        print_list();
                    ?>
                </ol>
            </div>