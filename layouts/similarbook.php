<div class="container">
    <div class="blog similar">
        <h2>Similar to <?php echo "$judul";?></h2>
        <div class="StripKuning"></div>
        <div class="StripHijau"></div>

        <div class="scroll similar">
            <?php
                $query = mysqli_query($koneksi, "SELECT * FROM buku NATURAL JOIN penulis_buku WHERE jenis_buku = '$jenis_buku' GROUP BY judul LIMIT 15");//tampilin smua jenis buku
                    while($row=mysqli_fetch_assoc($query)){
                            
                        echo "
                        <div class ='bungkusBuku'>
                            <a href='".BASE_URL."index.php?page=detail&kode_buku=$row[kode_buku]&inisial_nama_belakang=$row[inisial_nama_belakang]&huruf_depan_judul=$row[huruf_depan_judul]'>
                                <img src='$row[gambar_buku]' class='gambarBuku'/>
                                <h3 class='deskripsiBuku'> $row[judul]</h3> 
                                <p class='deskripsiBuku'>$row[penulis]</p>
                            </a>
                        </div>
                        ";
                    }
            ?>
        </div>
    </div>
</div>