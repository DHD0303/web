var a = document.getElementById('new_file'),
    b = document.getElementById('file_name');

function new_file() {
    a.style.display = 'none';
    b.style.display = 'inline-block';
}

function new_name() {
    if( b.value == "" ) {
        b.style.display = 'none';
        a.style.display = 'inline-block';
    } else {
        document.location = 'new_file.php?name='+b.value;
    }
}