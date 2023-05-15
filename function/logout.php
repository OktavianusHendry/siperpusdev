<?php

    include_once("koneksi.php");
    include_once("helper.php");

    session_start();

    unset($_SESSION['no_pembaca']);
    unset($_SESSION['nama']);
    unset($_SESSION['kedudukan']);
    
    header("location:".BASE_URL."index.php?logout=yes");
?>