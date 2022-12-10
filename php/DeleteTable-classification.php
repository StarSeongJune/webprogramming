<?php
$number = $_POST['number'];
$tablename = "tbl_".substr($_POST['month'], 0, 6);

$connect = mysqli_connect('localhost', 'root', '123456','maindata');
mysqli_query($connect, 'set session character_set_connection=utf8;');
mysqli_query($connect, 'set session character_set_results=utf8;');
mysqli_query($connect, 'set session character_set_client=utf8;');

$sql = "delete from $tablename where number = $number";
$result = mysqli_query($connect, $sql);
if($result){
	echo "<script> 
		 alert('삭제되었습니다.');
		 document.location.href='classification_Page.php'; 
		 </script>";
}else{
	echo "<script> 
		 alert('삭제 되지 않았습니다.');
		 document.location.href='classification_Page.php'; 
		 </script>";
}
?>
