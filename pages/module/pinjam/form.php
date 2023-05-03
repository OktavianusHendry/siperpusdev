<?php    

    date_default_timezone_set("Asia/Jakarta");

    $query1 = mysqli_query($koneksi, "SELECT id FROM meminjam ORDER BY id DESC LIMIT 1");
    $row1 = mysqli_fetch_assoc($query1);

    $latestid = $row1['id'] + 1;
    $no_peminjaman1 = generasiNoPeminjaman(strval($latestid));

    $no_peminjaman = isset($_GET['no_peminjaman']) ? $_GET['no_peminjaman'] : false;

    $kode_buku = "";
    $inisial_nama_belakang = "";
    $huruf_depan_judul = "";
    $no_pembaca = "";
    $tgl_peminjaman = date("Y-m-d");
    $tgl_kembali_buku = date('Y-m-d', strtotime($tgl_peminjaman. ' + 14 days'));
    $keterangan = "";
    $button = "Add";
    $buttonDelete = "Delete";

    if($no_peminjaman){ //bagian tombol edit
        $queryPinjam = mysqli_query($koneksi, "SELECT * FROM meminjam WHERE no_peminjaman='$no_peminjaman'");
        $row = mysqli_fetch_assoc($queryPinjam);
        
        $kode_buku = $row['kode_buku'];
        $inisial_nama_belakang = $row['inisial_nama_belakang'];
        $huruf_depan_judul = $row['huruf_depan_judul'];
        $no_pembaca = $row['no_pembaca'];
        $tgl_peminjaman = $row['tgl_peminjaman'];
        $tgl_kembali_buku = $row['tgl_kembali_buku'];
        $keterangan = $row['keterangan'];
        $button = "Update";
        $buttonDelete = "Delete";
    }

?>

<form action ="<?php echo  BASE_URL."pages/module/pinjam/action.php?no_peminjaman=$no_peminjaman"; ?>" method="POST">

        <div class="form-module">   
            <label>No Peminjaman</label>
            <span><input type="text" name="no_peminjaman" value="<?php if($no_peminjaman){echo "$no_peminjaman";} else { echo "$no_peminjaman1"; } ?>" /></span>
        </div>

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
            <label>Nomor Pembaca</label>
            <span><input type="text" name="no_pembaca" value="<?php echo $no_pembaca; ?>"/></span>
        </div>

        <div class="form-module">   
            <label>Tanggal Pinjam</label>
            <span><input type="text" name="tgl_peminjaman" value="<?php echo $tgl_peminjaman; ?>" /></span>
        </div>
        
        <div class="form-module">   
            <label>Tanggal Kembali</label>
            <span><input type="text" name="tgl_kembali_buku" value="<?php echo $tgl_kembali_buku; ?>" /></span>
        </div>

        <div class="form-module">   
            <label>Keterangan</label>
            <select name="keterangan" >
                <option value="Belum Diambil" <?php if($keterangan == "Belum Diambil"){ echo "selected"; }?>>Belum Diambil</option>
                <option value="Sudah Diambil" <?php if($keterangan == "Sudah Diambil"){ echo "selected"; }?>>Sudah Diambil</option>
                <option value="Sudah Dikembalikan" <?php if($keterangan == "Sudah Dikembalikan"){ echo "selected"; }?>>Sudah Dikembalikan</option>
            </select>
        </div>

        <div class="form-module">
            <span>
                <input type="submit" name="button" value="<?php echo $button; ?>" />
                <input type="submit" name="button" value="<?php echo $buttonDelete; ?>" />          
            </span>
        </div>

</form>