<?php
//file_put_contents('data/'.$_POST['title'], $_POST['description']); // 이거 왜 파일 생성이 안되지? data permission change 후 잘됨
// file로 데이터를 생성해서 저장하는 방식에서 db에 저장하는 방식으로 바꿔보자
// id, title, description중 id는 언급하지 않으면 자동으로 증가됨
//$conn = mysqli_connect('127.0.0.1','root','root-password', 'teamnova');
require_once ('lib/connect_db.php');
$conn = connect_db();

$filtered = array(
    'name'=>mysqli_real_escape_string($conn, $_POST['name']),
    'profile'=>mysqli_real_escape_string($conn, $_POST['profile'])
);

$sql = "
    INSERT INTO author
    (name, profile)
    VALUES (
        '{$filtered['name']}',
        '{$filtered['profile']}'
    )
";
//die($sql);
$result = mysqli_query($conn, $sql);
//echo $sql;

if($result === false){
    echo "저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.\n";
    echo mysqli_error($conn);
    error_log(mysqli_error($conn)); // saved in apache error log : homework : check this out // got it
} else {
    echo '저장에 성공했습니다. <a href="index.php">돌아가기</a>';
    header('Location: author.php'); // redirection
}

