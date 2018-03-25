function rename() {
    var a = document.getElementsByClassName('new_name'),
        b = document.getElementsByClassName('rename');
    var now = document.activeElement;
        if( now.tagName != 'A' ) {
            for(var i=0; i<a.length; i++) {
                if( a[i].style.display != "none" ) {
                    now = b[i];
                    break;
                }
            }
        }
        var next = now.nextSibling;
    if( next.style.display != "none" ) {
        console.log(next);
        console.log(next.value);
        if(next.value == "") {
            next.style.display = "none";
        } else {
            document.location = "rename.php?new="+next.value+"&file="+now.previousSibling.previousSibling.previousSibling.innerHTML;
        }
    } else {
        for(var i=0; i<a.length; i++) {
            a[i].style.display = "none";
            b[i].href = "#";
        }
        next.style.display = "inline-block";
    }
}