<?php
    define("BASE_URL", "http://siperpus/");

    function jenis_buku($jenis_buku = false) {
        global $koneksi;

        $string ="<div id='menu-jenis-buku'>";

        $string .= "<ul>";

                $query = mysqli_query($koneksi, "SELECT DISTINCT * FROM buku GROUP BY jenis_buku ORDER BY jenis_buku ASC");//nampilin list jenis buku dari db

                while($row=mysqli_fetch_assoc($query)){
                    if($jenis_buku == $row['jenis_buku']){
                        $string .= "<li class='active'><a href='".BASE_URL."index.php?jenis_buku=$row[jenis_buku]'>$row[jenis_buku]</a></li>";
                    }else{
                        $string .= "<li><a href='".BASE_URL."index.php?jenis_buku=$row[jenis_buku]'>$row[jenis_buku]</a></li>";
                    }
                }

            $string .= "</ul>";

            $string .= "</div>";

            return $string;
    }


    function generasiNoPeminjaman($input, $prefix='PJ'){
        while (strlen($input) < 3) $input = '0'.$input;
        return $prefix.$input;
    }

    function generasiNoPengembalian($input, $prefix='BL'){
        while (strlen($input) < 3) $input = '0'.$input;
        return $prefix.$input;
    }
?>