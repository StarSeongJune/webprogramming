<!DOCTYPE html>
<html lang="ko"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
  <title>참조 - 가계부 </title>
  <link rel="stylesheet" href="../css/main.css">
  <script src="../js/main.js"></script>
  <link rel="stylesheet" href="../css/font.css">
  <link rel="logo icon" href="../img/logo_icon.png">
</head>
<body>
  <table>
    <tr>
      <td style="width: 350px; height: 700px;">
        <div class="box123">
          <div  class ="two" style="margin: 7px;">참조 - 가계부</div>
          <br>
          <div class="box1234">
            <div style="text-align: center;">"   님 환영합니다."</div>
            <div style="text-align: center;">Today:<myFunction></div>
            <button>로그아웃</button>
          </div>
          <br>
          <div class="box1234">
            <ul>
               <li><a href="/">마이페이지</a></li>
               <li><a href="#main">메인페이지</a></li>
               <li><a href="#statistics">통계</a></li>
               <li><a href="#about">도움말</a></li>
            </ul>
          <div  class ="active"> 서비스개발: 우재현 주상현 배성준 정성엽 </div>
          </div>
        </div>
      </td>
      <td style="width: 1500px; height: 700px;">
        <div  class="box123">
          <div class="boxmain">
         총자산<br>
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
         
          echo"<tr>";
          echo "<td align='center'> $Total_Mymoney </td>";
          echo "</tr>";
         }   
        ?>

          </div>
        </div>
        <div  class="box123">
          <div class="boxmain">
            이달 소득<br>
          <?php //이달 소득 출력
            $this_month = "202211__"; 
            $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
            mysqli_query($connect, 'set session character_set_connection=utf8;');
            mysqli_query($connect, 'set session character_set_results=utf8;');
            mysqli_query($connect, 'set session character_set_client=utf8;');

            $sql = "select money from tbl_202211 where time = '$this_month' and 1st = 2 "; //1st가 2일경우 수입

            $result = mysqli_query($connect, $sql);
            $count = mysqli_num_fields($result); // 필드수
 
            while($rows = mysqli_fetch_row($result)){
              for($a = 0; $a < $count; $a++)
              {
                $Total_Month_in += $rows[$a];
              }
              echo "$Total_Month_in";
            }
          ?>    
          </div>
        </div>
        <div  class="box123">
          <div class="boxmain">
            이달 지출<br>
            <?php //이달 지출
            $this_month = '202211__'; 
            $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
            mysqli_query($connect, 'set session character_set_connection=utf8;');
            mysqli_query($connect, 'set session character_set_results=utf8;');
            mysqli_query($connect, 'set session character_set_client=utf8;');

            $sql = "select money from tbl_202211 where time = '$this_month' and 1st = 1 "; 
            $result = mysqli_query($connect, $sql);
            $count = mysqli_num_fields($result); // 필드수
 
            while($rows = mysqli_fetch_row($result)){
              for($a = 0; $a < $count; $a++)
              {
                $Total_Month_out += $rows[$a];
              }
              echo "$Total_Month_out";
            }
          ?>
          </div>
        </div>
        <br>
        <br>
        <div  class="box123">
          <div class="mainspace">
          <table width='1450' border='1' bordercolor='blue' cellpadding='10'>
            <tr>
            <td bgcolor='#9963ff' align='center'><B> 대분류 </B></td>
            <td bgcolor='#9963ff' align='center'><B> 중분류 </B></td>
            <td bgcolor='#9963ff' align='center'><B> 날짜 </B></td>
            <td bgcolor='#9963ff' align='center'><B> 소분류 </B></td>
            <td bgcolor='#9963ff' align='center'><B> 변동금액 </B></td>
            <td bgcolor='#9963ff' align='center'><B> 메모 </B></td>
            </tr>
          <?php
            $token = 'B'; //사용자 토큰 b인것 가져와 테이블에 출력 
            // 전체 테이블 출력

            $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
            mysqli_query($connect, 'set session character_set_connection=utf8;');
            mysqli_query($connect, 'set session character_set_results=utf8;');
            mysqli_query($connect, 'set session character_set_client=utf8;');

            $sql = "select 1st, 2nd, 3rd, time, money, memo from tbl_202211 where token ='$token'";

            $result = mysqli_query($connect, $sql);
            $count = mysqli_num_fields($result);

            while($rows = mysqli_fetch_row($result)){
              echo"<tr>";
              for($a = 0; $a < $count; $a++)
              {
                echo "<td align='center'> $rows[$a] </td>";
              }
              echo "</tr>";
            }
            ?>
           </table>
          </div>
        </div>
        <br><br>
        <div  class="box123">
          <div class="inputspace">
          <form method="post" action="/">
    <!--1차 카테고리-->
    <select id="first" name="1st" style="width: 200px; height: 80px;">
        <option class="category">구분</option>
        <option value="지출">지출</option>
        <option value="수입">수입</option>
    </select>
    <!--2차 카테고리-->
    <select id="second_수입" class="selector" name="2nd" style="width: 200px; height: 80px;">
        <option class="category">수입 카테고리</option>
        <option value="고정">고정</option>
        <option value="특별">특별</option>
        <option value="기타">기타</option>
    </select>
    <select id="second_지출" class="selector" name="2nd" style="width: 200px; height: 80px;">
        <option class="category">지출 카테고리</option>
        <option value="식비">식비</option>
        <option value="쇼핑">쇼핑</option>
        <option value="여가">여가</option>
        <option value="교통">교통</option>
        <option value="의료">의료</option>
        <option value="정기">정기</option>
        <option value="기타">기타</option>
    </select>
    <!--3차 카테고리-->
    <select id="third_고정" class="selector" name="3rd" style="width: 200px; height: 80px;">
        <option class="category">고정 상세 카테고리</option>
        <option value="용돈">용돈</option>
        <option value="급여">급여</option>
    </select>
    <select id="third_특별" class="selector" name="3rd" style="width: 200px; height: 80px;">
        <option class="category">특별 상세 카테고리</option>
        <option value="이자">이자</option>
        <option value="기타">기타</option>
    </select>
    <select id="third_식비" class="selector" name="3rd" style="width: 200px; height: 80px;">
        <option class="category">식비 상세 카테고리</option>
        <option value="식사">식사</option>
        <option value="간식">간식</option>
        <option value="외식">외식</option>
        <option value="재료비">재료비</option>
        <option value="기타">기타</option>
    </select>
    <select id="third_쇼핑" class="selector" name="3rd" style="width: 200px; height: 80px;">
        <option class="category">쇼핑 상세 카테고리</option>
        <option value="의류">의류</option>
        <option value="미용">미용</option>
        <option value="잡화">잡화</option>
        <option value="기타">기타</option>
    </select>
    <select id="third_여가" class="selector" name="3rd" style="width: 200px; height: 80px;">
        <option class="category">여가 상세 카테고리</option>
        <option value="게임">게임</option>
        <option value="서적">서적</option>
        <option value="영화">영화</option>
        <option value="여행">여행</option>
        <option value="기타">기타</option>
    </select>
    <select id="third_교통" class="selector" name="3rd" style="width: 200px; height: 80px;">
        <option class="category">교통 상세 카테고리</option>
        <option value="택시">택시</option>
        <option value="대중교통">대중교통</option>
        <option value="유류비">유류비</option>
        <option value="기타">기타</option>
    </select>
    <select id="third_의료" class="selector" name="3rd" style="width: 200px; height: 80px;">
        <option class="category">의료 상세 카테고리</option>
        <option value="병원">병원</option>
        <option value="약제">약제</option>
        <option value="기타">기타</option>
    </select>
    <select id="third_정기" class="selector" name="3rd" style="width: 200px; height: 80px;">
        <option class="category">정기결제 상세 카테고리</option>
        <option value="OTT">OTT</option>
        <option value="통신">통신</option>
        <option value="보험">보험</option>
        <option value="기타">기타</option>
    </select>
    <select id="third_기타" class="selector" name="3rd" style="width: 200px; height: 80px;">
        <option class="category">기타 상세 카테고리</option>
        <option value="기타">기타</option>
    </select>
    <input type="text" name="memo" style="width: 200px; height: 75px;">
    <input type="number" name="money" style="width: 200px; height: 75px;">
    <input type="submit" value="등록" style="width: 200px; height: 80px;">
</form>
          </div>
        </div>
      </td>
    </tr>
  </table>
</body>
</html>