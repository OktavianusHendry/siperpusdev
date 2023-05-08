<?php

    $no_pembaca = isset($_GET['no_pembaca']) ? $_GET['no_pembaca'] : false;

    $nama = "";
    $kedudukan = "";
    $no_hp = "";
    $email = "";
    $button = "Add";
    $buttonDelete = "Delete";

    if($no_pembaca){
        $queryPembaca = mysqli_query($koneksi, "SELECT * FROM pembaca WHERE no_pembaca='$no_pembaca'");
        $row = mysqli_fetch_assoc($queryPembaca);
        
        $nama = $row['nama'];
        $kedudukan = $row['kedudukan'];
        $no_hp = $row['no_hp'];
        $email = $row['email'];
        $button = "Update";
        $buttonDelete = "Delete";
    }

?>

<form action ="<?php echo  BASE_URL."pages/module/pembaca/action.php?no_pembaca=$no_pembaca"; ?>" method="POST">

        <div class="form-module">   
            <p>Nomor Pembaca</p>
            <span><input type="text" name="no_pembaca" value="<?php echo $no_pembaca; ?>" /></span>
        </div>

        <div class="form-module">   
            <p>Nama</p>
            <span><input type="text" name="nama" value="<?php echo $nama; ?>" /></span>
        </div>

        <div class="form-module">   
            <p>Kedudukan</p>
            <select name="kedudukan" >
                <option value="Mahasiswa" <?php if($kedudukan == "Mahasiswa"){ echo "selected"; }?>>Mahasiswa</option>
                <option value="Dosen" <?php if($kedudukan == "Dosen"){ echo "selected"; }?>>Dosen</option>
                <option value="Pustakawan" <?php if($kedudukan == "Pustakawan"){ echo "selected"; }?>>Pustakawan</option>
            </select>
        </div>

        <div class="form-module">   
            <p>Nomor Handphone</p>
            <span><input type="text" name="no_hp" value="<?php echo $no_hp; ?>"/></span>
        </div>

        <div class="form-module">   
            <p>Email</p>
            <span><input type="text" name="email" value="<?php echo $email; ?>" /></span>
        </div>
        
        <div class="form-module">
            <span>
                <input type="submit" name="button" value="<?php echo $button; ?>" />
                <input type="submit" name="button" value="<?php echo $buttonDelete; ?>" />           
            </span>
        </div>

</form>