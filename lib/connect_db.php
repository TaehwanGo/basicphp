<?php
function connect_db(){
    return mysqli_connect('127.0.0.1','root','root-password', 'teamnova'); // 전역변수가 안먹히나? 일단 그래서 지역(함수안)으로 선언함
}