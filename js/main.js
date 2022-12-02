document.addEventListener('DOMContentLoaded', ()=>{
    const first = document.querySelector('#first')
    const second = document.querySelector('#second')
    const third = document.querySelector('#third')

    first.addEventListener('change', (event)=>{
        const options = event.currentTarget.options
        const index = options.selectedIndex
        const array = options[index].textContent
        const secondC = document.getElementById('second')

        if(array === '지출'){
            secondC.innerHTML = "<option class=\"category\">지출 카테고리</option>\n" +
                "    <option value=\"식비\">식비</option>\n" +
                "    <option value=\"쇼핑\">쇼핑</option>\n" +
                "    <option value=\"여가\">여가</option>\n" +
                "    <option value=\"교통\">교통</option>\n" +
                "    <option value=\"의료\">의료</option>\n" +
                "    <option value=\"정기\">정기</option>\n" +
                "    <option value=\"기타\">기타</option>"
        }
        else if(array==='수입'){
            secondC.innerHTML = "<option class=\"category\">수입 카테고리</option>\n" +
                "    <option value=\"고정\">고정</option>\n" +
                "    <option value=\"특별\">특별</option>\n" +
                "    <option value=\"기타\">기타</option>"
        }
    })
    second.addEventListener('change', (event)=>{
        const options = event.currentTarget.options
        const index = options.selectedIndex
        const array = options[index].textContent
        const thirdC = document.getElementById('third')

        switch (array){
            case '식비':
                thirdC.innerHTML = "<option class=\"category\">식비 상세 카테고리</option>\n" +
                    "    <option value=\"식사\">식사</option>\n" +
                    "    <option value=\"간식\">간식</option>\n" +
                    "    <option value=\"외식\">외식</option>\n" +
                    "    <option value=\"재료비\">재료비</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;
            case '쇼핑':
                thirdC.innerHTML = "<option class=\"category\">쇼핑 상세 카테고리</option>\n" +
                    "    <option value=\"의류\">의류</option>\n" +
                    "    <option value=\"미용\">미용</option>\n" +
                    "    <option value=\"잡화\">잡화</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;
            case '여가':
                thirdC.innerHTML = "<option class=\"category\">여가 상세 카테고리</option>\n" +
                    "    <option value=\"게임\">게임</option>\n" +
                    "    <option value=\"서적\">서적</option>\n" +
                    "    <option value=\"영화\">영화</option>\n" +
                    "    <option value=\"여행\">여행</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;
            case '교통':
                thirdC.innerHTML = "<option class=\"category\">교통 상세 카테고리</option>\n" +
                    "    <option value=\"택시\">택시</option>\n" +
                    "    <option value=\"대중교통\">대중교통</option>\n" +
                    "    <option value=\"유류비\">유류비</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;
            case '의료':
                thirdC.innerHTML = "<option class=\"category\">의료 상세 카테고리</option>\n" +
                    "    <option value=\"병원\">병원</option>\n" +
                    "    <option value=\"약제\">약제</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;
            case '정기':
                thirdC.innerHTML = "<option class=\"category\">정기결제 상세 카테고리</option>\n" +
                    "    <option value=\"OTT\">OTT</option>\n" +
                    "    <option value=\"통신\">통신</option>\n" +
                    "    <option value=\"보험\">보험</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;
            case '기타':
                thirdC.innerHTML = "<option class=\"category\">기타 상세 카테고리</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;
            case '고정':
                thirdC.innerHTML = "<option class=\"category\">고정 상세 카테고리</option>\n" +
                    "    <option value=\"용돈\">용돈</option>\n" +
                    "    <option value=\"급여\">급여</option>"
                break;
            case '특별':
                thirdC.innerHTML = "<option class=\"category\">특별 상세 카테고리</option>\n" +
                    "    <option value=\"이자\">이자</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;

        }

    })


    const logout = document.querySelector(".form_submit_button")
    logout.addEventListener('click', (event)=>{
        document.cookie = `TOKEN=; expires=Thu, 01 Jan 1999 00:00:10 GMT;`;
        document.location.href='../index.html'; 
    })

    const logexit = document.querySelector(".menu_item")
    logexit.addEventListener('click', (event)=>{
        document.location.href='../php/logout.php'; 
    })
})