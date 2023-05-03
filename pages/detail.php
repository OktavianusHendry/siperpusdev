<?php
    include_once("../function/helper.php");
    include_once("../function/koneksi.php");

    $kode_buku = $_GET['kode_buku'];
    $inisial_nama_belakang = $_GET['inisial_nama_belakang'];
    $huruf_depan_judul = $_GET['huruf_depan_judul'];

    $query = mysqli_query($koneksi, "SELECT * FROM buku NATURAL JOIN penulis_buku WHERE kode_buku = '$kode_buku' AND inisial_nama_belakang = '$inisial_nama_belakang' AND huruf_depan_judul = '$huruf_depan_judul'");//buat ngambil atribut buku buku nya
    $row = mysqli_fetch_assoc($query);

    $page_title = "SiPERPUS | " . $row['judul'];
    include ('../layouts/navbar.php');
    
    $no_pembaca = isset($_SESSION['no_pembaca']) ? $_SESSION['no_pembaca']:false;
    $kedudukan = isset($_SESSION['kedudukan']) ? $_SESSION['kedudukan']:false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama']:false;

    // Itung Last Viewed
    $queryLastView = mysqli_query($koneksi, "INSERT INTO buku_terlihat (no_pembaca, kode_buku, inisial_nama_belakang, huruf_depan_judul) VALUES ('$no_pembaca', '$kode_buku', '$inisial_nama_belakang', '$huruf_depan_judul')");

    $jenis_buku = $row['jenis_buku'];
    
    $sinopsis = $row['sinopsis'];
    $judul = $row['judul'];
    $banyakcharacter = strlen($sinopsis);
    $firsthalf = 300;
    $halfend = -1 * ($banyakcharacter - $firsthalf);
?>


<!-- Deskripsi Buku-->
<div class="fill"></div>
    <div class="container">
        <div class="pageBack">
        <a href="../index.php">&#11164; Back</a>
        </div>
        <!-- Kiri -->
        <div class="SectionKiri KiriDeskripsi">
            <div class="bungkusBuku">
            <?php
            echo "<img
                src='$row[gambar_buku]'
                alt='gambar buku'
                class='gambarBuku'
            />";
            ?>
            </div>
        </div>

        <!-- Kanan -->
        <div class="SectionTengah KananDeskripsi">
            <?php
                echo "<h1 class='title'>$row[judul]</h1>
                <div class='StripKuning lebarinWidth'></div>
                <div class='StripHijau kecilinMargin lebarinWidth'></div>

                <table class='tableDeskripsi'>
                <tr>
                    <th>Penulis:</th>
                    <td>$row[penulis]</td>
                </tr>
                <tr>
                    <th>Penerbit:</th>
                    <td>$row[penerbit]</td>
                </tr>
                <tr>
                    <th>ISBN:</th>
                    <td>$row[isbn]</td>
                </tr>
            </table>
            ". (($no_pembaca) ? "<button data-popup-target='#popup' class='btn-pinjam'>Pinjam</a></button>" : false ) ."
            <h2 class='deskripsi'>Sinopsis Buku</h3>
                <p class='deskripsi'>
                ".$halfstring = substr($sinopsis, 0, $firsthalf)."<span id='dots'>...</span>
                <span id='more'>".$anotherhalfstring = substr($sinopsis, $halfend)."
                </span> 
                <a onclick='myFunctionReadMore()' id='myBtn'>Read more</a>
                </p>
            ";
            ?>
                
            </div>
        </div>
    </div>

<div class="popup" id="popup">
    <?php

    $tgl_hari_ini = date('Y-m-d');
        echo "
        
        <div class='popup-header'>
            <div></div>
            <img src='../images/tandaseru.svg'></img>
            <button data-close-button class='close-button'>&times;</button>
        </div>

        <div class='popup-body'>
            <p class='line1'>Anda ingin meminjam buku <b>$row[judul]</b> dengan penulis <b>$row[penulis]</b> dan dikembalikan pada tanggal <b>" . (($kedudukan == 'Mahasiswa') ? date('Y-m-d', strtotime($tgl_hari_ini. ' + 14 days')) : date('Y-m-d', strtotime($tgl_hari_ini. ' + 120 days'))) ."</b> </p> 
            <p class='line2'>Apakah anda sudah membaca peraturan?</p>
        </div>

        <div class='popup-footer'>
            <span>
            <a href='".BASE_URL."../function/proses_pinjam.php?kode_buku=$row[kode_buku]&inisial_nama_belakang=$row[inisial_nama_belakang]&huruf_depan_judul=$row[huruf_depan_judul]''><button data-popup-target='#popup-selesai'>Ya</button></a>
                <button data-close-button> Tidak </button>
            </span>
        </div>
        
        ";
        
    ?>
    
</div>

<?php 
    $no_peminjaman = isset($_GET['no_peminjaman']) ? $_GET['no_peminjaman']:false;
    if(!$no_peminjaman){
    
    }else{
        echo "
                    <div class='popup active' id='popup'>

                        <div class='popup-header'>
                            <div></div>
                            <img src='../images/tandaceklis.svg'></img>
                            <a href='".BASE_URL."../pages/detail.php?kode_buku=$row[kode_buku]&inisial_nama_belakang=$row[inisial_nama_belakang]&huruf_depan_judul=$row[huruf_depan_judul]'> <button class='close-button'>&times;</button> </a>
                        </div>

                        <div class='popup-body'>
                            <p class='line1'>Silahkan membawa nomor peminjaman ke pustakawan di perpustakaan Universitas Pradita</p>
                            <p class='line2'><b>Nomor Peminjaman:</b> $no_peminjaman</p>
                        </div>

                        <div class='popup-footer'>
                            <span>
                                <a href='".BASE_URL."../pages/detail.php?kode_buku=$row[kode_buku]&inisial_nama_belakang=$row[inisial_nama_belakang]&huruf_depan_judul=$row[huruf_depan_judul]'> <button> Tutup </button> </a>
                            </span>
                        </div>
                    </div>

                    <div class='active' id='overlay'></div>
                        ";
    }
?>
            
        

<div id="overlay"></div>

    <?php
        include ('../layouts/similarbook.php')
    ?>

