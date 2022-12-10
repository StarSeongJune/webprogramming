<!DOCTYPE html>
<html lang="ko"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>참조 - 가계부 </title>
    <link rel="stylesheet" href="../css/classification.css">
    <script src="../js/class.js"></script>
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
                <button id="sumitbutton" class="inputbox"><B>찾기</B></button>
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
            </table>
        </div>
    </div>
    <!--출력-->

</div>
</body>
</html>