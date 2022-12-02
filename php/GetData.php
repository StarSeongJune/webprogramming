<?php
$token = $_COOKIE["TOKEN"]; //받아온 토큰 저장 (사용자)
$temp = ($_POST['1st']);
switch($temp){
    case "지출":
        $db_1st = 1;
        break;
    case "수입":
        $db_1st = 2;
        break;
}
$db_2nd = ($_POST['2nd']);
$db_3rd = ($_POST['3rd']);  
$db_time = ($_POST['date']);
$db_money = ($_POST['money']);
$db_memo = ($_POST['memo']);  

$connect = mysqli_connect('localhost', 'root', '123456','maindata');
mysqli_query($connect, 'set session character_set_connection=utf8;');
mysqli_query($connect, 'set session character_set_results=utf8;');
mysqli_query($connect, 'set session character_set_client=utf8;');

$sql = "INSERT INTO tbl_202211 VALUES";
$sql = $sql."('$token', $db_1st, '$db_2nd', '$db_3rd', '$db_time', $db_money ,'$db_memo')";

$result = mysqli_query($connect, $sql);

if($result){
    echo "<script> 
document.location.href='main.php'; 
</script>"; 
} else{
    echo '<script> console.log("값을 확인해주세요.") </script>';
}
?> <!--데이터 저장 코드-->
