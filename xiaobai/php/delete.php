<?php
    session_start();
    $name = $_GET['file'];
    $path = $_SESSION['path'].$name;
    if ( is_dir($path) ){
        delete_dir($path);
        echo "<script language='javascript'>document.location = 'index.php'</script>";
    } else {
        unlink($path);
        echo "<script language='javascript'>document.location = 'index.php'</script>";
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