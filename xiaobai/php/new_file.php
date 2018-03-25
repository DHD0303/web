<?php
    session_start();
    $file = $_SESSION['path']."/".$_GET['name'];
    if( is_dir($file) ) {
        echo $_SESSION['path'];
        echo "当前目录下，目录".$_GET['name']."存在";
    } else {
        mkdir ($file,0777,true);
        echo "<script language='javascript'>document.location = 'index.php'</script>";
    }
?>