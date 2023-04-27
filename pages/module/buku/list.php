<div id="frame-tambah">
    <a href="<?php echo BASE_URL."index.php?page=my_perpus&module=buku&action=form"; ?>" class="tombol-2">+ Tambah Buku</a>
</div>

<?php
    $queryBuku= mysqli_query($koneksi, "SELECT *, GROUP_CONCAT(penulis SEPARATOR ', ') AS sipenulis FROM buku NATURAL JOIN penulis_buku GROUP BY judul");
                                            // GROUP_CONCAT buat supaya nama penulis bisa tampil lebih dari 1 dengan pemisah nama pakai ,
    if(mysqli_num_rows($queryBuku)==0){
        echo "<h3?Saat ini belum ada nama kategori di dalam table kategori</h3>";
    }else{

        echo"<table class='table-list'>";

        echo "<tr class='row-judul'>
                <th>Kode Buku</th>
                <th>Inisial Nama Belakang</th>
                <th>Huruf Depan Judul</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>ISBN</th>
                <th>Jenis Buku</th>
                <th>Genre</th>
                <th>Stok</th>
                <th>Tahun Terbit</th>
                <th>Action</th>
            </tr>";

        while($row=mysqli_fetch_assoc($queryBuku)){

            echo "<tr>
                    <td>$row[kode_buku]</td>
                    <td>$row[inisial_nama_belakang]</td>
                    <td>$row[huruf_depan_judul]</td>
                    <td>$row[judul]</td>
                    <td>$row[sipenulis]</td>
                    <td>$row[penerbit]</td>
                    <td>$row[isbn]</td>
                    <td>$row[jenis_buku]</td>
                    <td>$row[genre]</td>   
                    <td>$row[stok]</td>
                    <td>$row[tahun_terbit]</td>
                    <td>
                        <a class='tombol-2' href='".BASE_URL."index.php?page=my_perpus&module=buku&action=form&kode_buku=$row[kode_buku]&inisial_nama_belakang=$row[inisial_nama_belakang]&huruf_depan_judul=$row[huruf_depan_judul]'>Edit</a>
                    </tr>";
        }
    }
?>