window.addEventListener('DOMContentLoaded',(event)=>{

   let  btn = document.querySelector("#lookup");
   let btn2=document.querySelector("#finding");
    let unit =document.querySelector("#country");
    let A ="http://localhost/comp2245-assignment5/world.php?country="
    let B ="&lookup="
    btn.onclick=function(){Retriv()};
    btn2.onclick=function(){Retriv("cities")};
    const httpRequest = new XMLHttpRequest();
    function Retriv(Cit){
            
        httpRequest.onreadystatechange = DoIt();
        httpRequest.open('GET', A+unit.value+B+Cit);
        httpRequest.send();

    }
    function DoIt(){
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
            let response = httpRequest.responseText;
            document.getElementById('result').innerHTML= response;
            } else {
            alert('There was a problem with the request.');
            }
           }
    }
});