<?php

    $id = isset($_GET['id']) ? $_GET['id'] : false;

    $nama = "";
    $images = "";
    $tampilkan = "";
    $email = "";
    $button = "Add";
    $buttonDelete = "Delete";

    if($id){
        $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE id='$id'");
        $row = mysqli_fetch_assoc($queryBanner);
        
        $nama = $row['nama'];
        $images = $row['images'];
        $tampilkan = $row['tampilkan'];
        $button = "Update";
        $buttonDelete = "Delete";
    }

?>

<form action ="<?php echo  BASE_URL."pages/module/banner/action.php?id=$id"; ?>" method="POST">


        <div class="form-module">   
            <label>Nama Banner</label>
            <span><input type="text" name="nama" value="<?php echo $nama; ?>" /></span>
        </div>

        <div class="form-module">   
            <label>Link Banner</label>
            <span><input type="text" name="images" value="<?php echo $images; ?>" /></span>
        </div>

        <div class="form-module">   
            <label>Tampilkan</label>
            <input type="radio" name="tampilkan" value="1" checked <?php if($tampilkan == 1){ echo "checked='true'"; } ?> /> Ya
            <input type="radio" name="tampilkan" value="0" <?php if($tampilkan == 0){ echo "checked='true'"; } ?> /> Tidak
        </div>
        
        <div class="form-module">
            <span>
                <input type="submit" name="button" value="<?php echo $button; ?>" />
                <input type="submit" name="button" value="<?php echo $buttonDelete; ?>" />           
            </span>
        </div>

</form>