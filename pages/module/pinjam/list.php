<?php

    $no_pembaca = isset($_SESSION['no_pembaca']) ? $_SESSION['no_pembaca'] : false;
    $kedudukan = isset($_SESSION['kedudukan']) ? $_SESSION['kedudukan'] : false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;

    if($kedudukan == "Pustakawan"){

        $queryPeminjam= mysqli_query($koneksi, "SELECT * FROM meminjam NATURAL JOIN pembaca NATURAL JOIN buku ORDER BY keterangan ASC");
        
        echo "
            <div id='frame-tambah'>
                <button class='btn-tambah'><a href='".BASE_URL."pages/myperpus.php?module=pinjam&action=form' class='tombol-2'>+ Tambah Peminjam</a> </button>
            </div>

        ";

        echo"<table class='table-list-2'>";

        echo "<tr class='row-judul-2pinjam'>
                <th>No Peminjaman</th>
                <th>Judul</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>";

        if(mysqli_num_rows($queryPeminjam)==0){
            echo "<h3?Saat ini belum ada nama kategori di dalam table kategori</h3>";
        }else{

            while($row=mysqli_fetch_assoc($queryPeminjam)){

                echo "<tr>
                        <td>$row[no_peminjaman]</td>
                        <td>$row[judul]</td>
                        <td>$row[nama]</td>
                        <td>$row[tgl_peminjaman]</td>
                        <td>$row[tgl_kembali_buku]</td>
                        <td>$row[keterangan]</td>
                        <td>
                            <button class='btn-edit'><a class='tombol-2' href='".BASE_URL."pages/myperpus.php?module=pinjam&action=form&no_peminjaman=$row[no_peminjaman]'>Edit</a></button>
                        </tr>";
                }
            }
    }else{
        $queryPeminjam = mysqli_query($koneksi, "SELECT * FROM meminjam NATURAL JOIN buku NATURAL JOIN pembaca WHERE no_pembaca='$no_pembaca' ORDER BY keterangan ASC");

        echo"<table class='table-list-2'>";

        echo "<tr class='row-judul-2pinjam'>
                <th>No Peminjaman</th>
                <th>Judul</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Keterangan</th>
            </tr>";

    if(mysqli_num_rows($queryPeminjam)==0){
        echo "<h3?Saat ini belum ada nama kategori di dalam table kategori</h3>";
    }else{

        while($row=mysqli_fetch_assoc($queryPeminjam)){

            echo "<tr>
                    <td>$row[no_peminjaman]</td>
                    <td>$row[judul]</td>
                    <td>$row[nama]</td>
                    <td>$row[tgl_peminjaman]</td>
                    <td>$row[tgl_kembali_buku]</td>
                    <td>$row[keterangan]</td>
                </tr>";
            }
        }
    }
?>