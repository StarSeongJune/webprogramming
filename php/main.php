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
          <form name="login_form" action="http://113.198.232.72/main.php" method="get">
          
            <div style="height: 20px;"></div>
            <!--메인 로고-->
            <div class="form_title_div">
              <img id="logo" src="../img/logo_icon.png">
            </div>

            <div style="height: 50px;"></div>

            <div> <!--ID 표시-->
              <div>
                <a class="form_item_name">ID: </a>
                <a class="form_item_name">아무개</a>
              </div>
              <div class="form_text_alert_padding">
                <div id="alert_username" class="form_text_alert"></div>
              </div>
            </div>

            <div>
              <div> <!--날짜 표시-->
                <a class="form_item_name">Today: </a>
                <a class="form_item_name">2022-11-23</a>
              </div>
              <div class="form_text_alert_padding">
                <div id="alert_password" class="form_text_alert"></div>
              </div>
            </div>


            <div style="height: 10px;"></div>

            <div> <!--로그인 버튼-->
              <button type="button" class="form_submit_button" onclick="login()">로그아웃</button>
            </div>

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

            <div style="height: 10px;"></div>

            <div>
              <ul>
                 <li><a href="http://113.198.232.72/html/main.html">마이페이지</a></li>
                 <li><a href="http://113.198.232.72/html/class.html">분류</a></li>
                 <li><a href="http://113.198.232.72/html/math.html">통계</a></li>
                 <li><a href="http://113.198.232.72/html/heip.html">도움말</a></li>
              </ul>
            </div>

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
            <form name="login_form" action="http://113.198.232.72/main.php" method="get">
              <div  class="resultbox">
                <a class="form_result_name"><b>총 자산</b></a><br>
                <a class="form_result_sum"><b>
                <?php //총자산 출력
                $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
                mysqli_query($connect, 'set session character_set_connection=utf8;');
                mysqli_query($connect, 'set session character_set_results=utf8;');
                mysqli_query($connect, 'set session character_set_client=utf8;');

                $sql = "select money from tbl_202211 where 1st = 2 "; //1st가 2일경우 수입
         
                $result = mysqli_query($connect, $sql);
                $Total_Mymoney = 0;

                while($rows = mysqli_fetch_row($result)){
                  $Total_Mymoney += $rows[0];
              
                }     
                $sql = "select money from tbl_202211 where 1st = 1 "; //1st가 1일경우 지출
 
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
            <form name="login_form" action="http://113.198.232.72/main.php" method="get">
              <div class="resultbox">
                <a class="form_result_name"><b>이달 소득</b></a><br>
                <a class="form_result_plus"><b>
                <?php //이달 소득 출력
                $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
                mysqli_query($connect, 'set session character_set_connection=utf8;');
                mysqli_query($connect, 'set session character_set_results=utf8;');
                mysqli_query($connect, 'set session character_set_client=utf8;');

                $sql = "select money from tbl_202211 where 1st = 2 "; //1st가 2일경우 수입

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
            <form name="login_form" action="http://113.198.232.72/main.php" method="get">
              <div class="resultbox">
                <a class="form_result_name"><b>이달 지출</b></a><br>
                <a class="form_result_minus"><b>
                <?php //이달 지출
                $Total_Month_out = 0;
                $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
                mysqli_query($connect, 'set session character_set_connection=utf8;');
                mysqli_query($connect, 'set session character_set_results=utf8;');
                mysqli_query($connect, 'set session character_set_client=utf8;');

                $sql = "select money from tbl_202211 where 1st = 1 "; 
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
              <table class="tb_main">
               
               </table><br>
            </form>
        </fieldset>      
      </div>

      <div class="input_container">
        <fieldset class="input_container">
            <form name="login_form" action="http://113.198.232.72/main.php" method="get">
                  <form method="post" action="../php/">
                    <select class="selectbox selectbox_css" id="first" >
                      <option hidden>1차 카테고리</option>
                      <option>지출</option>
                      <option>수입</option>
                    </select>
                    <select class="selectbox selectbox_css" id="second" >
                      <option hidden>2차 카테고리</option>
                    </select>
                      <select class="selectbox selectbox_css"id="third" >
                      <option hidden>3차 카테고리</option>
                    </select>
                    <input type="number" name="money" class="selecttext_css">
                    <input type="text" name="memo" class="selecttext_css">
                    <input type="text" name="date" class="selecttext_css">
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