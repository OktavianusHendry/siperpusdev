<?php

    session_start();

    unset($_SESSION['no_pembaca']);
    unset($_SESSION['nama']);
    unset($_SESSION['kedudukan']);
    
    header("location: index.php");
?>