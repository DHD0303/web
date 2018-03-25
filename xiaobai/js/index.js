var oLogin = document.getElementById('signup'),
    oAuto = document.getElementsByClassName('auto-sign'),
    oUsername = document.getElementById('username'),
    oForget = document.getElementsByClassName('forget'),
    oAccp = document.getElementById('accp'),
    ologin = document.getElementsByClassName('login'),
    oregister = document.getElementsByClassName('register'),
    oPassword = document.getElementById("password");

function register() {
    oAuto[0].style.display = 'none';
    oForget[0].style.display = 'none';
    oLogin.action = 'php/register.php';
    ologin[1].style.border = 'none';
    oregister[1].style.borderBottom = '2px solid rgb(89, 163, 117)';
    oAccp.value = '注册';
}

function login() {
    oAuto[0].style.display = 'block';
    oForget[0].style.display = 'inline';
    oLogin.action = 'php/login.php';
    oregister[1].style.border = 'none';
    ologin[1].style.borderBottom = '2px solid rgb(89, 163, 117)';
    oAccp.value = '登录';
}

function account() {
    var username = /^[\S]{6,16}/;
    if (username.test(oUsername.value)) {
        return true;
    } else {
        alert("账号非法！请使用6-16位非空字符");
        return false;
    }
}

function mmyz() {
    var password = /^[\w]{6,16}/;
    if (password.test(oPassword.value)) {
        return true;
    } else {
        alert("请输入6-16位密码，区分大小写，不能使用空格！");
        return false;
    }
}

function accept() {
    return account() && mmyz();
}
