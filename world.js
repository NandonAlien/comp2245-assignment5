window.addEventListener('DOMContentLoaded',(event)=>{

   let  btn = document.querySelector("#lookup")
    let unit =document.querySelector("#country")
    let A ="http://localhost/comp2245-assignment5/world.php?country="
    btn.onclick=function(){Retriv()}
    const httpRequest = new XMLHttpRequest();
    function Retriv(){

        httpRequest.onreadystatechange = DoIt();
        httpRequest.open('GET', A+unit.value);
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