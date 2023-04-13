<div id="kiri">
    
    <?php

        echo jenis_buku($jenis_buku);

    ?>

</div>

<div id="kanan">
    <div id="frame-buku">

        <ul>
            <?php

                if($jenis_buku){
                    $query = mysqli_query($koneksi, "SELECT * FROM buku NATURAL JOIN penulis_buku WHERE jenis_buku='$jenis_buku' GROUP BY judul LIMIT 15");//filter sesuai jenis buku 
                }else{
                    $query = mysqli_query($koneksi, "SELECT * FROM buku NATURAL JOIN penulis_buku GROUP BY judul LIMIT 15");//tampilin smua jenis buku
                }
                    
                while($row=mysqli_fetch_assoc($query)){
                    
                    echo "<li>
                            <a href='".BASE_URL."index.php?page=detail&kode_buku=$row[kode_buku]&inisial_nama_belakang=$row[inisial_nama_belakang]&huruf_depan_judul=$row[huruf_depan_judul]'>
                                <img src='$row[gambar_buku]'/>
                            </a>
                            <div class ='keterangan-gambar'>
                                <p><a href='".BASE_URL."index.php?page=detail&kode_buku=$row[kode_buku]&inisial_nama_belakang=$row[inisial_nama_belakang]&huruf_depan_judul=$row[huruf_depan_judul]'>$row[judul]</a></p>
                                <span>$row[penulis]</span>
                            </div>";
                }

            ?>
        </ul>

    </div>
</div>
            
