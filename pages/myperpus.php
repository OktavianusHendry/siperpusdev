<?php
    include_once("../function/helper.php");
    include_once("../function/koneksi.php");

    $no_pembaca = isset($_SESSION['no_pembaca']) ? $_SESSION['no_pembaca']:false;
    $kedudukan = isset($_SESSION['kedudukan']) ? $_SESSION['kedudukan']:false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama']:false;

    $module = isset($_GET['module']) ? $_GET['module'] : false;
    $action = isset($_GET['action']) ? $_GET['action'] : false;
    $mode = isset($_GET['mode']) ? $_GET['mode'] : false;

    $page_title = "SiPERPUS | Profile";
    include ('../layouts/navbar.php');
?>

<div id="bg-page-perpus">

        <div id="menu-perpus">
            <ul>
                <?php
                
                    if($kedudukan == "Pustakawan"){

                ?>
                <li>
                    <a href="<?php echo BASE_URL."pages/myperpus.php?module=buku&action=list"; ?>" <?php if($module == "buku"){echo "class = 'active'";}?> >Buku</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL."pages/myperpus.php?module=pembaca&action=list"; ?>" <?php if($module == "pembaca"){echo "class = 'active'";}?> >Pembaca</a>
                </li>

                <?php
                    }
                    ?>
                    
                <li>
                    <a href="<?php echo BASE_URL."pages/myperpus.php?module=pinjam&action=list"; ?>" <?php if($module == "pinjam"){echo "class = 'active'";}?> >Pinjam</a>
                </li>
            </ul>
        </div>
        
        <div id="content-menu">
            <?php

                $file = "module/$module/$action.php";
                if(file_exists($file)){
                    include_once($file);
                }else{
                    echo "<h3>Filenya ngga ada</h3>";
                }
            
            ?>
        </div>
</div>