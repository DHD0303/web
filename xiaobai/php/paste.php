<?php
    session_start();
    if($_SESSION['copy'] !== 0) {
        $arr = explode("/",$_SESSION['copy']);
        $len = sizeof($arr);
        $name = $arr[$len-1];
        if( is_dir($_SESSION['copy']) ) {
            mkdir($_SESSION['path']."/".$name, 0777, true);
            copy_dir($_SESSION['copy'], $_SESSION['path']."/".$name);
        } else {
            copy($_SESSION['copy'], $_SESSION['path']."/".$name);
        }
        echo "<script language='javascript'>document.location = 'index.php'</script>";
    } else if($_SESSION['cut'] !== 0) {
        $arr = explode("/",$_SESSION['cut']);
        $len = sizeof($arr);
        $name = $arr[$len-1];
        if( is_dir($_SESSION['cut']) ) {
            mkdir($_SESSION['path']."/".$name, 0777, true);
            copy_dir($_SESSION['cut'], $_SESSION['path']."/".$name);
            delete_dir($_SESSION['cut']);
        } else {
            copy($_SESSION['cut'], $_SESSION['path']."/".$name);
            unlink($_SESSION['cut']);
        }
        echo "<script language='javascript'>document.location = 'index.php'</script>";
    } else {
        echo "0.0貌似有点问题";
    }
    function copy_dir($path, $newpath) {
        $all = dir($path);
        while( ($file = $all->read()) !== false ) {
            if($file == "." || $file == "..") continue;
            if( is_dir($path."/".$file) ) {
                mkdir($newpath."/".$file, 0777, true);
                copy_dir($path."/".$file, $newpath."/".$file);
            } else {
                copy($path."/".$file, $newpath."/".$file);
            }
        }
        $all->close();
        return;
    }
    function delete_dir($path) {
        $all = dir($path);
        while( ($file = $all->read()) !== false ) {
            if($file == "." || $file == "..") continue;
            if( is_dir($path."/".$file) ) {
                delete_dir($path."/".$file);
            } else {
                unlink($path."/".$file);
            }
        }
        $all->close();

        return rmdir( $path );
    }
?>