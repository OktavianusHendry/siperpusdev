<?php
    $server = "siperpus";
    $username = "root";
    $password = "";
    $database = "siperpus1";

    $koneksi = mysqli_connect($server, $username, $password, $database) or die("Koneksi ke dalam database gagal");
?>