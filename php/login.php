<?php
$db_id = ($_POST['id']);  
$db_passswd = base64_encode(hash('sha256', ($_POST['password']), true));

$connect = mysqli_connect('localhost', 'root', '123456','profile');
mysqli_query($connect, 'set session character_set_connection=utf8;');
mysqli_query($connect, 'set session character_set_results=utf8;');
mysqli_query($connect, 'set session character_set_client=utf8;');

$sql = "select token from member_tbl where id = '$db_id' and pw='$db_passswd'";
$result = mysqli_query($connect, $sql);

$rows = mysqli_fetch_row($result);
if($rows){
    setcookie("TOKEN", $rows[0], time()+1800);
    echo  "<script> 
	 document.location.href='../php/main.php'; 
	 </script>";
}
else{
    echo "<script>alert('일치하는 정보가 없습니다.')
    document.location.href='../index.html'; 
    </script>";
}
?>