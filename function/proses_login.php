<?php

    include_once("koneksi.php");
    include_once("helper.php");

    $no_pembaca = $_POST['no_pembaca'];//no_pembaca yg oren itu ambil dri form
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM pembaca WHERE no_pembaca='$no_pembaca' AND password='$password'");//buat cocokin data login
                                                            //no_pembaca diatas yg oren (query) dari table
    
    if(mysqli_num_rows($query) == 0){
        header("location:". BASE_URL . "index.php?page=login&notif=true");
    }else{
        
        $row = mysqli_fetch_assoc($query);

        session_start();

        $_SESSION['no_pembaca'] = $row['no_pembaca'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['kedudukan'] = $row['kedudukan'];

        header("location:".BASE_URL."index.php");

    }
?>