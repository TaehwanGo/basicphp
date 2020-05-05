<?php
require_once ('lib/print.php');
/*
//    function print_title(){
//        if(isset($_GET['id'])){
//            // 만약에 id 값이 있다면 아래 코드가 실행되고
//            echo $_GET['id'];
//        }
//        else{
//            // 없다면
//            echo "Welcome";
//        }
//    }
//    function print_description(){
//        // echo data/id 값에 해당하는 파일의 내용;
//        if(isset($_GET['id'])){
//            echo file_get_contents("data/".$_GET['id']);//.".html"
//        }
//        else{
//            echo "Hello, PHP";
//        }
//    }
//
//    function print_list(){
//        $list = scandir('./data');
//        // var_dump($list);
//
//        $i = 0;
//        while($i < count($list)){
//            if(($list[$i]!="."&& $list[$i]!="..")){ //
//                echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</a></li>\n";
//            }
//            $i++;
//        }
//    }
*/
require ('view/top.php');
?>
<!--<a href="create.php">create</a>-->
<?php //if(isset($_GET['id'])){ ?>
<!--    <a href="update.php?id=--><?php //echo $_GET['id']; ?><!--">update</a>-->
<!--    <form action="delete_process.php" method="post">-->
<!--        <input type="hidden" name="id" value="--><?//=$_GET['id']?><!--">-->
<!--        <input type="submit" value="delete">-->
<!--    </form>-->
<?php //} ?>
<div id="article">
<h2>
    <?php
    print_title(); // 아래코드를 함수로 만들어줌
    //            if(isset($_GET['id'])){
    //                // 만약에 id 값이 있다면 아래 코드가 실행되고
    //                echo $_GET['id'];
    //            }
    //            else{
    //                // 없다면
    //                echo "Welcome";
    //            }
    ?>
</h2>
<?php
print_description();
//                // echo data/id 값에 해당하는 파일의 내용;
//                if(isset($_GET['id'])){
//                    echo file_get_contents("data/".$_GET['id']);//.".html"
//                }
//                else{
//                    echo "Hello, PHP";
//                }
?>
    <?php if(isset($_GET['id'])){ ?>
        <div class="grid_update_delete">
            <div></div>
            <p class="button" id="update_button"><a href="update.php?id=<?php echo $_GET['id']; ?>">글 수정</a></p>
            <form action="delete_process.php" method="post">
                <input class="hidden" type="hidden" name="id" value="<?=$_GET['id']?>">
                <input class="button" type="submit" value="글 삭제">
            </form>
        </div>
    <?php } ?>
<?php
require ('view/bottom.php');
?>
<!--    </body>-->
<!--</html>-->
