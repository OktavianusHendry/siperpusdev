<div id="frame-tambah">
    <a href="<?php echo BASE_URL."pages/myperpus.php?module=banner&action=form"; ?>" class="tombol-2">+ Tambah Banner</a>
</div>

<?php
    $queryBanner= mysqli_query($koneksi, "SELECT * FROM banner ORDER BY id DESC");
    
        echo"<table class='table-list-2'>";

        echo "<tr class='row-judul-2'>
                <th>Nama Banner</th>
                <th>Tampil</th>
                <th>Action</th>
            </tr>";

    if(mysqli_num_rows($queryBanner)==0){
        echo "<h3?Saat ini belum ada nama kategori di dalam table kategori</h3>";
    }else{

        while($row=mysqli_fetch_assoc($queryBanner)){

            echo "<tr>
                    <td>$row[nama]</td>
                    <td>$row[tampilkan]</td>
                    <td>
                        <a class='tombol-2' href='".BASE_URL."pages/myperpus.php?module=banner&action=form&id=$row[id]'>Edit</a>
                    </tr>";
        }
    }
?>