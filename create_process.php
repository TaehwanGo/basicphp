<?php
file_put_contents('data/'.$_POST['title'], $_POST['description']); // 이거 왜 파일 생성이 안되지? data permission change 후 잘됨
//sleep(3); // sleep 줘도 안됨
header('Location: /index.php?id='.$_POST['title']); // 왜 작동안하지? /share 까지 적어줘야함 // 사용자를 어디로 보낼지 Location: 여기에 적음


