<?php
// HTML을 HTML2로 바꾸면 데이터의 이름을 바꿔야함
rename('data/'.$_POST['old_title'], 'data/'.$_POST['title']);
file_put_contents('data/'.$_POST['title'], $_POST['description']); //'data/'.
header('Location: /index.php?id='.$_POST['title']);