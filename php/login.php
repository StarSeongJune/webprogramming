<?php

$db_token = ($_POST['token'])
$db_id = ($_POST['id']);  
$db_passswd = ($_POST['pw']);
$db_name = ($_POST['name']); 
$db_sex = ($_POST['sex']); 
$db_phoneNumber = ($_POST['p1']).($_POST['p2']).($_POST['p3']);   
$db_email = ($_POST['Email']); 

$connect = mysqli_connect('localhost', 'manager', '123456', 'profile');
$sql = "select id from member_tbl where id == "$db_id" "; 

mysqli_query($connect, 'set session character_set_connection=utf8;');
mysqli_query($connect, 'set session character_set_results=utf8;');
mysqli_query($connect, 'set session character_set_client=utf8;');

$result = mysqli_query($connect, $sql);
if($result){
    //오류 쿠기 반환
}

else{
    $sql = "INSERT INTO member_tbl VALUES";
    $sql = $sql."('$db_token','$db_id', '$db_passswd', '$db_name', '$db_sex', '$db_phoneNumber', '$db_email')";

    mysqli_query($connect, 'set session character_set_connection=utf8;');
    mysqli_query($connect, 'set session character_set_results=utf8;');
    mysqli_query($connect, 'set session character_set_client=utf8;');

    $result = mysqli_query($connect, $sql);
    if($result){
        //입력 성공 쿠기 반환
    }

}
?>
