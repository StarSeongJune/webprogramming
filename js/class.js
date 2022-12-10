document.addEventListener('DOMContentLoaded', ()=>{
    const monArr = new Array ('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
    const first = document.querySelector('#first')
    const second = document.querySelector('#second')
    const third = document.querySelector('#third')
    const month = document.querySelector("#month")
    const year = document.querySelector("#year")
    const sumitbutton = document.querySelector('#sumitbutton')
    let testArray = [false, false] // 값 입력 됐는지 확인

    let str = "<option hidden>월</option>"
    for(let Counter=0;Counter<12;Counter++){
        str += "<option>" + monArr[Counter]+ "</option>"
    }
    month.innerHTML = str

    year.addEventListener('change',()=>{
        testArray[0] = true
        year.style.borderBottomColor = "#e5e8eb"
    })
    month.addEventListener('change', ()=>{
        testArray[1] = true
        month.style.borderBottomColor = "#e5e8eb"
    })

    first.addEventListener('change', (event)=>{
        const options = event.currentTarget.options
        const index = options.selectedIndex
        const array = options[index].textContent
        const secondC = document.getElementById('second')

        if(array === '지출'){
            secondC.innerHTML = "<option hidden>지출 카테고리</option>\n" +
                "    <option value=\"식비\">식비</option>\n" +
                "    <option value=\"쇼핑\">쇼핑</option>\n" +
                "    <option value=\"여가\">여가</option>\n" +
                "    <option value=\"교통\">교통</option>\n" +
                "    <option value=\"의료\">의료</option>\n" +
                "    <option value=\"정기\">정기</option>\n" +
                "    <option value=\"기타\">기타</option>"
        }
        else if(array==='수입'){
            secondC.innerHTML = "<option hidden>수입 카테고리</option>\n" +
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
                thirdC.innerHTML = "<option hidden>식비 상세 카테고리</option>\n" +
                    "    <option value=\"식사\">식사</option>\n" +
                    "    <option value=\"간식\">간식</option>\n" +
                    "    <option value=\"외식\">외식</option>\n" +
                    "    <option value=\"재료비\">재료비</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;
            case '쇼핑':
                thirdC.innerHTML = "<option hidden>쇼핑 상세 카테고리</option>\n" +
                    "    <option value=\"의류\">의류</option>\n" +
                    "    <option value=\"미용\">미용</option>\n" +
                    "    <option value=\"잡화\">잡화</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;
            case '여가':
                thirdC.innerHTML = "<option hidden>여가 상세 카테고리</option>\n" +
                    "    <option value=\"게임\">게임</option>\n" +
                    "    <option value=\"서적\">서적</option>\n" +
                    "    <option value=\"영화\">영화</option>\n" +
                    "    <option value=\"여행\">여행</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;
            case '교통':
                thirdC.innerHTML = "<option hidden>교통 상세 카테고리</option>\n" +
                    "    <option value=\"택시\">택시</option>\n" +
                    "    <option value=\"대중교통\">대중교통</option>\n" +
                    "    <option value=\"유류비\">유류비</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;
            case '의료':
                thirdC.innerHTML = "<option hidden>의료 상세 카테고리</option>\n" +
                    "    <option value=\"병원\">병원</option>\n" +
                    "    <option value=\"약제\">약제</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;
            case '정기':
                thirdC.innerHTML = "<option hidden>정기결제 상세 카테고리</option>\n" +
                    "    <option value=\"OTT\">OTT</option>\n" +
                    "    <option value=\"통신\">통신</option>\n" +
                    "    <option value=\"보험\">보험</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;
            case '기타':
                thirdC.innerHTML = "<option hidden>기타 상세 카테고리</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;
            case '고정':
                thirdC.innerHTML = "<option hidden>고정 상세 카테고리</option>\n" +
                    "    <option value=\"용돈\">용돈</option>\n" +
                    "    <option value=\"급여\">급여</option>"
                break;
            case '특별':
                thirdC.innerHTML = "<option hidden>특별 상세 카테고리</option>\n" +
                    "    <option value=\"이자\">이자</option>\n" +
                    "    <option value=\"기타\">기타</option>"
                break;

        }

    })
    const menu_item = document.querySelector(".menu_item")
    menu_item.addEventListener('click', (event)=>{
        var test = confirm("정말로 탈퇴하시겠습니까? 이 작업은 되돌릴 수 없습니다.")
        if (test === false){
            event.preventDefault()
        }
    })
    try{
        const Delete_item = document.querySelector(".Delete_item")
        Delete_item.addEventListener('click', (event)=>{
            const tempform = document.querySelector('#tempform')
            tempform.innerHTML = "<?php <input type='text' name='number' hidden>$dataArr[$i][8]?>"
        })
    }
    catch {
        console.log("Delete_item Element's not found.")
    }
    sumitbutton.addEventListener('click', (event)=>{
        console.log(testArray)
        if(testArray.includes(false)) {
            event.preventDefault()
            alert('누락된 값을 입력해주세요.')
            let arraynumber = []
            let temp = testArray.indexOf(false)
            while (temp!= -1){
                arraynumber.push(temp)
                temp = testArray.indexOf(false, temp+1)
            } // false 성분을 맨 앞부터 끝까지 배열 인덱스 상 어디에 있는지 확인
            console.log(arraynumber)
            for(let i=0; i<arraynumber.length;i++ ){
                switch (arraynumber[i]){
                    case 0:
                        year.style.borderBottomColor = "red"
                        break;
                    case 1:
                        month.style.borderBottomColor = "red"
                        break;
                    default:
                        break;
                }
            }
        }
    })
})
