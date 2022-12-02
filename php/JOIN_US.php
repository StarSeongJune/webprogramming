<?php

$db_id = ($_POST['id']);  
$db_passswd = base64_encode(hash('sha256', ($_POST['pw']), true));
$db_name = ($_POST['name']);  
$db_phoneNumber = '010'.($_POST['pn1']).($_POST['pn3']); 
$token = 0;

$connect = mysqli_connect('localhost', 'root', '123456','profile');
mysqli_query($connect, 'set session character_set_connection=utf8;');
mysqli_query($connect, 'set session character_set_results=utf8;');
mysqli_query($connect, 'set session character_set_client=utf8;');
while(1){
	$token = rand(10000, 99999);
		if($token!=0){
			$sql = "select token from member_tbl where token = $token";
		$test = mysqli_query($connect, $sql);
		$rows = mysqli_fetch_row($test);
		if(!$rows){
			break;
		}
		else{
			echo  "<script> 
	 alert('관리자에게 문의하세요.')</script>";
		}
	}
	
}

$sql = "select * from member_tbl where id = '$db_id'";
$result = mysqli_query($connect, $sql);
$rows = mysqli_fetch_row($result);

// 실패
if($rows){
	echo  "<script> 
	 alert('이미 사용 중인 ID입니다.');
	 document.location.href='../html/join.html'; 
	 </script>"; 
}

//성공
else{
	$sql = "INSERT INTO member_tbl VALUES";
	$sql = $sql."($token, '$db_id', '$db_passswd', '$db_name', '$db_phoneNumber')";
	$result = mysqli_query($connect, $sql);
	echo "<script> 
		 alert('회원가입이 완료되었습니다.');
		 document.location.href='../index.html'; 
		 </script>"; 
}
?>
