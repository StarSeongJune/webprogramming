<!DOCTYPE html>
<html lang="ko"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
  <title>참조 - 가계부/분류페이지 </title>
  <link rel="stylesheet" href="../css/classification.css">
    <script src="../js/class.js"></script>
  <link rel="stylesheet" href="../css/font.css">
  <link rel="logo icon" href="../img/logo_icon.png">
</head>

<body>
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
                  echo  '<a class="form_member">';
                  echo $rows[0];
                  echo '님 환영합니다 </a>';
                ?>
            <div class = "form_nav_box_set">

                <form action="../index.html">
                    <button class="form_nav_box form_submit_button">로그아웃</button>
                </form>

                <div class = "form_nav_box form_nav_box2">
                    <a href="main.php" class="movepage">가계기입</a>
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

    <!--입력-->
    <div id="in_container">
        <div id = "data_input">
            <form name="login_form" action="classification.php" method="POST">
                <select class="inputbox inputbox2" id="year" name="year">
                    <option hidden>연도</option>
                    <option>2022</option>
                </select>
                <select class="inputbox inputbox2" id="month" name="month"></select>
                <select class="inputbox  inputbox2" id="first" name="1st" >
                    <option hidden>구분</option>
                    <option>지출</option>
                    <option>수입</option>
                </select>
                <select class="inputbox  inputbox2" id="second" name="2nd" >
                    <option hidden>대분류</option>
                </select>
                <select class="inputbox  inputbox2"id="third" name="3rd" >
                    <option hidden>소분류</option>
                </select>
                <button id="sumitbutton"class="inputbox"><B>찾기</B></button>
            </form>
        </div>
    </div>


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
                            $token = $_COOKIE['TOKEN']; //받아온 토큰 저장 (사용자)

                            $db_year = ($_POST['year']);
                            $db_month = ($_POST['month']);
                            $db_1st = ($_POST['1st']);
                            $db_2nd = ($_POST['2nd']);
                            $db_3rd = ($_POST['3rd']);
                            $db_find = "tbl_".($db_year).($db_month);

                            switch($db_1st){
                                case "지출":
                                    $db_1st = 1;
                                    break;
                                case "수입":
                                    $db_1st = 2;
                                    break;
                            }

                            $connect = mysqli_connect('localhost', 'root', '123456', 'maindata');
                            mysqli_query($connect, 'set session character_set_connection=utf8;');
                            mysqli_query($connect, 'set session character_set_results=utf8;');
                            mysqli_query($connect, 'set session character_set_client=utf8;');

                            if($db_1st == "구분" && $db_2nd == "대분류" && $db_3rd == "소분류"){
                                $db_select = "select * from $db_find where token = $token ORDER BY time ASC";
                            }
                            elseif($db_2nd == "수입 카테고리" || $db_2nd == "지출 카테고리"){
                                $db_select = "select * from $db_find where token = $token and 1st = $db_1st ORDER BY time ASC";
                            }
                            elseif($db_3rd=="고정 상세 카테고리" || $db_3rd=="특별 상세 카테고리" || $db_3rd=="기타 상세 카테고리"||
                                   $db_3rd=="식비 상세 카테고리" || $db_3rd=="쇼핑 상세 카테고리" || $db_3rd=="여가 상세 카테고리"||
                                   $db_3rd=="교통 상세 카테고리" || $db_3rd=="의료 상세 카테고리" || $db_3rd=="정기 상세 카테고리"){
                                    $db_select = "select * from $db_find where token = $token and 1st = $db_1st and 2nd = '$db_2nd ORDER BY time ASC'";
                            }
                            else{
                                $db_select = "select * from $db_find where token = $token and 1st = $db_1st and 2nd = '$db_2nd' and 3rd = '$db_3rd ORDER BY time ASC'";
                            }

                            $result = mysqli_query($connect, $db_select);

                            $count = mysqli_num_fields($result);

                            if($countRow=mysqli_num_rows($result) == 0){
                                echo "<script>alert('찾으시는 값이 존재하지 않습니다.')</script>";
                            }

                            while( $rows = mysqli_fetch_row($result))

                            {
                                echo "<tr>";

                                //날짜 출력
                                echo "<td class = 'date_class' align='center'>" . $rows[4] . "</td>";
                                //if($rows[4]){}
                                if($rows[1] == 1){
                                    echo "<td align='center'> 지출 </td>";
                                }
                                elseif ($rows[1] == 2){
                                    echo "<td align='center'> 수입 </td>";
                                }

                                echo "<td class = 'div_class' align='center'>" . $rows[2] . "</td>";
                                echo "<td class = 'div_class' align='center'>" . $rows[3] . "</td>";
                                echo "<td class = 'money_class' align='right'>" . number_format($rows[5]) ."원</td>";
                                echo "<td class = 'memo_class' align='center'>" . $rows[6] . "</td>";
                                echo "<form action=../php/DeleteTable-classification.php method='post' id='tempform'>";
                                echo "<td align='center'><textarea name='number' hidden>".$rows[7]."</textarea>
                                <textarea name='month' hidden>".$rows[4]."</textarea>
                                <input type='submit' class= Delete_item value='삭제'></td>";
                                echo"</tr>";
                                echo "</form>";
                            }
                            ?>

            </table>
        </div>
    </div>
    <!--출력-->
</div>

</body>
</html>