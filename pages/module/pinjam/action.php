<?php

    include_once("../../function/koneksi.php");
    include_once("../../function/helper.php");  

    $no_peminjaman = $_POST['no_peminjaman'];
    $kode_buku = $_POST['kode_buku'];
    $inisial_nama_belakang = $_POST['inisial_nama_belakang'];
    $huruf_depan_judul = $_POST['huruf_depan_judul'];
    $no_pembaca = $_POST['no_pembaca'];
    $tgl_peminjaman = $_POST['tgl_peminjaman'];
    $tgl_kembali_buku = $_POST['tgl_kembali_buku'];
    $keterangan = $_POST['keterangan'];
    $button = $_POST['button'];

    if($button == "Add"){
        mysqli_query($koneksi, "INSERT INTO meminjam (no_peminjaman, kode_buku, inisial_nama_belakang, huruf_depan_judul, no_pembaca, tgl_peminjaman, tgl_kembali_buku, keterangan) 
                                VALUES ('$no_peminjaman', '$kode_buku', '$inisial_nama_belakang', '$huruf_depan_judul', '$no_pembaca', '$tgl_peminjaman', '$tgl_kembali_buku', '$keterangan')");
    }else if($button == "Update"){
        if($keterangan == "Sudah Diambil"){
            $no_peminjaman = $_GET['no_peminjaman'];

            mysqli_query($koneksi, "UPDATE meminjam SET no_peminjaman='$no_peminjaman', kode_buku='$kode_buku', inisial_nama_belakang='$inisial_nama_belakang', huruf_depan_judul='$huruf_depan_judul', no_pembaca='$no_pembaca', tgl_peminjaman='$tgl_peminjaman', tgl_kembali_buku='$tgl_kembali_buku', keterangan='$keterangan'
                                    WHERE no_peminjaman='$no_peminjaman'");
        } else if ($keterangan == "Sudah Dikembalikan"){
            $no_peminjaman = $_GET['no_peminjaman'];

            mysqli_query($koneksi, "UPDATE meminjam SET no_peminjaman='$no_peminjaman', kode_buku='$kode_buku', inisial_nama_belakang='$inisial_nama_belakang', huruf_depan_judul='$huruf_depan_judul', no_pembaca='$no_pembaca', tgl_peminjaman='$tgl_peminjaman', tgl_kembali_buku='$tgl_kembali_buku', keterangan='$keterangan'
                                    WHERE no_peminjaman='$no_peminjaman'");


            $query1 = mysqli_query($koneksi, "SELECT id FROM mengembalikan ORDER BY id DESC LIMIT 1");
            $row1 = mysqli_fetch_assoc($query1);

            $latestid = $row1['id'] + 1;

            $no_pengembalian = generasiNoPengembalian(strval($latestid));

            date_default_timezone_set("Asia/Jakarta");
            
            $tgl_pengembalian = new DateTime(date("Y-m-d"));
            $tgl_kembali_bukuDateFormat = new DateTime($tgl_kembali_buku);

            $tgl_nentuin_denda = $tgl_kembali_bukuDateFormat -> diff($tgl_pengembalian) -> format("%r%a");
            
            if($tgl_nentuin_denda <= 0){
                $ket_denda = "-";
                $tgl_pengembalian2 = date("Y-m-d");

            }else{
                $harga_denda = $tgl_nentuin_denda * 10000; 

                $ket_denda = "Denda Rp" . strval($harga_denda);

                $tgl_pengembalian2 = date("Y-m-d");
            }

            mysqli_query($koneksi, "INSERT INTO mengembalikan (no_pengembalian, kode_buku, inisial_nama_belakang, huruf_depan_judul, tgl_pengembalian, ket_denda, no_pembaca, no_peminjaman) 
                                    VALUES ('$no_pengembalian', '$kode_buku', '$inisial_nama_belakang', '$huruf_depan_judul', '$tgl_pengembalian2', '$ket_denda', '$no_pembaca', '$no_peminjaman')");
        }
    } else if($button == "Delete"){
        $no_pembaca = $_GET['no_pembaca'];

        mysqli_query($koneksi, "DELETE FROM meminjam WHERE no_peminjaman='$no_peminjaman'");
    }
        
    header("location:".BASE_URL."index.php?page=my_perpus&module=pinjam&action=list");

?>

