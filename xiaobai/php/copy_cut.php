<?php
    session_start();
    if(isset($_POST['copy'])) {
        $_SESSION['copy'] = $_SESSION['path']."/".$_POST['copy'];
        $_SESSION['cut'] = 0;
    } else if(isset($_POST['cut'])) {
        $_SESSION['copy'] = 0;
        $_SESSION['cut'] = $_SESSION['path']."/".$_POST['cut'];
    }
