document.addEventListener('DOMContentLoaded', ()=>{
    const monArr = new Array ('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
    const dayArr = new Array ('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
    const first = document.querySelector('#first')
    const second = document.querySelector('#second')
    const third = document.querySelector('#third')
    const month = document.querySelector("#month")
    const day = document.querySelector("#day")
    const sumitbutton = document.querySelector('#sumitbutton')
    let testArray = [false, false, true, false, false, false, false] // 값 입력 됐는지 확인
    const money = document.querySelector('#money')

    let str = "<option hidden>월</option>"
    for(let Counter=0;Counter<12;Counter++){
        str += "<option>" + monArr[Counter]+ "</option>"
    }
    month.innerHTML = str


    first.addEventListener('change', (event)=>{
        testArray[3] = true
        testArray[4] = false
        first.style.borderBottomColor = "#e5e8eb"
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
        testArray[4] = true
        testArray[5] = false
        second.style.borderBottomColor = "#e5e8eb"
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

    var str2 = ""
    month.addEventListener("change", (event)=>{
        testArray[1] = true
        month.style.borderBottomColor = "#e5e8eb"
        const options = event.currentTarget.options
        const index = options.selectedIndex
        const array = options[index].textContent
        switch (array){
            case '01':
            case '03':
            case '05':
            case '07':
            case '08':
            case '10':
            case '12':
                for(let count=0; count<31;count++){
                    str2 += "<option>" + dayArr[count] +"</option>>"
                }
                day.innerHTML = str2
                break;
            case '04':
            case '06':
            case '09':
            case '11':
                for(let count=0; count<30;count++){
                    str2 += "<option>" + dayArr[count] +"</option>>"
                }
                day.innerHTML = str2
                break;
            case '02':
                for(let count=0; count<28;count++){
                    str2 += "<option>" + dayArr[count] +"</option>>"
                }
                day.innerHTML = str2
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
        if(testArray.includes(false)){
            event.preventDefault()
            alert('누락된 값을 입력해주세요.')
            let arraynumber = []
            let temp = testArray.indexOf(false)
            while (temp!= -1){
                arraynumber.push(temp)
                temp = testArray.indexOf(false, temp+1)
            } // false 성분을 맨 앞부터 끝까지 배열 인덱스 상 어디에 있는지 확인
            for(let i=0; i<arraynumber.length;i++ ){
                switch (arraynumber[i]){
                    case 0:
                        year.style.borderBottomColor = "red"
                        break;
                    case 1:
                        month.style.borderBottomColor = "red"
                        break;
                    case 2:
                        day.style.borderBottomColor = "red"
                        break;
                    case 3:
                        first.style.borderBottomColor = "red"
                        break;
                    case 4:
                        second.style.borderBottomColor = "red"
                        break;
                    case 5:
                        third.style.borderBottomColor = "red"
                        break;
                    case 6:
                        money.style.borderBottomColor = "red"
                        break;
                    default:
                        break;
                }
            }
        }
    })
    const year = document.querySelector('#year')
    year.addEventListener('change',()=>{
        testArray[0] = true
        year.style.borderBottomColor = "#e5e8eb"
    })
    third.addEventListener('change', ()=>{
        testArray[5] = true
        third.style.borderBottomColor = "#e5e8eb"
    })
    money.addEventListener('change', ()=>{
        testArray[6] = true
        money.style.borderBottomColor = "#e5e8eb"
        if(money.value === ""){
            testArray[6] = false
        }
    })
})
