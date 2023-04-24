<?php
    include_once("koneksi.php");
    include_once("helper.php");

    session_start();

    $no_pembaca = isset($_SESSION['no_pembaca']) ? $_SESSION['no_pembaca']:false;
    $kedudukan = isset($_SESSION['kedudukan']) ? $_SESSION['kedudukan']:false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama']:false;

    $kode_buku = $_GET['kode_buku'];
    $inisial_nama_belakang = $_GET['inisial_nama_belakang'];
    $huruf_depan_judul = $_GET['huruf_depan_judul'];

    $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE kode_buku='$kode_buku' AND inisial_nama_belakang='$inisial_nama_belakang' AND huruf_depan_judul='$huruf_depan_judul'");
    $row = mysqli_fetch_assoc($query);

 // Proses Peminjaman
    $query1 = mysqli_query($koneksi, "SELECT id FROM meminjam ORDER BY id DESC LIMIT 1");//ngambil id buat PJ dgn limit ambil 1 id saja
    $row1 = mysqli_fetch_assoc($query1);
    $latestid = $row1['id'] + 1;
    $no_peminjaman = generasiNoPeminjaman(strval($latestid));

    date_default_timezone_set("Asia/Jakarta");
    $tgl_peminjaman = date("Y-m-d");

    if($kedudukan == "Mahasiswa"){
        $tgl_kembali_buku = date('Y-m-d', strtotime($tgl_peminjaman. ' + 14 days'));

        $keterangan = "Belum Diambil";

        mysqli_query($koneksi, "INSERT INTO meminjam (no_peminjaman, kode_buku, inisial_nama_belakang, huruf_depan_judul, no_pembaca, tgl_peminjaman, tgl_kembali_buku, keterangan) 
                                VALUES ('$no_peminjaman', '$kode_buku', '$inisial_nama_belakang', '$huruf_depan_judul', '$no_pembaca', '$tgl_peminjaman', '$tgl_kembali_buku', '$keterangan')");

    }else if($kedudukan == "Dosen" || $kedudukan == "Pustakawan"){
        $tgl_kembali_buku = date('Y-m-d', strtotime($tgl_peminjaman. ' + 120 days'));

        $keterangan = "Belum Diambil";

        mysqli_query($koneksi, "INSERT INTO meminjam (no_peminjaman, kode_buku, inisial_nama_belakang, huruf_depan_judul, no_pembaca, tgl_peminjaman, tgl_kembali_buku, keterangan) 
                                VALUES ('$no_peminjaman', '$kode_buku', '$inisial_nama_belakang', '$huruf_depan_judul', '$no_pembaca', '$tgl_peminjaman', '$tgl_kembali_buku', '$keterangan')");
    }

    header("location:" . BASE_URL . "../pages/detail.php?page=detail&kode_buku=$row[kode_buku]&inisial_nama_belakang=$row[inisial_nama_belakang]&huruf_depan_judul=$row[huruf_depan_judul]&no_peminjaman=$no_peminjaman");
?>