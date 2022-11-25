<?php
$db_id = ($_POST['Id']);  
$db_passswd = ($_POST['Pass_word']);
$db_name = ($_POST['User_Name']);  
$db_phoneNumber = ($_POST['p1']).($_POST['p2']).($_POST['p3']);  

$connect = mysqli_connect('localhost', 'root', '123456','profile');
mysqli_query($connect, 'set session character_set_connection=utf8;');
mysqli_query($connect, 'set session character_set_results=utf8;');
mysqli_query($connect, 'set session character_set_client=utf8;');

$sql = "INSERT INTO member_tbl VALUES";
$sql = $sql."('$db_id', '$db_passswd', '$db_name', '$db_phoneNumber')";

mysqli_query($connect, $sql);
?> <!--회원가입 저장 코드-->

<?php
$db_select = "select *from guest";
$result = mysqli_query($connect, $db_select);

$count = mysqli_num_fields($result); 
while($rows = mysqli_fetch_row($result))
{
	echo "<tr>";
	for($i = 0; $i <$count; $i++)
	{
		echo"<td> $rows[$i]</td>";
	}
	echo"</tr>";
}

$rows = mysqli_num_rows($result);
echo "레코드 수 = $rows";

?>

</table>
