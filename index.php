<?php
    include_once("function/helper.php");
    include_once("function/koneksi.php");

    $page_title = 'SiPERPUS | Home';
    include ('layouts/navbar.php');
    include ('layouts/content.php');
?>

<?php 
    $logout = isset($_GET['logout']) ? $_GET['logout']:false;
    if(!$logout){
    
    }else{
        echo "
                    <div class='popup active' id='popup'>

                        <div class='popup-header'>
                            <div></div>
                            <img src='../images/tandaceklis.svg'></img>
                            <a href='".BASE_URL."index.php'> <button class='close-button'>&times;</button> </a>
                        </div>

                        <div class='popup-body'>
                            <p class='line1'>Anda berhasil logout!</p>
                        </div>

                        <div class='popup-footer'>
                            <span>
                                <a href='".BASE_URL."index.php'> <button> Tutup </button> </a>
                            </span>
                        </div>
                    </div>

                    <div class='active' id='overlay'></div>
                        ";
    }
?>
            
        

<div id="overlay"></div>