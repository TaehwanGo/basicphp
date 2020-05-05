<?php
require_once ('lib/print.php');
require ('view/top.php');
?>

<!--<!doctype html>-->
<!--<html>-->
<!--    <head>-->
<!--        <meta charset="utf-8">-->
<!--        <title>-->
<!--            --><?php
//                print_title();
//            ?>
<!--        </title>-->
<!--    </head>-->
<!--    <body>-->
<!--        <h1><a href="index.php">WEB</a></h1>-->
<!--        <ol>-->
<!--            --><?php
//                print_list(); // 아래 코드를 반복문으로 만들었고 이를 함수로 만들었음
//            ?>
<!--        </ol>-->
<!---->
<!--        <a href="create.php">create</a>-->
        <form action="create_process.php" method="post">
            <p>
                <input class="editText_title" type="text" name="title"
                       placeholder="Title">
            </p>
            <p>
                <textarea class="editText_description" name="description" placeholder="Description"></textarea>
            </p>
            <p class="button_submit">
                <input class="button" type="submit" value="등록">
            </p>
        </form>
<!--        <h2>-->
<!--            --><?php
//                print_title(); // 아래코드를 함수로 만들어줌
//            ?>
<!--        </h2>-->
<!--            --><?php
//            print_description();
//            ?>
<?php
require ('view/bottom.php');
?>