<?php
// data directory에 있는 파일을 삭제하는 php방법을 찾아서 작성
//unlink('data/'.$_POST['id']); // $_GET['id']
// 기존코드
//unlink('data/'.basename($_POST['id'])); // 파일 삭제를 data만을 삭제 하도록 제한함
//header('Location: /index.php'); // go home

// db연동 코드
require_once ('lib/connect_db.php');
$conn = connect_db(); // 이게 문제네 // 위에 require추가해서 해결

settype($_POST['id'], 'integer'); // id값은 반드시 정수가 됨
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id'])
);
$sql = "
    DELETE 
        FROM topic
        WHERE author_id = {$filtered['id']}
    ";
mysqli_query($conn, $sql); // 이런명령은 위험하기때문에 사용자를 믿으면 안됨

$sql = "
    DELETE 
        FROM author
        WHERE id = {$filtered['id']}
    ";
//die($sql);
$result = mysqli_query($conn, $sql);

if($result === false){
    echo "삭제하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.\n";
    echo mysqli_error($conn);
    error_log(mysqli_error($conn)); // saved in apache error log : homework : check this out // got it
} else {
    echo '삭제에 성공했습니다. <a href="index.php">돌아가기</a>';
}

header('Location: /author.php');