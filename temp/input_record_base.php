<center>
<b> ▼ 회원 가입 화면 ▼ </b><hr>
</center>

<form method="post" action="ex02.php">

<center>
<table border = 0 bordercolor="blue" width=1000 cellspacing=1 cellpadding=5>
	<tr>
		<td> 아이디 : <input type="text" size=20 name="Id"></td>
		<td> 비밀번호 (최대 20자) : <input type="password" size=20 name="Pass_word"></td>
	</tr>

	<tr>
		<td>성명 : <input type="text" size=10 name="User_Name"></td>
		<td>성별 :
		<input type = "radio", name = "Sex", value = "남자" checked> 남
		<input type = "radio", name = "Sex", value = "여자" > 여 </td>
	</tr>	

	<tr> <td> 사용자 이메일 : <input type="text" size=50 name="Email"> </td> </tr>

	<tr>
		<td>
		핸드폰 번호 :
		<select type = "text", name = "p1">
			<option value=" "> 선택 </option>
			<option value="010"> 010 </option>
			<option value="011"> 011 </option>
			<option value="016"> 016 </option>
			<option value="017"> 017 </option>
			<option value="019"> 019 </option>
		</select>	
		- <input type = "text", size=4, name = "p2" maxlength=4>
		- <input type = "text", size=4, name = "p3" maxlength=4>
		</td>
	</tr>

	<tr>
		<td>
		가입목적 :
		<select type = text, name = "purpose">
			<option value=" "> 선택 </option>
			<option value="생활비 절약"> 생활비 절약 </option>
			<option value="저축"> 저축 </option>
			<option value="자산 관리"> 자산 관리 </option>
		</select>	
	</td>
	</tr>

	<tr>
		<td>
		<input type="submit" value="회원 등록">
		<input type="reset" value="다시 작성">
	</td>
	</tr>
</center>
</form>

<?php
$Type_1st = $_POST['1st']; //지출 or 수입
$Type_2nd = $_POST['2nd']; // 수입, 지출 카테고리
$Type_3rd = $_POST['3rd']; //상세 카테고리
$Type_Time = $_POST['time']; //시간 입력
$Type_money = $_POST['money']; //금액 입력
$Type_memo = $_POST['memo']; //메모 입력
?>