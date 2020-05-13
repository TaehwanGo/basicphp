<?php
require_once ('lib/connect_db.php');
$conn = connect_db();
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
    <div>
        <table border="1">
            <tr>
                <td>id</td><td>name</td><td>profile</td><td>수정</td><td>삭제</td>
                <?php
                $sql = "SELECT * FROM author";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)){
                    $filtered = array( // cross side script 방지
                        'id'=>htmlspecialchars($row['id']),
                        'name'=>htmlspecialchars($row['name']),
                        'profile'=>htmlspecialchars($row['profile'])
                    );
                    ?>
                    <tr>
                        <td><?=$filtered['id']?></td>
                        <td><?=$filtered['name']?></td>
                        <td><?=$filtered['profile']?></td>
                        <td><a href="author.php?id=<?=$filtered['id']?>">update</a></td>
                        <td>
                            <form action="process_delete_author.php" method="post" onsubmit="if(!confirm('자료를 삭제하시겠습니까?')){return false;}">
                                <input type="hidden" name="id" value="<?=$filtered['id']?>">
                                <input type="submit" value="delete">
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tr>
        </table>
        <?php
        $escaped = array(
            'name'=>'',
            'profile'=>''
        );
        $label_submit = 'Create author';
        $form_action = 'process_create_author.php';
        $form_id = '';
        if(isset($_GET['id'])){
            $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
            settype($filtered_id, 'integer');
            $sql = "SELECT * FROM author WHERE id = {$filtered_id}";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $escaped['name'] = htmlspecialchars($row['name']);
            $escaped['profile'] = htmlspecialchars($row['profile']);
            $label_submit = 'Update author';
            $form_action = 'process_update_author.php';
            $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
        }
        ?>
        <form action="<?=$form_action?>" method="post">
            <?=$form_id?>
            <p><input type="text" name="name" placeholder="name" value="<?=$escaped['name']?>"></p>
            <p><textarea name="profile" placeholder="profile"><?=$escaped['profile']?></textarea></p>
            <p><input type="submit" value="<?=$label_submit?>"></p>
        </form>
    </div>
    <div id="end">
        <p class="end_info">(주)팀노바</p>
        <p class="end_info">서울특별시 동작구 사당로 17길 21 2층</p>
    </div>
</body>
</html>