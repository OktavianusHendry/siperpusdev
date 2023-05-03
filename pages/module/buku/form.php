<?php

    $kode_buku = isset($_GET['kode_buku']) ? $_GET['kode_buku'] : false;
    $inisial_nama_belakang = isset($_GET['inisial_nama_belakang']) ? $_GET['inisial_nama_belakang'] : false;
    $huruf_depan_judul = isset($_GET['huruf_depan_judul']) ? $_GET['huruf_depan_judul'] : false;

    $judul = "";
    $penulis = "";
    $penerbit = "";
    $isbn = "";
    $jenis_buku = "";
    $genre = "";
    $stok = "";
    $tahun_terbit = "";
    $gambar_buku = "";
    $sinopsis = "";
    $button = "Add";
    $buttonDelete = "Delete";

    if($kode_buku){
        $queryBuku = mysqli_query($koneksi, "SELECT *, GROUP_CONCAT(penulis SEPARATOR '/') AS sipenulis FROM buku NATURAL JOIN penulis_buku WHERE kode_buku='$kode_buku' AND inisial_nama_belakang='$inisial_nama_belakang' AND huruf_depan_judul='$huruf_depan_judul' GROUP BY judul");
        $row = mysqli_fetch_assoc($queryBuku);
        
        $judul = $row['judul'];
        $penulis = $row['sipenulis'];
        $penerbit = $row['penerbit'];
        $isbn = $row['isbn'];
        $jenis_buku = $row['jenis_buku'];
        $genre = $row['genre'];
        $stok = $row['stok'];
        $tahun_terbit = $row['tahun_terbit'];
        $gambar_buku = $row['gambar_buku'];
        $sinopsis = $row['sinopsis'];
        $button = "Update";
        $buttonDelete = "Delete";
    }

?>

<form action ="<?php echo  BASE_URL."pages/module/buku/action.php?kode_buku=$kode_buku&inisial_nama_belakang=$inisial_nama_belakang&huruf_depan_judul=$huruf_depan_judul"; ?>" method="POST">

        <div class="form-module">   
            <label>Kode Buku</label>
            <span><input type="text" name="kode_buku" value="<?php echo $kode_buku; ?>" /></span>
        </div>

        <div class="form-module">   
            <label>Inisial Nama Belakang</label>
            <span><input type="text" name="inisial_nama_belakang" value="<?php echo $inisial_nama_belakang; ?>" /></span>
        </div>

        <div class="form-module">   
            <label>Huruf Depan Judul</label>
            <span><input type="text" name="huruf_depan_judul" value="<?php echo $huruf_depan_judul; ?>" /></span>
        </div>

        <div class="form-module">   
            <label>Judul</label>
            <span><input type="text" name="judul" value="<?php echo $judul; ?>"/></span>
        </div>

        <div class="form-module">   
            <label>Penulis</label>
            <span><input type="text" name="penulis" value="<?php echo $penulis; ?>" /></span>
        </div>

        <div class="form-module">   
            <label>Penerbit</label>
            <span><input type="text" name="penerbit" value="<?php echo $penerbit; ?>"/></span>
        </div>

        <div class="form-module">   
            <label>ISBN</label>
            <span><input type="text" name="isbn" value="<?php echo $isbn; ?>" /></span>
        </div>

        <div class="form-module">   
            <label>Jenis Buku</label>
            <select name="jenis_buku" >
                <option value="Novel" <?php if($jenis_buku == "Novel"){ echo "selected"; }?>>Novel</option>
                <option value="Buku Umum" <?php if($jenis_buku == "Buku Umum"){ echo "selected"; }?>>Buku Umum</option>
                <option value="Jurnal" <?php if($jenis_buku == "Jurnal"){ echo "selected"; }?>>Jurnal</option>
                <option value="Skripsi" <?php if($jenis_buku == "Skripsi"){ echo "selected"; }?>>Skripsi</option>
                <option value="Tesis" <?php if($jenis_buku == "Tesis"){ echo "selected"; }?>>Tesis</option>
            </select>
        </div>

        <div class="form-module">   
            <label>Genre</label>
            <select name="genre" >
                <option value="Teknik Informatika" <?php if($genre == "Teknik Informatika"){ echo "selected"; }?>>Teknik Informatika</option>
                <option value="Desain Interior" <?php if($genre == "Desain Interior"){ echo "selected"; }?>>Desain Interior</option>               
                <option value="Hospitaliti dan Pariwisata" <?php if($genre == "Hospitaliti dan Pariwisata"){ echo "selected"; }?>>Hospitaliti dan Pariwisata</option>
                <option value="Teknik Sipil" <?php if($genre == "Teknik Sipil"){ echo "selected"; }?>>Teknik Sipil</option>
                <option value="Arsitektur" <?php if($genre == "Teknik Sipil"){ echo "selected"; }?>>Arsitektur</option>
                <option value="Manajemen Retail" <?php if($genre == "Manajemen Retail"){ echo "selected"; }?>>Manajemen Retail</option>
                <option value="Sistem Informasi" <?php if($genre == "Sistem Informasi"){ echo "selected"; }?>>Sistem Informasi</option>
                <option value="Perencenaan Wilayah dan Kota" <?php if($genre == "Perencenaan Wilayah dan Kota"){ echo "selected"; }?>>Perencenaan Wilayah dan Kota</option>
                <option value="Desain Komunikasi Visual"<?php if($genre == "Desain Komunikasi Visual"){ echo "selected"; }?>>Desain Komunikasi Visual</option>
                <option value="Manajemen Bisnis" <?php if($genre == "Manajemen Bisnis"){ echo "selected"; }?>>Manajemen Bisnis</option>
                <option value="Akuntansi" <?php if($genre == "Akuntansi"){ echo "selected"; }?>>Akuntansi</option>
                <option value="Fantasy" <?php if($genre == "Fantasy"){ echo "selected"; }?>>Fantasy</option>
                <option value="Anak-anak" <?php if($genre == "Anak-anak"){ echo "selected"; }?>>Anak-anak</option>
            </select>
        </div>

        <div class="form-module">   
            <label>Stok</label>
            <span><input type="text" name="stok" value="<?php echo $stok; ?>"/></span>
        </div>
        
        <div class="form-module">   
            <label>Tahun Terbit</label>
            <span><input type="text" name="tahun_terbit" value="<?php echo $tahun_terbit; ?>" /></span>
        </div>

        <div class="form-module">   
            <label>Link Gambar Buku</label>
            <span><input type="text" name="gambar_buku" value="<?php echo $gambar_buku; ?>" /></span>
        </div>

        <div class="form-module">   
            <label>Sinopsis</label>
            <span><textarea id="form-text-area" name="sinopsis"><?php echo $sinopsis; ?></textarea></span>
        </div>
        
        <div class="form-module">
            <span>
                <input type="submit" name="button" value="<?php echo $button; ?>" />
                <input type="submit" name="button" value="<?php echo $buttonDelete; ?>" />            
            </span>
        </div>

</form>