<!DOCTYPE html>
<html lang="ko"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
  <title>참조 - 가계부/분류페이지 </title>
  <link rel="stylesheet" href="../css/class.css">
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
        <div class="input_container">
            <fieldset class="input_container">
              <form method="post" action="../php/select_Table.php">
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
                <button id="sumitbutton"><B>찾기</B></button>
              </form>
            </fieldset>      
          </div>
        
    
      <div class="import_container">
        <fieldset class="import_container">
              <table class="tb_main">
                <tr>
                 <td class="td_main"><B> 대분류 </B></td>
                 <td class="td_main"><B> 중분류 </B></td>
                 <td class="td_main"><B> 소분류 </B></td>
                 <td class="td_main"><B> 날짜 </B></td>
                 <td class="td_main"><B> 변동금액 </B></td>
                 <td class="td_main"><B> 메모 </B></td>
                </tr>


               </table><br>
        </fieldset>      
      </div>

    </td>
  </tr>
</table>

    </div>
</div>
</body>
</html>