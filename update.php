<?php
require_once ('lib/print.php');
require ('view/top.php');
$article = get_contents();
?>
<!---->
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

<!--        --><?php //if(isset($_GET['id'])){ ?>
<!--            <a href="update.php?id=--><?php //echo $_GET['id']; ?><!--">update</a>-->
<!--        --><?php //} ?>

<!--        --><?php //// html 문법을 쓰려면 echo '' or ""안에 넣고 써야 한다.
//            if(isset($_GET['id'])) {
/*                echo '<a href="update.php?id=<?php echo $_GET ?>">update</a>'; // 이미 php안이므로 이렇게 2중 php를 쓸땐 따로 위와 같이 if문이지만 php를 나눠야 겠다.*/
//            }
//        ?>


<!--        <h2>-->
<!--            --><?php
//                print_title(); // 아래코드를 함수로 만들어줌
////            if(isset($_GET['id'])){
////                // 만약에 id 값이 있다면 아래 코드가 실행되고
////                echo $_GET['id'];
////            }
////            else{
////                // 없다면
////                echo "Welcome";
////            }
//            ?>
<!--        </h2>-->
<!--            --><?php
//            print_description();
//            ?>
<!--        기존 코드-->
<!--        <form action="update_process.php" method="post">-->
<!--            <input type="hidden" name="old_title" value="--><?//=$_GET['id']?><!--">-->
<!--            <p>-->
<!--                <input class="editText_title"  type="text" name="title"-->
<!--                       placeholder="Title" value="--><?php //print_title(); ?><!--">-->
<!--            </p>-->
<!--            <p>-->
<!--                <textarea class="editText_description" name="description" placeholder="Description">-->
<!--                    --><?php
//                    print_description();
//                    ?>
<!--                </textarea>-->
<!--            </p>-->
<!--            <p class="button_submit">-->
<!--                <input class="button" type="submit" value="등록">-->
<!--            </p>-->
<!--        </form>-->

    <form action="update_process.php" method="post">
        <input type="hidden" name="id" value="<?=$_GET['id'] ?>">
        <p>
            <input class="editText_title"  type="text" name="title"
                   placeholder="Title" value="<?php print_title(); ?>">
        </p>
        <p>
                <textarea class="editText_description" name="description" placeholder="Description"><?php print_description();?></textarea>
        </p>
        <p class="button_submit">
            <input class="button" type="submit" value="등록">
        </p>
    </form>
<?php
require ('view/bottom.php');
?>