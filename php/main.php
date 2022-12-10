<!DOCTYPE html>
<html lang="ko"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
  <title>참조 - 가계부 </title>
  <link rel="stylesheet" href="../css/main.css">
  <script src="../js/main.js"></script>
  <link rel="stylesheet" href="../css/font.css">
  <link rel="logo icon" href="../img/logo_icon.png">
</head>
<body>
<div id="container">

    <!--네비게이션-->
    <div id = "nav_container">
        <div id = "navigation">

            <div class="form_logo">
                <img id="logo" src="../img/logo_icon.png">
            </div>

              <?php
                $token = $_COOKIE["TOKEN"];
                if(!$token){ // 토큰이 없는 경우 로그인 페이지로 이동
                  echo "<script>document.location.href='../index.html'; </script>"; 
                }
                $connect = mysqli_connect('localhost', 'root', '123456','profile');
                mysqli_query($connect, 'set session character_set_connection=utf8;');
                mysqli_query($connect, 'set session character_set_results=utf8;');
                mysqli_query($connect, 'set session character_set_client=utf8;');
                $sql = "select name from member_tbl where token = $token";
                $result = mysqli_query($connect, $sql);
                $rows = mysqli_fetch_row($result);
                echo  '<div class="form_member">';
                echo $rows[0];
                echo '님 환영합니다 </div>';
              ?>

            <div class = "form_nav_box_set">

                <form action="../index.html">
                    <button class="form_nav_box form_submit_button">로그아웃</button>
                </form>

                <div class = "form_nav_box form_nav_box2">
                    <a>가계기입</a>
                </div>

                <div class = "form_nav_box form_nav_box3">
                    <a href="classification_Page.php" class="movepage">상세조회</a>
                </div>
            </div>

            <form action="../php/secession.php">
                <button class="menu_item">회원탈퇴</button>
            </form>

        </div>
    </div>
    <!--네비게이션-->

    <!--통계-->
    <div id = "stat_container">

        <div id = "statistics">

            <div class = "stat stat_total">
                <a class="form_result_name">
                  <?php //총자산 출력
                    $token = $_COOKIE["TOKEN"];

                    $today = "tbl_".date("Ym");

                    $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
                    mysqli_query($connect, 'set session character_set_connection=utf8;');
                    mysqli_query($connect, 'set session character_set_results=utf8;');
                    mysqli_query($connect, 'set session character_set_client=utf8;');

                    $sql = "select money from $today where 1st = 2 and token = $token"; //1st가 2일경우 수입
            
                    $result = mysqli_query($connect, $sql);
                    $Total_Mymoney = 0;

                    while($rows = mysqli_fetch_row($result)){
                      $Total_Mymoney += $rows[0];
                  
                    }     
                    $sql = "select money from $today where 1st = 1 and token = $token"; //1st가 1일경우 지출

                    $result = mysqli_query($connect, $sql);

                    while($rows = mysqli_fetch_row($result)){ //레코드 수
                      $Total_Mymoney -= $rows[0];
                      }
                      //여기랑
                        $Total_Mymoney = number_format($Total_Mymoney);
                      echo "총자산<br>$Total_Mymoney 원";
                  ?>
                </a>
            </div>

            <div class = "stat stat_plus">
                <a class="form_result_name">
                  <?php //이달 소득 출력
                    $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
                    mysqli_query($connect, 'set session character_set_connection=utf8;');
                    mysqli_query($connect, 'set session character_set_results=utf8;');
                    mysqli_query($connect, 'set session character_set_client=utf8;');

                    $sql = "select money from $today where 1st = 2 and token = $token"; //1st가 2일경우 수입

                    $result = mysqli_query($connect, $sql);
                    $count = mysqli_num_fields($result); // 필드수
                    $Total_Month_in = 0; 

                    while($rows = mysqli_fetch_row($result)){
                        $Total_Month_in += $rows[0];
                    }
                    //여기
                  $Total_Month_in = number_format($Total_Month_in);
                    echo "이달 소득<br>$Total_Month_in 원";
                  ?>
               </a>
            </div>

            <div class = "stat stat_minus">
                <a class="form_result_name">
                  <?php //이달 지출
                    $Total_Month_out = 0;
                    $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
                    mysqli_query($connect, 'set session character_set_connection=utf8;');
                    mysqli_query($connect, 'set session character_set_results=utf8;');
                    mysqli_query($connect, 'set session character_set_client=utf8;');

                    $sql = "select money from $today where 1st = 1 and token = $token";
                    $result = mysqli_query($connect, $sql);
                    $count = mysqli_num_fields($result); // 필드수
    
                    while($rows = mysqli_fetch_row($result)){
                        $Total_Month_out -= $rows[0];
                    }
                    $Total_Month_out = number_format($Total_Month_out);
                    echo "이달 지출<br>$Total_Month_out 원";
                  ?>
                </a>
            </div>
        </div>
    </div>
            <!--통계-->

            <!--출력-->
            <div id = "out_container">
                <div id = "data_output">
                    <table class="tb_main">
                        <tr>
                            <td class="td_main"><B> 날짜 </B></td>
                            <td class="td_main"><B> 구분 </B></td>
                            <td class="td_main"><B> 대분류 </B></td>
                            <td class="td_main"><B> 소분류 </B></td>
                            <td class="td_main"><B> 금액 </B></td>
                            <td class="td_main"><B> 메모 </B></td>
                            <td class="td_main"><B> 삭제 </B></td>
                        </tr>

                    <?php //테이블 출력

                  $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
                  mysqli_query($connect, 'set session character_set_connection=utf8;');
                  mysqli_query($connect, 'set session character_set_results=utf8;');
                  mysqli_query($connect, 'set session character_set_client=utf8;');
                  $db_select = "select * from $today where token = '$token' ORDER BY time ASC";
                  $result = mysqli_query($connect, $db_select);


                  $count = mysqli_num_fields($result);
                  $dataArr[$count] = [8];
                  $tempCounter = 0;
                  while ( $rows = mysqli_fetch_row($result)){
                      for($A = 0;$A<8;$A++){
                          $dataArr[$tempCounter][$A] = $rows[$A];
                      }
                      $tempCounter++;
                  }
                  for($i=0; $i<$tempCounter; $i++) {
                      echo "<tr>";
                      echo "<tr>";
                      //날짜 출력
                      echo "<td class = 'date_class' align='center'>" . $dataArr[$i][4] . "</td>";

                      //소비 지출 구분
                      if ($dataArr[$i][1] == 1) {
                          echo "<td class = 'div_class' align='center'> 지출 </td>";
                      } elseif ($dataArr[$i][1] == 2) {
                          echo "<td class = 'div_class' align='center'> 수입 </td>";
                      }

                      //항목 출력
                      echo "<td class = 'div_class' align='center'>" . $dataArr[$i][2] . "</td>";
                      echo "<td class = 'div_class' align='center'>" . $dataArr[$i][3] . "</td    >";
                      echo "<td class = 'money_class' align='right'>" . number_format($dataArr[$i][5]) ."원</td>";
                      echo "<td class = 'memo_class' align='center'>" . $dataArr[$i][6] . "</td>";
                      echo "<form action=../php/DeleteTable.php method='post' id='tempform'>";
                      echo "<td align='center'><textarea name='number' hidden>".$dataArr[$i][7]."</textarea>
                            <textarea name='month' hidden>".$dataArr[$i][4]."</textarea>
                            <input type='submit' class= 'Delete_item' value='삭제'></td>";
                      echo "</tr>";
                      echo "</form>";
                  }
                ?>
                    </table>
                </div>
            </div>
            <!--출력-->

    <!--입력-->
    <div id="in_container">
        <div id = "data_input">

            <form action="GetData.php" method="POST">

                <select id="year" class="inputbox inputbox2"  name="year">
                    <option hidden>연도</option>
                    <option>2022</option>
                </select>
                <select id="month" class="inputbox inputbox2" name="month">
                </select>
                <select id="day" class="inputbox  inputbox2" name="day">
                    <option hidden>일</option>
                </select>
                <select id="first" class="inputbox  inputbox2" name="1st" >
                    <option hidden>구분</option>
                    <option>지출</option>
                    <option>수입</option>
                </select>
                <select id="second" class="inputbox  inputbox2"  name="2nd" >
                    <option hidden>대분류</option>
                </select>
                <select id="third" class="inputbox  inputbox2" name="3rd" >
                    <option hidden>소분류</option>
                </select>
                <input id = "money" type="number" name="money" class="inputbox" placeholder="금액">
                <input id = "memo" type="text" name="memo" class="inputbox" placeholder="메모">

                <button id="sumitbutton" class="inputbox" ><B>추가</B></button>
            </form>
        </div>
    </div>
<!--입력-->
</div>
</body>
</html>





