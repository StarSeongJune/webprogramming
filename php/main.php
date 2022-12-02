<!DOCTYPE html>
<html lang="ko"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
  <title>참조 - 가계부 </title>
  <link rel="stylesheet" href="../css/main.css">
  <script src="../js/main.js"></script>
  <link rel="stylesheet" href="../css/font.css">
  <link rel="logo icon" href="../img/logo_icon.png">
</head>
<body>
  <div id="container" class="main_container">
    <div style="padding: 20px;">

      <table>
        <tr>
          <td style="width: 350px; height: 700px;">
		<div class="choice_container">
      <fieldset class="choice_container">
        <div class="form_container">
          <form name="login_form" action="main.php" method="POST">
          
            <div style="height: 20px;"></div>
            <!--메인 로고-->
            <div class="form_title_div">
              <img id="logo" src="../img/logo_icon.png">
            </div>

            <div style="height: 50px;"></div>

            <div> <!--ID 표시-->
              <div>
                <a class="form_item_name"> </a>
                <?php
                  $token = $_COOKIE["TOKEN"];
                  $connect = mysqli_connect('localhost', 'root', '123456','profile');
                  mysqli_query($connect, 'set session character_set_connection=utf8;');
                  mysqli_query($connect, 'set session character_set_results=utf8;');
                  mysqli_query($connect, 'set session character_set_client=utf8;');
                  $sql = "select name from member_tbl where token = $token";
                  $result = mysqli_query($connect, $sql);
                  $rows = mysqli_fetch_row($result);
                  echo  '<a class="form_item_name">';
                  echo $rows[0];
                  echo '님 환영합니다 </a>';
                ?>
                
              </div>
              <div class="form_text_alert_padding">
                <div id="alert_username" class="form_text_alert"></div>
              </div>
            </div>
            <div style="height: 10px;"></div>
            <div> <!--로그인 버튼-->
              <button type="button" class="form_submit_button">로그아웃</button>
            </div>

            <div style="height: 10px;"></div>

            <div>
              <ul>
                 <li><a href="main.php">마이페이지</a></li>
                 <li><a href="class.php">분류</a></li>
              </ul>
            </div>
            <div style="height: 100px;"></div>
            <form name="login_form" action="logout.php" method="POST">
                     <div class="login_menu"> <!--회원탈퇴 버튼-->
                     <button type="button" class="menu_item" method="POST">회원탈퇴</button>
			               </div>
             </from>
          </form>	
        </div>
      </fieldset>
			<div class="footer"> <!--하단 출력-->
				<p class="copyright">ChamJo WebPrograming project 2022</p>
			</div>
	 </div>
  </td>

    <td>
      <div class="print_container">
        <fieldset class="print_container">
            <form name="login_form" action="main.php" method="POST">
              <div  class="resultbox">
                <a class="form_result_name"><b>총 자산</b></a><br>
                <a class="form_result_sum"><b>
                <?php //총자산 출력
                $token = $_COOKIE["TOKEN"];
                $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
                mysqli_query($connect, 'set session character_set_connection=utf8;');
                mysqli_query($connect, 'set session character_set_results=utf8;');
                mysqli_query($connect, 'set session character_set_client=utf8;');

                $sql = "select money from tbl_202211 where 1st = 2 and token = $token"; //1st가 2일경우 수입
         
                $result = mysqli_query($connect, $sql);
                $Total_Mymoney = 0;

                while($rows = mysqli_fetch_row($result)){
                  $Total_Mymoney += $rows[0];
              
                }     
                $sql = "select money from tbl_202211 where 1st = 1 and token = $token"; //1st가 1일경우 지출
 
                $result = mysqli_query($connect, $sql);

                while($rows = mysqli_fetch_row($result)){ //레코드 수
                  $Total_Mymoney -= $rows[0];
                  }
                  echo $Total_Mymoney;
                ?>
                </b></a><br>
              </div>

              <div id="alert_username" class="form_text_alert"></div>
            </form>
        </fieldset>      
      </div>

      <div class="print_container">
        <fieldset class="print_container">
            <form name="login_form" action="main.php" method="POST">
              <div class="resultbox">
                <a class="form_result_name"><b>이달 소득</b></a><br>
                <a class="form_result_plus"><b>
                <?php //이달 소득 출력
                $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
                mysqli_query($connect, 'set session character_set_connection=utf8;');
                mysqli_query($connect, 'set session character_set_results=utf8;');
                mysqli_query($connect, 'set session character_set_client=utf8;');

                $sql = "select money from tbl_202211 where 1st = 2 and token = $token"; //1st가 2일경우 수입

                $result = mysqli_query($connect, $sql);
                $count = mysqli_num_fields($result); // 필드수
                $Total_Month_in = 0; 

                while($rows = mysqli_fetch_row($result)){
                    $Total_Month_in += $rows[0];
                }
                echo "$Total_Month_in";
                ?>
                </b></a><br>
              </div>
            </form>
        </fieldset>      
      </div>

      <div class="print_container">
        <fieldset class="print_container">
            <form name="login_form" action="main.php" method="POST">
              <div class="resultbox">
                <a class="form_result_name"><b>이달 지출</b></a><br>
                <a class="form_result_minus"><b>
                <?php //이달 지출
                $Total_Month_out = 0;
                $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
                mysqli_query($connect, 'set session character_set_connection=utf8;');
                mysqli_query($connect, 'set session character_set_results=utf8;');
                mysqli_query($connect, 'set session character_set_client=utf8;');

                $sql = "select money from tbl_202211 where 1st = 1 and token = $token"; 
                $result = mysqli_query($connect, $sql);
                $count = mysqli_num_fields($result); // 필드수
 
                while($rows = mysqli_fetch_row($result)){
                    $Total_Month_out -= $rows[0];
                }

                echo "$Total_Month_out";
                ?>
                </b></a><br>
              </div>
            </form>
        </fieldset>      
      </div>

      <div class="import_container">
        <fieldset class="import_container">
           <form name="login_form" action="DeleteTable.php" method="POST">
              <table class="tb_main">

              <tr>
                 <td class="td_main"><B> 대분류 </B></td>
                 <td class="td_main"><B> 중분류 </B></td>
                 <td class="td_main"><B> 소분류 </B></td>
                 <td class="td_main"><B> 날짜 </B></td>
                 <td class="td_main"><B> 변동금액 </B></td>
                 <td class="td_main"><B> 메모 </B></td>
                 <td class="td_main"><B> 삭제 </B></td>
              </tr>

              <?php //테이블 출력
                $token = $_COOKIE["TOKEN"];
                
                $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
                mysqli_query($connect, 'set session character_set_connection=utf8;');
                mysqli_query($connect, 'set session character_set_results=utf8;');
                mysqli_query($connect, 'set session character_set_client=utf8;');              
                $db_select = "select * from tbl_202211 where token = '$token'";
                $result = mysqli_query($connect, $db_select);

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
                  echo"<td align='center'><button> 삭제</button></td>";
                	echo"</tr>";
                }

              ?>
               </table><br>
               </form>
        </fieldset>      
      </div>

      <div class="input_container">
        <fieldset class="input_container">
            <form name="login_form" action="GetData.php" method="POST">
                  <form method="post" action="../php/">
                    <select class="selectbox selectbox_css" id="first" name="1st" >
                      <option hidden>1차 카테고리</option>
                      <option>지출</option>
                      <option>수입</option>
                    </select>
                    <select class="selectbox selectbox_css" id="second" name="2nd" >
                      <option hidden>2차 카테고리</option>
                    </select>
                      <select class="selectbox selectbox_css"id="third" name="3rd" >
                      <option hidden>3차 카테고리</option>
                    </select>
                    <input type="number" name="money" class="selecttext_css" placeholder="금액">
                    <input type="text" name="memo" class="selecttext_css" placeholder="메모">
                    <input type="text" name="date" class="selecttext_css" placeholder="날짜">
                    <button id="sumitbutton" ><B>완료</B></button>
                  </form>
            </form>
        </fieldset>      
      </div>

    </td>
  </tr>
</table>

    </div>
</div>
</body>
</html>