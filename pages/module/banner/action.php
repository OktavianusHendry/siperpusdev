<?php

    include_once("../../../function/koneksi.php");
    include_once("../../../function/helper.php");  

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tampilkan = $_POST['tampilkan'];
    $images = $_POST['images'];
    $button = $_POST['button'];

    if($button == "Add"){
        mysqli_query($koneksi, "INSERT INTO banner (nama, images, tampilkan) 
                                VALUES ('$nama', '$images', '$tampilkan')");
    }else if($button == "Update"){
        $id = $_GET['id'];

        mysqli_query($koneksi, "UPDATE banner SET nama='$nama', images='$images', tampilkan='$tampilkan' 
                                WHERE id='$id'");
    }else if($button == "Delete"){
        $id = $_GET['id'];

        mysqli_query($koneksi, "DELETE FROM banner WHERE id='$id'");
    }

    header("location:".BASE_URL."pages/myperpus.php?module=banner&action=list");
?>