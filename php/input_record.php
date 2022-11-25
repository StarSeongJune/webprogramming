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

<?php
$Type_1st = $_POST['1st']; //지출 or 수입
$Type_2nd = $_POST['2nd']; // 수입, 지출 카테고리
$Type_3rd = $_POST['3rd']; //상세 카테고리
$Type_Time = $_POST['time']; //시간 입력
$Type_money = $_POST['money']; //금액 입력
$Type_memo = $_POST['memo']; //메모 입력
?>