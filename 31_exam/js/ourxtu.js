var oBody = document.getElementsByTagName('body'),
    oText = document.getElementById('text'),
    oSgm = document.getElementsByClassName('sgm'),
    oHmt = document.getElementsByClassName('hmt');

function next() {
    document.getElementsByClassName('book')[0].style.display = "none";
    document.getElementsByClassName('img1')[0].style.display = "none";
    document.getElementsByClassName('img2')[0].style.display = "none";
    document.getElementsByClassName('img3')[0].style.display = "none";
    document.getElementsByClassName('jingyu')[0].style.display = "none";
    document.getElementsByClassName('shuimu')[0].style.display = "none";
    document.getElementsByClassName('star')[0].style.display = "none";
    console.log(document.getElementsByClassName('book')[0]);
    if ( oBody[0].style.backgroundImage.indexOf("hmt") == -1 && oBody[0].style.backgroundImage.indexOf("sgm") == -1 ){
        oBody[0].style.backgroundImage = "url('../picture/hmt.png')";
        oHmt[0].style.display = 'block';
        oSgm[0].style.display = 'none';
    } else {
        oBody[0].style.backgroundImage = "url('../picture/sgm.png')";
        oHmt[0].style.display = 'none';
        oSgm[0].style.display = 'block';
    }
}
