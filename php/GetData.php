<?php
$token = $_COOKIE["TOKEN"]; //받아온 토큰 저장 (사용자)
$db_1st = ($_POST['1st']);
switch($db_1st){
    case "지출":
        $db_1st = 1;
        break;
    case "수입":
        $db_1st = 2;
        break;
    case "구분":
        echo "<script> alert('월 입력해라 시댕아')
                                document.location.href='../php/main.php'</script>";
        break;
}
$db_2nd = ($_POST['2nd']);
$db_3rd = ($_POST['3rd']);
$db_month = ($_POST['year']).($_POST['month']);
$db_time = $db_month.($_POST['day']);
$db_money = ($_POST['money']);
$db_memo = ($_POST['memo']);
$db_month = "tbl_".($_POST['year']).($_POST['month']);

$connect = mysqli_connect('localhost', 'root', '123456','maindata');
mysqli_query($connect, 'set session character_set_connection=utf8;');
mysqli_query($connect, 'set session character_set_results=utf8;');
mysqli_query($connect, 'set session character_set_client=utf8;');

if($db_month == "tbl_연도월" || $db_month == "tbl_2022월"){
    echo "<script> alert('월 입력해라 시댕아')
                                document.location.href='../php/main.php'</script>";
}

$num = rand(10000, 99999);

if($num!=0) {
    $sql = "select number from $db_month where number = $num";
    $test = mysqli_query($connect, $sql);
}

$sql = "INSERT INTO $db_month VALUES";
$sql = $sql."('$token', $db_1st, '$db_2nd', '$db_3rd', '$db_time', $db_money ,'$db_memo', $num)";

$result = mysqli_query($connect, $sql);

if($result){
    echo "<script> 
document.location.href='main.php'; 
</script>";
} else{
    echo '<script> console.log("값을 확인해주세요.") </script>';
}
?> <!--데이터 저장 코드-->