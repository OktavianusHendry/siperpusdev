<div id="frame-tambah">
    <button class='btn-tambah'><a href="<?php echo BASE_URL."pages/myperpus.php?module=pembaca&action=form"; ?>" class="tombol-2">+ Tambah Pembaca</a></button>
</div>

<?php
    $queryPembaca= mysqli_query($koneksi, "SELECT * FROM pembaca ORDER BY kedudukan ASC");

    if(mysqli_num_rows($queryPembaca)==0){
        echo "<h3?Saat ini belum ada nama kategori di dalam table kategori</h3>";
    }else{

        echo"<table class='table-list-2'>";

        echo "<tr class='row-judul-2'>
                <th>No Pembaca</th>
                <th>Nama</th>
                <th>Kedudukan</th>
                <th>Nomor Hp</th>
                <th>Email</th>
                <th>Action</th>
            </tr>";

        while($row=mysqli_fetch_assoc($queryPembaca)){

            echo "<tr>
                    <td>$row[no_pembaca]</td>
                    <td>$row[nama]</td>
                    <td>$row[kedudukan]</td>
                    <td>$row[no_hp]</td>
                    <td>$row[email]</td>
                    <td>
                        <button class='btn-edit'><a class='tombol-2' href='".BASE_URL."pages/myperpus.php?module=pembaca&action=form&no_pembaca=$row[no_pembaca]'>Edit</a></button>
                    </tr>";
        }
    }
?>