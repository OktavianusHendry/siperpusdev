<?php

    include_once("../function/helper.php");
    include_once("../function/koneksi.php");

    $no_pembaca = isset($_GET['no_pembaca']) ? $_GET['no_pembaca'] : false;
    if($no_pembaca){
        header("location: ".BASE_URL);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiPERPUS | Login</title>
    <link rel="stylesheet" href="../css/loginstyle.css" type="text/css" />
    <link
        rel="shortcut icon"
        type="image/icon"
        href="../images/praditaicon1.ico"
    />
</head>
<body>
    <!--Container Tengah-->
    <div class="box-container">
        
        <div class="content">
            <a href="index.php"><img src="../images/logo_universitas.png"></a>

            <form action="<?php echo BASE_URL.'../function/proses_login.php'; ?>" method="POST">

                <?php
                    $notif = isset($_POST['notif']) ? $_GET['notif'] : false;

                    if ($notif == true){
                        echo "<div class='notif'>Maaf, email atau password yang dimasukkan tidak cocok</div>";
                    }
                ?>

                <div class="input-form">
                    <p><b>NIM/NIP</b></p>
                    <input type="text" placeholder="0123456789" name="no_pembaca" required/>
                </div>

                <div class="input-form">
                    <p><b>Password</b></p>
                    <input type="password" placeholder="********" name="password"/>
                </div>
                
                <input type="submit" value="Login">

                <div class="forgot-password">
                    Forgot your password? <a href="#"><b>Change here!</b></a>
                </div>
            </form>
        </div>

    </div>
    <!--Container Tengah Selesai-->
</body>
</html>