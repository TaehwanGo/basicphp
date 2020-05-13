<?php
// HTML을 HTML2로 바꾸면 데이터의 이름을 바꿔야함
// 기존 코드
//rename('data/'.$_POST['old_title'], 'data/'.$_POST['title']);
//file_put_contents('data/'.$_POST['title'], $_POST['description']); //'data/'.
//header('Location: /index.php?id='.$_POST['title']);

// 새로운 코드(db연동) // 코드 중복된다고 경고뜨긴하는데 실행되려나 모르겠네
require_once ('lib/connect_db.php');
$conn = connect_db(); // 이게 문제네 // 위에 require추가해서 해결

settype($_POST['id'], 'integer'); // id값은 반드시 정수가 됨
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'name'=>mysqli_real_escape_string($conn, $_POST['name']),
    'profile'=>mysqli_real_escape_string($conn, $_POST['profile'])
);

$sql = "
    UPDATE author
    SET
        name = '{$filtered['name']}',
        profile = '{$filtered['profile']}'
    WHERE
        id = {$filtered['id']}
    ";
//die($sql);
$result = mysqli_query($conn, $sql);

if($result === false){
    echo "저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.\n";
    echo mysqli_error($conn);
    error_log(mysqli_error($conn)); // saved in apache error log : homework : check this out // got it
} else {
    echo '저장에 성공했습니다. <a href="index.php">돌아가기</a>';
    header('Location: author.php?id='.$filtered['id']);
}

//header('Location: /index.php?id='.$_POST['id']);