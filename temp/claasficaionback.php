<!DOCTYPE html>
<html lang="ko"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>참조 - 가계부 </title>
    <link rel="stylesheet" href="../css/classification.css">
    <script src="../js/main.js"></script>
    <link rel="stylesheet" href="../css/font.css">
    <link rel="logo icon" href="../img/logo_icon.png">
</head>
<body>
<div class="main_container">
    <ul id="first_ul">
        <li class="first_li" >
            <div >
                <fieldset class="choice_container" id="sidebar">
                    <div class="form_container">
                        <!--메인 로고-->
                        <div class="form_title_div">
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
                        echo  '<div class="form_item_name">';
                        echo $rows[0];
                        echo '님 환영합니다 </div>';
                        ?>
                        <div>
                            <form action="../index.html">
                                <button class="form_submit_button">로그아웃</button>
                            </form>
                        </div>
                        <div>
                            <ul>
                                <li><a href="main.php" class="movepage">마이페이지</a></li>
                                <li><a href="classification_Page.php" class="movepage">분류</a></li>
                            </ul>
                        </div>
                        <form action="../php/secession.php">
                            <button class="menu_item">회원탈퇴</button>
                        </form>
                    </div>
                </fieldset>
            </div>
        </li>
        <li class="first_li" id="first_li2">
            <ul id="second_ul">
                <li>
                    <div class="input_container">
                        <form name="login_form" action="classification.php" method="POST">
                            <select class="selectbox_css" id="year" name="year">
                                <option hidden>연도</option>
                                <option>2022</option>
                            </select>
                            <select class="selectbox_css" id="month" name="month">
                            </select>
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
                            <button id="sumitbutton" ><B>찾기</B></button>
                        </form>
                    </div>
                </li>
                <li id="tb_div">
                    <div >
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
                </li>

            </ul>
        </li>
    </ul>

</body>
</html>