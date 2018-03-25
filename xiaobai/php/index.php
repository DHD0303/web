<?php
    session_start();
    if( !isset($_SESSION['root'])){
        echo "<script language='javascript'>document.location = '../index.html'</script>";
    }
    if( isset($_GET['chdir']) ) {
        chdir( $_SESSION['path'] );
        chdir( $_GET['chdir'] );
        $_SESSION['path'] = getcwd();
        echo "<script language='javascript'>document.location = 'index.php'</script>";
    }

    $all = dir($_SESSION['path']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">文件名：</label>
        <input type="file" name="file" id="file">
        <input type="submit" name="submit" value="提交">
    </form>

    <a href="#" onClick="new_file();" target="_self" id="new_file">新建文件夹</a><input type="text" style="display: none" id="file_name" placeholder="请输入文件夹名" onblur="new_name();"/><br>
    <br>
    <form action="search.php" method="post" onsubmit="return search()">
        <input type="text" name="keyword" id="keyword"/>
        <input type="submit" value="搜索"/>
    </form>
    <a href="paste.php" target="_self">粘贴</a>
    <!--input type="submit" id="classify_view" value="分类"/-->
    <br>
    <?php
//        echo $_SESSION['copy']."<br>";
        $down = "download.php?file=/";
        $delete = "delete.php?file=/";
        if( $_SESSION['path'] != $_SESSION['root']) {
            echo "<a href=index.php?chdir=.. target=\"_self\">..</a>".
                "<a href=index.php?chdir=.. target=\"_self\" style='width: 200px;'>返回上级目录</a><br>";
        }
        while (($file = $all->read()) !== false){
            if($file == "." || $file == "..") continue;
            if( !is_dir($_SESSION['path']."/".$file) ) {
                echo "<a href=".$down.$file." target=\"_blank\" class='name'>".$file."</a>".
                    "<a href=".$down.$file." target=\"_blank\" class=\"download\">下载</a>".
                    "<a href=".$delete.$file." class=\"delete\">删除</a>".
                    "<a href=\"#\" onClick=\"rename();\" target=\"_self\" class=\"rename\">重命名</a><input type=\"text\" style=\"display: none\" class=\"new_name\" placeholder=\"请输入文件名\" onblur=\"rename();\"/>";
                echo "<a href=\"#\" onclick='copy(this);'><span>$file</span>复制</a>".
                    "<a href=\"#\" onclick='cut(this);'><span>$file</span>剪切</a>";
             } else {
                echo "<a href=index.php?chdir=".$file." target=\"_self\" class='name'>".$file."</a>".
                    "<a href=index.php?chdir=".$file." target=\"_self\" class=\"download\">打开</a>".
                    "<a href=".$delete.$file." class=\"delete\">删除</a>".
                    "<a href=\"#\" onClick=\"rename();\" target=\"_self\" class=\"rename\">重命名</a><input type=\"text\" style=\"display: none\" class=\"new_name\" placeholder=\"请输入文件名\" onblur=\"rename();\"/>";
                echo "<a href=\"#\" onclick='copy(this);'><span>$file</span>复制</a>".
                    "<a href=\"#\" onclick='cut(this);'><span>$file</span>剪切</a>";
            }
            echo "<br>";
        }
    ?>
</body>
    <script type="text/javascript" src="../js/rename.js"></script>
    <script type="text/javascript" src="../js/new_file.js"></script>
    <script type="text/javascript" src="../js/search.js"></script>
    <script type="text/javascript" src="../js/copy_cut.js"></script>
</html>