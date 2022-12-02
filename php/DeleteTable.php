<?php
$token = $_COOKIE["TOKEN"]; //받아온 토큰 저장 (사용자)
$connect = mysqli_connect('localhost', 'root', '123456','maindata');
mysqli_query($connect, 'set session character_set_connection=utf8;');
mysqli_query($connect, 'set session character_set_results=utf8;');
mysqli_query($connect, 'set session character_set_client=utf8;');
$sql = "select * from tbl_202211 where token = $token";
$result = mysqli_query($connect, $sql);
$rows = mysqli_fetch_row($result);

setcookie("1ST", $rows[1], time()+1800);
setcookie("2ND", $rows[2], time()+1800);
setcookie("3RD", $rows[3], time()+1800);
setcookie("TIME", $rows[4], time()+1800);
setcookie("MONEY", $rows[5], time()+1800);
setcookie("MEMO", $rows[6], time()+1800);

$db_1st = $_COOKIE["1ST"];
$db_2nd = $_COOKIE["2ND"];
$db_3rd = $_COOKIE["3RD"];
$db_time = $_COOKIE["TIME"];
$db_money = $_COOKIE["MONEY"];
$db_memo = $_COOKIE["MEMO"];
//성공
if($rows){
    $sql = "delete from tbl_202211 where money = $db_money";
	$result = mysqli_query($connect, $sql);
	echo  "<script> 
	 alert('삭제 되었습니다.');
	 document.location.href='main.php'; 
	 </script>"; 
}
//실패
else{
	echo "<script> 
		 alert('삭제 되지 않았습니다.');
		 document.location.href='main.php'; 
		 </script>"; 
}
?>