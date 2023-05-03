<?php

    include_once("../../../function/koneksi.php");
    include_once("../../../function/helper.php");  

    date_default_timezone_set("Asia/Jakarta");
    $tgl_ditambahkan = date("Y-m-d");
    $kode_buku = $_POST['kode_buku'];
    $inisial_nama_belakang = $_POST['inisial_nama_belakang'];
    $huruf_depan_judul = $_POST['huruf_depan_judul'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $isbn = $_POST['isbn'];
    $jenis_buku = $_POST['jenis_buku'];
    $genre = $_POST['genre'];
    $stok = $_POST['stok'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $gambar_buku = $_POST['gambar_buku'];
    $sinopsis = $_POST['sinopsis'];
    $button = $_POST['button'];

    $penulis2 = $penulis;
    $penulisbukuproses = explode('/', $penulis2); //explode = buat misahin nama nama penulis yg dipisah pake /

    if($button == "Add"){
        mysqli_query($koneksi, "INSERT INTO buku (kode_buku, inisial_nama_belakang, huruf_depan_judul, judul, penerbit, isbn, jenis_buku, genre, stok, tahun_terbit, gambar_buku, sinopsis, tgl_ditambahkan) 
                                VALUES ('$kode_buku', '$inisial_nama_belakang', '$huruf_depan_judul', '$judul', '$penerbit', '$isbn', '$jenis_buku', '$genre', '$stok', '$tahun_terbit', '$gambar_buku', '$sinopsis', '$tgl_ditambahkan')");

        foreach ($penulisbukuproses as $penulisbuku){
        mysqli_query($koneksi, "INSERT INTO penulis_buku (kode_buku, inisial_nama_belakang, huruf_depan_judul, penulis) 
                                VALUES ('$kode_buku', '$inisial_nama_belakang', '$huruf_depan_judul', '$penulisbuku')");
        }

    }else if($button == "Update"){
        $kode_buku = $_GET['kode_buku'];
        $inisial_nama_belakang = $_GET['inisial_nama_belakang'];
        $huruf_depan_judul = $_GET['huruf_depan_judul'];

        mysqli_query($koneksi, "UPDATE buku SET kode_buku='$kode_buku', inisial_nama_belakang='$inisial_nama_belakang', huruf_depan_judul='$huruf_depan_judul', judul='$judul', penerbit='$penerbit', isbn='$isbn', jenis_buku='$jenis_buku', genre='$genre', stok='$stok', tahun_terbit='$tahun_terbit', gambar_buku='$gambar_buku', sinopsis='$sinopsis'
                                WHERE kode_buku='$kode_buku' AND inisial_nama_belakang='$inisial_nama_belakang' AND huruf_depan_judul='$huruf_depan_judul'");
        
        mysqli_query($koneksi, "DELETE FROM penulis_buku WHERE kode_buku='$kode_buku' AND inisial_nama_belakang='$inisial_nama_belakang' AND huruf_depan_judul='$huruf_depan_judul'");//dihapus atribut penulis supaya penulis baru dapat dimasukkan

        foreach ($penulisbukuproses as $penulisbuku){
            mysqli_query($koneksi, "INSERT INTO penulis_buku (kode_buku, inisial_nama_belakang, huruf_depan_judul, penulis) 
                                    VALUES ('$kode_buku', '$inisial_nama_belakang', '$huruf_depan_judul', '$penulisbuku')");
            }
        // mysqli_query($koneksi, "UPDATE penulis_buku SET kode_buku='$kode_buku', inisial_nama_belakang='$inisial_nama_belakang', huruf_depan_judul='$huruf_depan_judul', penulis='$penulis' 
        //                         WHERE kode_buku='$kode_buku' AND inisial_nama_belakang='$inisial_nama_belakang' AND huruf_depan_judul='$huruf_depan_judul'");
    }else if($button == "Delete"){
        $kode_buku = $_GET['kode_buku'];
        $inisial_nama_belakang = $_GET['inisial_nama_belakang'];
        $huruf_depan_judul = $_GET['huruf_depan_judul'];

        mysqli_query($koneksi, "DELETE FROM buku WHERE kode_buku='$kode_buku' AND inisial_nama_belakang='$inisial_nama_belakang' AND huruf_depan_judul='$huruf_depan_judul'");
        
        mysqli_query($koneksi, "DELETE FROM penulis_buku WHERE kode_buku='$kode_buku' AND inisial_nama_belakang='$inisial_nama_belakang' AND huruf_depan_judul='$huruf_depan_judul'");
    }

 
    header("location:".BASE_URL."pages/myperpus.php?module=buku&action=list");
?>