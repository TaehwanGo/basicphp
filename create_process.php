<?php
//file_put_contents('data/'.$_POST['title'], $_POST['description']); // 이거 왜 파일 생성이 안되지? data permission change 후 잘됨
// file로 데이터를 생성해서 저장하는 방식에서 db에 저장하는 방식으로 바꿔보자
// id, title, description중 id는 언급하지 않으면 자동으로 증가됨
//$conn = mysqli_connect('127.0.0.1','root','root-password', 'teamnova');
require_once ('lib/connect_db.php');
$conn = connect_db();

$filtered = array(
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description']),
    'author_id'=>mysqli_real_escape_string($conn, $_POST['author_id'])
);
if(empty($filtered['title']) || $filtered['title']==""){ // 이게 공백 해결은 안됨
    $filtered['title'] = date("Y-m-d H:i:s");
}

$sql = "
    INSERT INTO topic
    (title, description, created, author_id)
    VALUES (
        '{$filtered['title']}',
        '{$filtered['description']}',
        NOW(),
        {$filtered['author_id']}
    )";
//die($sql);
$result = mysqli_query($conn, $sql);
//echo $sql;

if($result === false){
    echo "저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.\n";
    echo mysqli_error($conn);
    error_log(mysqli_error($conn)); // saved in apache error log : homework : check this out // got it
} else {
    echo '저장에 성공했습니다. <a href="index.php">돌아가기</a>';
}

// 이건 아마 DB에서 가져와야 되니까 좀 나중에 배울 것 같다.
//header('Location: /index.php?id='.$_POST['title']); // 왜 작동안하지? /share 까지 적어줘야함 // 사용자를 어디로 보낼지 Location: 여기에 적음
//auto increase 되니까 id가 뭔지 모르는구나 .. id를 가져와야되겠구나 ..
//header('Location: /index.php');
//$sql = "SELECT * FROM topic";
$sql = "SELECT * FROM topic WHERE topic.author_id={$filtered['author_id']}"; // 현재 글 작성자 아이디값을 가져와야 됨


$result = mysqli_query($conn, $sql); // object 형태로 반환
//print_r($result); // log
//exit; // log
while($row = mysqli_fetch_array($result)){ // mysqli_fetch_array($result) 실행할때마다 다음 데이터 가져옴
//    var_dump($row);
    $get_latest_id = $row['id'];
}
//exit; // log

// 게시글 id 전달이 안되는 중
header('Location: /index.php?id='.$get_latest_id);
