<?php
// data directory에 있는 파일을 삭제하는 php방법을 찾아서 작성
//unlink('data/'.$_POST['id']); // $_GET['id']
unlink('data/'.basename($_POST['id'])); // 파일 삭제를 data만을 삭제 하도록 제한함
header('Location: /index.php'); // go home