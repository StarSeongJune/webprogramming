document.addEventListener('DOMContentLoaded', ()=>{
const flag = true

if(flag == true){
    console.log(`Server Connection is ${flag}`)
    const serviceerror = document.getElementById('serviceerror')
    serviceerror.style.display = "none"

    const mainbox2 = document.getElementById('mainbox2')
    mainbox2.style.display = 'flex'
}
else{
    console.log(`Server Connection is ${flag}`)
    alert("서비스가 오픈되지 않았습니다")
}
})