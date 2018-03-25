<?php
    session_start();
    $name = $_GET['file'];
    $arr = explode("/",$name);
    $path = $_SESSION['path'];
    $len = sizeof($arr);
    for($i=0; $i<$len; $i++) {
        $path = $path."/".$arr[$i];
    }
    $name = $arr[$i-1];
    $file=fopen($path,"r");
    header("Content-Type: application/octet-stream");
    header("Accept-Ranges: bytes");
    header("Accept-Length: ".filesize($path));
    header("Content-Disposition: attachment; filename=".$name);
    echo fread($file,filesize($path));
    fclose($file);
    echo $path;
    echo $name;
?>