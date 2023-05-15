<?php
    $no_pembaca = isset($_SESSION['no_pembaca']) ? $_SESSION['no_pembaca'] : false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $kedudukan = isset($_SESSION['kedudukan']) ? $_SESSION['kedudukan'] : false;
?>

            <!-- Banner -->
            <div class="fill"></div>
            <div id="pembungkusBanner">
                <div class="banner">
                    <?php
                        $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE tampilkan=1 LIMIT 5");
                        $firstBanner = true;
                        while ($rowBanner = mysqli_fetch_assoc($queryBanner)) {
                            $class = $firstBanner ? 'firstBanner' : '';
                            echo "<img src='{$rowBanner['images']}' alt='banner' class='$class' />";
                            $firstBanner = false;
                        }
                    ?>
                </div>
            </div>
            <!-- Buku Recomendation-->
            <div class="container">
                <!-- Kiri -->
                <div class="SectionKiri">
                    <h2 class="title">Popular This Week</h2>
                    <div class="StripKuning"></div>
                    <div class="StripHijau"></div>

                    <div class="scroll">
                        <!-- <div class="bungkusBuku"> -->
                        <?php


                        $queryPopular = mysqli_query($koneksi, "SELECT judul, kode_buku, inisial_nama_belakang, huruf_depan_judul, penulis, gambar_buku, COUNT(*) as viewed FROM buku_terlihat NATURAL JOIN buku NATURAL JOIN penulis_buku WHERE waktu_dilihat>=DATE_SUB(NOW(), INTERVAL 1 WEEK) GROUP BY kode_buku, inisial_nama_belakang, huruf_depan_judul ORDER BY viewed DESC LIMIT 10"); //tampilin popular book by week
                        while($rowPopular=mysqli_fetch_assoc($queryPopular)){
                            
                            echo "
                                <div class ='bungkusBuku'>
                                    <a href='".BASE_URL."../pages/detail.php?kode_buku=$rowPopular[kode_buku]&inisial_nama_belakang=$rowPopular[inisial_nama_belakang]&huruf_depan_judul=$rowPopular[huruf_depan_judul]'>
                                        <img src='$rowPopular[gambar_buku]' class='gambarBuku'/>
                                    <h3 class='deskripsiBuku'> $rowPopular[judul]</h3> <p class='deskripsiBuku'>$rowPopular[penulis]</p>
                                        </a>
                                </div>";
                        }
                        ?>
                    </div>
                </div>
                <!-- Tengah -->
                <div class="SectionTengah">
                    <h2 class="title">New Arrival</h2>
                    <div class="StripKuning"></div>
                    <div class="StripHijau"></div>

                    <div class="scroll">
                        
                        <?php
                            $queryNew = mysqli_query($koneksi, "SELECT * FROM buku NATURAL JOIN penulis_buku GROUP BY judul ORDER BY tanggal_ditambahkan DESC LIMIT 10");//tampilin 10 buku dengan urutan tanggal ditambahkan
                            while($rowNew=mysqli_fetch_assoc($queryNew)){
                                
                                echo "
                                    <div class ='bungkusBuku'>
                                        <a href='".BASE_URL."../pages/detail.php?kode_buku=$rowNew[kode_buku]&inisial_nama_belakang=$rowNew[inisial_nama_belakang]&huruf_depan_judul=$rowNew[huruf_depan_judul]'>
                                            <img src='$rowNew[gambar_buku]' class='gambarBuku'/>
                                        <h3 class='deskripsiBuku'> $rowNew[judul]</h3> <p class='deskripsiBuku'>$rowNew[penulis]</p>
                                            </a>
                                        </div>";
                            }
                            ?>
                    </div>
                </div>
                <!-- Kanan -->
                <div class="SectionKanan">
                    <h2 class="title">Last Viewed</h2>
                    <div class="StripKuning"></div>
                    <div class="StripHijau"></div>

                    <div class="scrollKanan">

                        <?php
                        
                            $queryLastViewed = mysqli_query($koneksi, "SELECT * FROM buku_terlihat NATURAL JOIN buku NATURAL JOIN pembaca NATURAL JOIN penulis_buku WHERE no_pembaca='$no_pembaca' GROUP BY judul ORDER BY waktu_dilihat DESC LIMIT 10");//tampilin last viewed book
                            
                            
                            if($no_pembaca){
                                if(mysqli_num_rows($queryLastViewed)==0){
                                    echo "<p>Silahkan pergi melihat buku :)</p>";
                                }else{
                                    while($rowLastViewed=mysqli_fetch_assoc($queryLastViewed)){
                                        echo "<div class='bungkusBuku'>
                                            <img
                                                src='$rowLastViewed[gambar_buku]'
                                                alt='gambar buku'
                                                class='gambarBuku'
                                            />
                                            <div class='deskripsiBuku'>
                                                <a href='".BASE_URL."../pages/detail.php?kode_buku=$rowLastViewed[kode_buku]&inisial_nama_belakang=$rowLastViewed[inisial_nama_belakang]&huruf_depan_judul=$rowLastViewed[huruf_depan_judul]'>
                                                    <h3>$rowLastViewed[judul]</h3>
                                                    <p>$rowLastViewed[penulis]</p>
                                                </a>
                                            </div>
                                        </div>";
                                    }
                                }
                            }else{
                                echo "<p>Silahkan login terlebih dahulu!</p>
                                <a href=".BASE_URL."../pages/login.php><button class='btn-login'>Login</button></a>";
                            }
                            
                        ?>
                    </div>
                </div>
                <!-- Collection -->
                <div id="collection">
                    <h2 class="title">Collections</h2>
                    <div class="StripKuning"></div>
                    <div class="StripHijau"></div>

                    <?php
                        $queryCollection = mysqli_query($koneksi, "SELECT * FROM buku NATURAL JOIN penulis_buku GROUP BY judul");//tampilin all book
                        while($rowNew=mysqli_fetch_assoc($queryCollection)){
                                
                            echo "
                                <div class ='bungkusBuku'>
                                    <a href='".BASE_URL."../pages/detail.php?kode_buku=$rowNew[kode_buku]&inisial_nama_belakang=$rowNew[inisial_nama_belakang]&huruf_depan_judul=$rowNew[huruf_depan_judul]'>
                                        <img src='$rowNew[gambar_buku]' class='gambarBuku'/>
                                    <h3 class='deskripsiBuku'> $rowNew[judul]</h3> <p class='deskripsiBuku'>$rowNew[penulis]</p>
                                        </a>
                                    </div>";
                        }
                    ?>

                    <!-- Smooth Scrolling to Collections Script -->
                    <script>
                        // Add an event listener to the link with the #collection href
                        document.querySelector('a[href="../index.php#collection"]')
                        .addEventListener("click", function (event) {
                            event.preventDefault(); // Prevent the default link behavior
                            document.querySelector("#collection").scrollIntoView({
                                behavior: "smooth", // Apply the smooth scroll behavior
                                block: "start", // Scroll to the top of the #collection element
                            });
                        });
                    </script>
                </div>
            </div>
            
        </div>
    </body>