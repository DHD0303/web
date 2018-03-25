<?php
    session_start();
    $username=$_POST['username'];
    $password=$_POST['password'];
    if( !preg_match("/^[\S]{6,16}/",$username) ) {
        die('非法访问1！');
    }
    if ( !preg_match("/^[\S]{6,16}/",$password) ) {
        die('非法访问2！');//匹配失败
    }

    $conn = mysqli_connect('localhost', 'root', '1246009411', "pan");
    if( !$conn ) {
        die('数据库连接失败！');
    }
    $sql = "SELECT password FROM account WHERE username = '$username'";
    $retval = mysqli_query( $conn, $sql );
    if( !$retval ) {
        die('无法读取数据！');
    }
    if( mysqli_fetch_row( $retval ) != 0 ) {
        die('用户已存在！');
    }
    $sql = "INSERT INTO account
            (username, password)
            VALUES
            ('$username','$password')";
    $retval = mysqli_query($conn, $sql);
    if( !$retval ) {
        die('账户创建失败！');
    }

    $_SESSION['username'] = $username;
    mkdir ('../upload/'.$username,0777,true);
    chdir('../upload/'.$_SESSION['username']);
    $_SESSION['path'] = $_SESSION['root'] = getcwd();
    echo "<script language='javascript'>document.location = 'index.php'</script>";
?>