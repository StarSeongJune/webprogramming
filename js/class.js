const temp = false;
document.addEventListener('DOMLoaded', ()=>{
    const sumitbutton = document.querySelector('#sumitbutton')

    sumitbutton.addEventListener('click', (event)=>{
        const tb_main = document.getElementById('tb_main')
        tb_main.innerHTML = "<?PHP open_table();?>"
    });
})


/*
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

 <script>
              function setCookie(UserID, UserPW, ExpMinute){
                let strCookie = "";
                strCookie = UserID + '=' + encodeURLComponent(UserPW) + "; Expries" + ExpMinute;
                document.cookie = strCookie;
              }

              function AddCookie(){
                let UserID = "UserID";
                let UserPW = $('#id');
                let date = new Date();
                date.setDate(date.getMinute() + 10);
                let expDate = date.toUTCString();
                window.location.href = "/showcookie";
              }
            </script>
*/