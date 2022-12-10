document.addEventListener('DOMContentLoaded', (event)=>{
    const name = document.querySelector('#이름')
    const id = document.querySelector('#아이디')
    const pw = document.querySelector('#비밀번호')
    const pwcheck = document.querySelector('#비밀번호체크')
    const pn0 = document.querySelector('#pn0')
    const pn1 = document.querySelector('#pn1')
    const pn2 = document.querySelector('#pn2')
    const sumit = document.querySelector('#submit_button')
    let flag = [false, false, false, false]

    name.addEventListener('change', ()=>{
        const nametitle = document.querySelector('#alert_name')
        if (name.value.length <3 || name.value.length >5){
            nametitle.textContent = "* 이름을 확인하세요."
            tored(name, event)
            flag[0] = false
        }else{
            todefault(name, nametitle)
            flag[0] = true
        }
    })
    id.addEventListener('change', ()=>{
        const idtilte = document.querySelector('#alert_id')
        if(id.value.length <5 || id.value.length>15){
            idtilte.textContent = "* 아이디를 5~15자 이내로 입력해주세요."
            tored(id, event)
            flag[1] = false
        }else{
            todefault(id, idtilte)
            flag[1] = true
        }
    })
    pw.addEventListener('change',()=>{
        const passwordtitle = document.querySelector('#alert_password')
        if(pw.value.length<6 || pw.value.length>15) {
            passwordtitle.textContent = "* 비밀번호를 6~15자 이내로 입력해주세요."
            tored(pw, event)
            flag[2] = false
        }else{
            todefault(pw, passwordtitle)
            flag[2] = true
        }
    })
    pwcheck.addEventListener('change', ()=>{
        const passwordchecktitle = document.querySelector('#alert_pwcheck')
        if(pwcheck.value !== pw.value){
            passwordchecktitle.textContent = "* 입력한 비밀번호가 다릅니다."
            tored(pwcheck, event, flag)
            flag[3] = false
        }
        else{
            passwordchecktitle.textContent = ""
            pwcheck.style.borderColor = 'black'
            flag[3] = true
        }
    })
    sumit.addEventListener('click', (event)=>{
        if(flag.includes(false)){
            event.preventDefault()
            alert(`입력된 정보를 확인해주세요.`)
        }
    })
})
function tored(querryname, event){
    querryname.style.borderColor = 'red'
}
function todefault(querryname, divbox){
    querryname.style.borderColor = 'black'
    divbox.textContent=""
}
