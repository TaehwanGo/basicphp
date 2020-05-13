<?php
// DB접속
//$conn = mysqli_connect('127.0.0.1','root','root-password', 'teamnova'); // 전역변수가 안먹히나?
//function connect_db(){
//    return mysqli_connect('127.0.0.1','root','root-password', 'teamnova'); // 전역변수가 안먹히나? 일단 그래서 지역(함수안)으로 선언함
//}
require_once ('lib/connect_db.php');
//$conn = connect_db(); // 이게 전역변수로 선언되면 좋을 텐데
function get_contents(){
    // DB연동 코드
    $conn = connect_db(); // 이게 전역변수로 선언되면 좋을 텐데
    if(isset($_GET['id'])){
        $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM topic LEFT JOIN author ON topic.author_id=author.id WHERE topic.id={$filtered_id}";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        return array(
            'title'=>htmlspecialchars($row['title']),
            'description'=>htmlspecialchars($row['description']),
            'name'=>htmlspecialchars($row['name'])
        );
    }
//    print_r($article);
}


function print_title(){
    $article = get_contents();
    if(isset($_GET['id'])){
        echo $article['title'];
    }
    else{
        // 없다면
        echo "A/S 요청 게시판입니다.";
    }

    // 기존 코드
//    if(isset($_GET['id'])){
//        // 만약에 id 값이 있다면 아래 코드가 실행되고
//        // 사용자가 입력하는 정보는 모두 불신해라 : XSS적용
//        //echo $_GET['id'];
//        echo htmlspecialchars($_GET['id']); // js 방지
//    }
//    else{
//        // 없다면
//        echo "A/S 요청 게시판입니다.";
//    }
}

function print_description(){
    $article = get_contents(); // 유지보수는 좋겠지만 제목에서도 본문에서도 db접속, 컨텐츠 가져오기가 반복되므로 안좋음

    if(isset($_GET['id'])){
        echo $article['description'];
    }
    else{
        echo "A/S요청 시 문제되는 설비명과 에러코드를 적어주세요.";
    }

    // 기존 코드
//    // echo data/id 값에 해당하는 파일의 내용;
//    if(isset($_GET['id'])){
//        // password file 보호
////        echo "<br>";
////        echo basename("data/".$_GET['id']);
////        echo "<br>";
//        $basename = basename("data/".$_GET['id']);
//
//        //echo file_get_contents("data/".$_GET['id']);//.".html"
//        //echo htmlspecialchars(file_get_contents("data/".$_GET['id']));
//        // 본문을 줄바꿈으로 하면 이미지태그나 줄바꿈 등 몇몇 필수적인 것을 못 할수 있음
//
//        echo htmlspecialchars(file_get_contents("data/".$basename));
//    }
//    else{
//        echo "A/S요청 시 문제되는 설비명과 에러코드를 적어주세요.";
//    }
}

function print_author(){
    $article = get_contents(); // 유지보수는 좋겠지만 제목에서도 본문에서도 db접속, 컨텐츠 가져오기가 반복되므로 안좋음

    if(isset($_GET['id'])){
        echo "by {$article['name']}";
//        echo $article['name'];
    }
}

function print_list(){
//    $conn = mysqli_connect('127.0.0.1','root','root-password', 'teamnova'); // 전역변수가 안먹히나? 일단 그래서 지역(함수안)으로 선언함
    $conn = connect_db();
    $sql = "SELECT * FROM topic";
    $result = mysqli_query($conn, $sql); // object 형태로 반환
//    $row = mysqli_fetch_array($result); // object를 배열로 반환, 실행할때마다 한행씩 보여줌, 가져올 값이 없으면 null(false)
    while($row = mysqli_fetch_array($result)){
        // <li><a href=\"index.php?id=19\">MySQL</a></li>
//        echo "<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>"; // 사용자로 부터 입력된 정보는 escaping을 해야함
        $escaped_title = htmlspecialchars($row['title']);
//        echo "<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
        echo "<li onclick=\"location.href='http://localhost/index.php?id={$row['id']}';\" style=\"cursor:pointer;\">{$escaped_title}</li>";
    }

    // 기존 코드 - php file방식
//    $i = 0;
//    $list = scandir('./data');

//    while($i < count($list)){
//        $item = htmlspecialchars($list[$i]);
//        if(($list[$i]!="."&& $list[$i]!="..")){ //
//            echo "<li><a href=\"index.php?id=$item\">$item</a></li>\n";
//        }
//        $i++;
//    }


}