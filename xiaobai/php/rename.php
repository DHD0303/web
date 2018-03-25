<?php
    session_start();
    $name = $_GET['file'];
    $newname = $_GET['new'];
    $path = $_SESSION['path']."/".$name;
    if ( is_file($_SESSION['path']."/".$newname) ) {
        echo "<script language='javascript'>alert('文件名或文件夹名重复')</script>";
        echo " <script language='javascript'>document.location = 'index.php'</script> ";
    } else {
        rename($path,$_SESSION['path']."/".$newname);
        echo $_SESSION['path']."/".$newname;
        echo "<script language='javascript'>document.location = 'index.php'</script>";
    }
?>