'use strict';
function copy(file) {
    console.log(file.firstChild.innerText);
    post('copy', file.firstChild.innerText);
}

function cut(file) {
    post('cut', file.firstChild.innerText);
}

function post(operat, name) {
    let xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
    } else {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("POST","../php/copy_cut.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(operat+"="+ name);
}