<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    a {
        text-decoration: none;
        display: inline-block;
        color: black;
        width: 200px;
        margin: 10px 0;
    }
</style>
<body>
    <?php
        session_start();
        $keyword = $_POST['keyword'];
        if ( preg_match("/^[\S\x{4e00}-\x{9fa5}]{1,20}/u",$keyword) ) {
            $_SESSION['path'] = $_SESSION['root'];
            $keyword = "/$keyword/";
            $path = "";
            echo "<a href=\"index.php\" id='back'>返回</a><br>";
            search($path, $keyword);
        }
        function search($path, $keyword) {
            $all = dir($_SESSION['root'].$path);
            while( ($file = $all->read()) != false) {
                if($file == "." || $file == "..") continue;
                if( is_dir($_SESSION['root'].$path."/".$file) ) {
                    search($path."/".$file, $keyword);
                } else {
                    if( preg_match($keyword, $file) ) {
                        echo "<a href=".$path."/".$file." target=\"_blank\">".$file."</a>".
                        "<a href=download.php?file=".$path."/".$file." target=\"_blank\" class=\"download\">下载</a>".
                        "<a href=delete.php?file=".$path."/".$file." class=\"delete\">删除</a><br>";
                    }
                }
            }
            return;
        }
    ?>
</body>
</html>