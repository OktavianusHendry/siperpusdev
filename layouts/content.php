
            <!-- Banner -->
            <div class="fill"></div>
            <div id="pembungkusBanner">
                <div class="banner">
                    <img
                        class="firstBanner"
                        src="images/banner.jpg"
                        alt="banner1"
                    />
                    <img src="images/banner.jpeg" alt="banner2" />
                    <img src="images/banner.jpg" alt="banner3" />
                    <img src="images/banner.jpeg" alt="banner4" />
                    <img src="images/banner.jpg" alt="banner5" />
                    <img src="images/banner.jpeg" alt="banner6" />
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


                        $query = mysqli_query($koneksi, "SELECT * FROM buku NATURAL JOIN penulis_buku GROUP BY judul LIMIT 15");//tampilin smua jenis buku
                        while($row=mysqli_fetch_assoc($query)){
                            
                            echo "
                                <div class ='bungkusBuku'>
                                    <a href='".BASE_URL."../pages/detail.php?kode_buku=$row[kode_buku]&inisial_nama_belakang=$row[inisial_nama_belakang]&huruf_depan_judul=$row[huruf_depan_judul]'>
                                        <img src='$row[gambar_buku]' class='gambarBuku'/>
                                    <h3 class='deskripsiBuku'> $row[judul]</h3> <p class='deskripsiBuku'>$row[penulis]</p>
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
                        $query = mysqli_query($koneksi, "SELECT * FROM buku NATURAL JOIN penulis_buku GROUP BY judul LIMIT 15");//tampilin smua jenis buku
                        while($row=mysqli_fetch_assoc($query)){
                            
                            echo "
                                <div class ='bungkusBuku'>
                                    <a href='".BASE_URL."../pages/detail.php?kode_buku=$row[kode_buku]&inisial_nama_belakang=$row[inisial_nama_belakang]&huruf_depan_judul=$row[huruf_depan_judul]'>
                                        <img src='$row[gambar_buku]' class='gambarBuku'/>
                                    <h3 class='deskripsiBuku'> $row[judul]</h3> <p class='deskripsiBuku'>$row[penulis]</p>
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
                        <div class="bungkusBuku">
                            <img
                                src="images/book-cover-small.png"
                                alt="gambar buku"
                                class="gambarBuku"
                            />
                            <div class="deskripsiBuku">
                                <a href="pagebuku.html">
                                    <h3>Ini Judul Bukuuuuuuuuuuuuuuuuuuuu</h3>
                                    <p>Ini Penulis Buku</p>
                                </a>
                            </div>
                        </div>

                        <div class="bungkusBuku">
                            <img
                                src="images/book-cover-small.png"
                                alt="gambar buku"
                                class="gambarBuku"
                            />
                            <div class="deskripsiBuku">
                                <a href="pagebuku.html">
                                    <h3>Ini Judul Bukuuuuuuuuuuuuuuuuuuuu</h3>
                                    <p>Ini Penulis Buku</p>
                                </a>
                            </div>
                        </div>

                        <div class="bungkusBuku">
                            <img
                                src="images/book-cover-small.png"
                                alt="gambar buku"
                                class="gambarBuku"
                            />
                            <div class="deskripsiBuku">
                                <a href="pagebuku.html">
                                    <h3>Ini Judul Bukuuuuuuuuuuuuuuuuuuuu</h3>
                                    <p>Ini Penulis Buku</p>
                                </a>
                            </div>
                        </div>

                        <div class="bungkusBuku">
                            <img
                                src="images/book-cover-small.png"
                                alt="gambar buku"
                                class="gambarBuku"
                            />
                            <div class="deskripsiBuku">
                                <a href="pagebuku.html">
                                    <h3>Ini Judul Bukuuuuuuuuuuuuuuuuuuuu</h3>
                                    <p>Ini Penulis Buku</p>
                                </a>
                            </div>
                        </div>

                        <div class="bungkusBuku">
                            <img
                                src="images/book-cover-small.png"
                                alt="gambar buku"
                                class="gambarBuku"
                            />
                            <div class="deskripsiBuku">
                                <a href="pagebuku.html">
                                    <h3>Ini Judul Bukuuuuuuuuuuuuuuuuuuuu</h3>
                                    <p>Ini Penulis Buku</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bawahnya 3 Section -->
            <div class="container">
                <div class="blog">
                    <h2>Blog & Review</h2>
                    <div class="StripKuning"></div>
                    <div class="StripHijau"></div>

                    <div class="scrollBlog">
                        <div class="pembungkusBlog">
                            <img
                                src="images/banner.jpeg"
                                alt="gambar buku"
                                class="gambarBlog"
                            />
                            <h3>Blog 1</h3>
                        </div>
                        <div class="pembungkusBlog">
                            <img
                                src="images/banner.jpeg"
                                alt="gambar buku"
                                class="gambarBlog"
                            />
                            <h3>Blog 2</h3>
                        </div>
                        <div class="pembungkusBlog">
                            <img
                                src="images/banner.jpeg"
                                alt="gambar buku"
                                class="gambarBlog"
                            />
                            <h3>Blog 3</h3>
                        </div>
                        <div class="pembungkusBlog">
                            <img
                                src="images/banner.jpeg"
                                alt="gambar buku"
                                class="gambarBlog"
                            />
                            <h3>Blog 4</h3>
                        </div>
                        <div class="pembungkusBlog">
                            <img
                                src="images/banner.jpeg"
                                alt="gambar buku"
                                class="gambarBlog"
                            />
                            <h3>Blog 5</h3>
                        </div>
                        <div class="pembungkusBlog">
                            <img
                                src="images/banner.jpeg"
                                alt="gambar buku"
                                class="gambarBlog"
                            />
                            <h3>Blog 6</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>