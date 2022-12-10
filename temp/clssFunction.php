<?php
function open_table(){
    $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
    mysqli_query($connect, 'set session character_set_connection=utf8;');
    mysqli_query($connect, 'set session character_set_results=utf8;');
    mysqli_query($connect, 'set session character_set_client=utf8;');   

    $token = '1'; //받아온 토큰 저장 (사용자)
    switch($temp = ($_POST['1st'])){
        case "지출":
            $db_1st = 1;
            break;
        case "수입":
            $db_1st = 2;
            break;
    }
    $db_2nd = ($_POST['2nd']);
    $db_3rd = ($_POST['3rd']);  
    $sql = "select * from tbl_202211 where 3rd = '$db_3rd'";
    $result = mysqli_query($connect, $sql);
    $count = mysqli_num_fields($result);

    while($rows = mysqli_fetch_row($result))
    {
        echo "<tr>";
    if($rows[1] == 1){
        echo "<td align='center'> 지출 </td>";                       
    }
    elseif ($rows[1] == 2){
        echo "<td align='center'> 수입 </td>";
    }

    for($i = 2; $i <$count; $i++)
    {
        echo"<td align='center'> $rows[$i]</td>";
    }
    echo"</tr>";
    }
}
?>