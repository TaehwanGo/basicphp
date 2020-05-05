<?php
//    echo "<p>title : ".$_GET['title']."</p>"; // $_GET은 배열임을 알 수 있다.(index를 문자형태(키)로 값을 가져오는 것 : 연관 배열)
//    echo "<p>description : ".$_GET['description']."</p>";
//  file_put_contents('data/'.$_GET['title'], $_GET['description']);
    file_put_contents('data/'.$_POST['title'], $_POST['description']);

/* ?> // Redundant closing tag */