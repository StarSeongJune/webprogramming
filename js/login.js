function login() {
    const form = document.login_form;
    const chkID = checkValidID(form);
    const chkPw = checkValidPassword(form);

    if (chkID) {
        document.getElementById('alert_username').innerText = "";
        form.id.style.border = '2px solid';
        form.id.style.borderColor = '#00D000';
    } else {
        form.id.style.border = '2px solid';
        form.id.style.borderColor = '#FF0000';
        document.getElementById('alert_username').style.color = '#FF0000';
    }

    if (chkPw) {
        document.getElementById('alert_password').innerText = "";
        form.password.style.border = '2px solid';
        form.password.style.borderColor = '#00D000';
    } else {
        form.password.style.border = '2px solid';
        form.password.style.borderColor = '#FF0000';
        document.getElementById('alert_password').style.color = '#FF0000';
    }

    if (chkID && chkPw) {
        
        console.log('로그인 성공;');
        form.submit();
    }
	else{
		console.log('fail. form.submit();');
	}
}




function checkValidID(form) {
    if (form.id.value == "") {
        document.getElementById('alert_username').innerText = "ID를 입력해주세요";
        //form.username.focus();
        return false;
    }

    return true;
}

function checkValidPassword(form) {
    if (form.password.value == "") {
        document.getElementById('alert_password').innerText = "비밀번호를 입력해주세요";
        //form.password.focus();
        return false;
    }

    const pw = form.password.value;
    // String.prototype.search()
	//검색된 문자열 중에 첫 번째로 매치되는 것의 인덱스를 반환한다. 찾지 못하면 -1 을 반환한다.
    // 숫자
    const num = pw.search(/[0-9]/g);
    // 알바벳
    const eng = pw.search(/[a-z]/ig);
    // 특수문자
    const spe = pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

    if (pw.length < 6) {
        // 최소 6문자.
        document.getElementById('alert_password').innerText = "잘못된 형식의 비밀번호입니다.";
        return false;
    } else if (pw.search(/\s/) != -1) {
        // 공백 제거.
        document.getElementById('alert_password').innerText = "잘못된 형식의 비밀번호입니다.";
        return false;
    } else if (num < 0 && eng < 0 && spe < 0) {
        // 한글과 같은 문자열 입력 방지.
        document.getElementById('alert_password').innerText = "잘못된 형식의 비밀번호입니다.";
        return false;
    }

    return true;
}