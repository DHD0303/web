<?php
    session_start();
    $temp = explode(".", $_FILES["file"]["name"]);
    if ($_FILES["file"]["error"] > 0)
	{
		echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    } else {       
		if (file_exists($_SESSION['path']."/".$_FILES["file"]["name"])) {
			echo $_FILES["file"]["name"] . " 文件已经存在。 ";
		} else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $_SESSION['path']."/". $_FILES["file"]["name"]);
            echo "<script language='javascript'>document.location = 'index.php'</script>";
		}
	}
?>