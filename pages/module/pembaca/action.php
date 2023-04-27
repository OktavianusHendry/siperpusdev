<?php

    include_once("../../function/koneksi.php");
    include_once("../../function/helper.php");  

    $no_pembaca = $_POST['no_pembaca'];
    $nama = $_POST['nama'];
    $kedudukan = $_POST['kedudukan'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $button = $_POST['button'];

    if($button == "Add"){
        mysqli_query($koneksi, "INSERT INTO pembaca (no_pembaca, nama, kedudukan, no_hp, email) 
                                VALUES ('$no_pembaca', '$nama', '$kedudukan', '$no_hp', '$email')");
    }else if($button == "Update"){
        $no_pembaca = $_GET['no_pembaca'];

        mysqli_query($koneksi, "UPDATE pembaca SET no_pembaca='$no_pembaca', nama='$nama', kedudukan='$kedudukan', no_hp='$no_hp', email='$email' 
                                WHERE no_pembaca='$no_pembaca'");
    }else if($button == "Delete"){
        $no_pembaca = $_GET['no_pembaca'];

        mysqli_query($koneksi, "DELETE FROM pembaca WHERE no_pembaca='$no_pembaca'");
    }

 
    header("location:".BASE_URL."index.php?page=my_perpus&module=pembaca&action=list");
?>