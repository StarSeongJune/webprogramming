<?php
$token = $_COOKIE["TOKEN"]; //받아온 토큰 저장 (사용자)
$connect = mysqli_connect('localhost', 'root', '123456','profile');
mysqli_query($connect, 'set session character_set_connection=utf8;');
mysqli_query($connect, 'set session character_set_results=utf8;');
mysqli_query($connect, 'set session character_set_client=utf8;');
$sql = "select * from member_tbl where token = $token";
$result = mysqli_query($connect, $sql);
$rows = mysqli_fetch_row($result);
//성공
if($rows){
	$sql = "delete from member_tbl where token = $token";
	$result = mysqli_query($connect, $sql);
	echo  "<script> 
	 alert('회원탈퇴 되었습니다.');
	 document.location.href='../index.html'; 
	 </script>"; 
}
//실패
else{
	echo "<script> 
		 alert('회원탈퇴가 되지 않았습니다.');
		 document.location.href='../index.html'; 
		 </script>"; 
}
?>