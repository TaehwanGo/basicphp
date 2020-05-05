<?php
function print_title(){
    if(isset($_GET['id'])){
        // 만약에 id 값이 있다면 아래 코드가 실행되고
        // 사용자가 입력하는 정보는 모두 불신해라 : XSS적용
        //echo $_GET['id'];
        echo htmlspecialchars($_GET['id']); // js 방지
    }
    else{
        // 없다면
        echo "A/S 요청 게시판입니다.";
    }
}
function print_description(){
    // echo data/id 값에 해당하는 파일의 내용;
    if(isset($_GET['id'])){
        // password file 보호
//        echo "<br>";
//        echo basename("data/".$_GET['id']);
//        echo "<br>";
        $basename = basename("data/".$_GET['id']);

        //echo file_get_contents("data/".$_GET['id']);//.".html"
        //echo htmlspecialchars(file_get_contents("data/".$_GET['id']));
        // 본문을 줄바꿈으로 하면 이미지태그나 줄바꿈 등 몇몇 필수적인 것을 못 할수 있음

        echo htmlspecialchars(file_get_contents("data/".$basename));
    }
    else{
        echo "A/S요청 시 문제되는 설비명과 에러코드를 적어주세요.";
    }
}

function print_list(){
    $i = 0;
    $list = scandir('./data');

    while($i < count($list)){
        $item = htmlspecialchars($list[$i]);
        if(($list[$i]!="."&& $list[$i]!="..")){ //
            echo "<li><a href=\"index.php?id=$item\">$item</a></li>\n";
        }
        $i++;
    }
}