<?php

    $no_pembaca = isset($_SESSION['no_pembaca']) ? $_SESSION['no_pembaca']:false;
    $kedudukan = isset($_SESSION['kedudukan']) ? $_SESSION['kedudukan']:false;

    if($kedudukan == "Pustakawan"){
        echo"<table class='table-list-2'>";

        echo "<tr class='row-judul-2'>
                <th>No Pengembalian</th>
                <th>Judul</th>
                <th>Nama Peminjam</th>
                <th>Tanggal pengembalian</th>
                <th>Keterangan Denda</th>
                <th>No Peminjaman</th>
            </tr>";

        $queryPengembalian= mysqli_query($koneksi, "SELECT * FROM mengembalikan NATURAL JOIN buku NATURAL JOIN pembaca");

        if(mysqli_num_rows($queryPengembalian)==0){
            echo "<h3?Saat ini belum ada nama kategori di dalam table kategori</h3>";
        }else{
            while($row=mysqli_fetch_assoc($queryPengembalian)){

                echo "<tr>
                        <td>$row[no_pengembalian]</td>
                        <td>$row[judul]</td>
                        <td>$row[nama]</td>
                        <td>$row[tgl_pengembalian]</td>
                        <td>$row[ket_denda]</td>
                        <td>$row[no_peminjaman]</td>
                    </tr>";
            }
        }
    }else{
        echo"<table class='table-list-2'>";

            echo "<tr class='row-judul-2'>
                    <th>No Pengembalian</th>
                    <th>Judul</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal pengembalian</th>
                    <th>Keterangan Denda</th>
                    <th>No Peminjaman</th>
                </tr>";       
                
        $queryPengembalian= mysqli_query($koneksi, "SELECT * FROM mengembalikan NATURAL JOIN buku NATURAL JOIN pembaca WHERE no_pembaca='$no_pembaca'");

        if(mysqli_num_rows($queryPengembalian)==0){
            echo "<h3?Saat ini belum ada nama kategori di dalam table kategori</h3>";
        }else{

            while($row=mysqli_fetch_assoc($queryPengembalian)){

                echo "<tr>
                        <td>$row[no_pengembalian]</td>
                        <td>$row[judul]</td>
                        <td>$row[nama]</td>
                        <td>$row[tgl_pengembalian]</td>
                        <td>$row[ket_denda]</td>
                        <td>$row[no_peminjaman]</td>
                    </tr>";
            }
        }
    }
?>