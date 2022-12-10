<?php
$token = $_COOKIE["TOKEN"]; //받아온 토큰 저장 (사용자)
$connect = mysqli_connect('localhost', 'root', '123456','profile');
$connect2 = mysqli_connect('localhost', 'root', '123456','maindata');
mysqli_query($connect, 'set session character_set_connection=utf8;');
mysqli_query($connect, 'set session character_set_results=utf8;');
mysqli_query($connect, 'set session character_set_client=utf8;');
$sql = "select * from member_tbl where token = $token";


$result = mysqli_query($connect, $sql);
$rows = mysqli_fetch_row($result);
//성공
if($rows) {
    $sql = "delete from member_tbl where token = $token"; // 프로파일 날리고
    $result = mysqli_query($connect, $sql);
    for ($temp = 1; $temp < 10; $temp++) {
        $string = "tbl_20220" . $temp;
        $sql2 = "delete from $string where token = $token"; //maindata 날리고
        $result2 = mysqli_query($connect2, $sql2);
    }for ($temp = 10; $temp < 13; $temp++) {
        $string = "tbl_2022" . $temp;
        $sql2 = "delete from $string where token = $token"; //maindata 날리고
        $result2 = mysqli_query($connect2, $sql2);
    }
    echo  "<script> 
	    alert('탈퇴처리 되었습니다.');
         document.location.href='../index.html'; 
         </script>";
}
else{
	echo "<script> 
		 alert('일치하는 정보가 없습니다. 관리자에게 문의하세요.');
		 document.location.href='../index.html'; 
		 </script>"; 
}
?>