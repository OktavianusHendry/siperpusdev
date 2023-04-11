<?php

    session_start();

    $no_pembaca = isset($_SESSION['no_pembaca']) ? $_SESSION['no_pembaca'] : false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $kedudukan = isset($_SESSION['kedudukan']) ? $_SESSION['kedudukan'] : false;
?>

<!DOCTYPE html>
<html lang="eng">
    <head>
        <title><?php echo $page_title; ?></title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/style.css" type="text/css" />
        <link
            rel="shortcut icon"
            type="image/icon"
            href="images/praditaicon1.ico"
        />
        <script defer src="js/script.js"></script>
    </head>

    <body>
            <!-- Header -->
            <header class="header">
                <nav id="navbar">
                    <img
                        src="images/logo_universitas.png"
                        alt="logo"
                        class="logo"
                    />
                    <div class="text-user">
                        <?php
                        if($no_pembaca){
                            echo "<span style='display: inline-block; float: right; right: 15px; position: relative; text-align: right; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; width: 150px;margin-right: 15px'>Hi, <b>$nama!</b></span> <br> <a href='".BASE_URL."index.php?page=my_perpus&module=pinjam&action=list'><button class='btn-myp'>My Perpus</button></a> <a href='".BASE_URL."function/logout.php'><button class='btn-logout'>Logout</button></a> </br>";
                        }else{
                            echo "<a href=".BASE_URL."../pages/login.php><button class='btn-login'>Login</button></a>";
                        }
                        ?>
                    </div>
                    <svg
                        fill="#000000"
                        height="15px"
                        width="15px"
                        version="1.1"
                        id="btn_search"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 490.40 490.40"
                        xml:space="preserve"
                        stroke="#000000"
                        stroke-width="0.004904"
                    >
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g
                            id="SVGRepo_tracerCarrier"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke="#CCCCCC"
                            stroke-width="2.9423999999999997"
                        ></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <path
                                    d="M484.1,454.796l-110.5-110.6c29.8-36.3,47.6-82.8,47.6-133.4c0-116.3-94.3-210.6-210.6-210.6S0,94.496,0,210.796 s94.3,210.6,210.6,210.6c50.8,0,97.4-18,133.8-48l110.5,110.5c12.9,11.8,25,4.2,29.2,0C492.5,475.596,492.5,463.096,484.1,454.796z M41.1,210.796c0-93.6,75.9-169.5,169.5-169.5s169.6,75.9,169.6,169.5s-75.9,169.5-169.5,169.5S41.1,304.396,41.1,210.796z"
                                ></path>
                            </g>
                        </g>
                    </svg>
                    <!-- Mode Switches -->
                    <label for="toggle">
                        <input type="checkbox" />

                        <svg viewBox="0 0 100 45" width="400" height="180">
                            <defs>
                                <!-- rectangle used for the background and re-used in the clip and mask elements -->
                                <rect
                                    id="background"
                                    x="0"
                                    y="0"
                                    width="90"
                                    height="40"
                                    rx="20"
                                ></rect>

                                <!-- clip cutting out the elements exceeding the rounded rectangle -->
                                <clipPath id="clip">
                                    <use href="#background"></use>
                                </clipPath>

                                <!-- for the light variant -->
                                <!-- gradient used for the background -->
                                <linearGradient
                                    id="gradient-light"
                                    x1="0"
                                    x2="0"
                                    y1="0"
                                    y2="1"
                                >
                                    <stop
                                        stop-color="#8bc8f2"
                                        offset="0"
                                    ></stop>
                                    <stop stop-color="#fff" offset="1"></stop>
                                </linearGradient>

                                <!-- filter applied to (a copy of) the sun to blur the edges -->
                                <filter id="blur-light">
                                    <feGaussianBlur
                                        stdDeviation="1"
                                    ></feGaussianBlur>
                                </filter>

                                <!-- pattern for the waves -->
                                <pattern
                                    id="pattern-light"
                                    width="0.1"
                                    height="1"
                                    viewBox="0 0 10 45"
                                >
                                    <path
                                        fill="#40b5f8"
                                        d="M 0 0 a 6 6 0 0 0 10 0 v 45 h -10 z"
                                    ></path>
                                </pattern>

                                <!-- for the dark variant -->
                                <!-- gradient used for the background -->
                                <linearGradient
                                    id="gradient-dark"
                                    x1="0"
                                    x2="0"
                                    y1="0"
                                    y2="1"
                                >
                                    <stop
                                        stop-color="#1F2241"
                                        offset="0"
                                    ></stop>
                                    <stop
                                        stop-color="#7D59DF"
                                        offset="1"
                                    ></stop>
                                </linearGradient>

                                <!-- gradient used for the the mask
                                          the idea is to have the mask use the [#000-#fff] gradient to progressively hide the shapes as they approach the bottom
                                      -->
                                <linearGradient
                                    id="gradient-mask"
                                    x1="0"
                                    x2="0"
                                    y1="0"
                                    y2="1"
                                >
                                    <stop stop-color="#000" offset="0"></stop>
                                    <stop stop-color="#fff" offset="1"></stop>
                                </linearGradient>

                                <!-- mask to conceal the stars at the bottom of the toggle -->
                                <mask id="mask-dark">
                                    <use
                                        fill="url(#gradient-mask)"
                                        href="#background"
                                    ></use>
                                </mask>

                                <!-- gradients for the moon and craters -->
                                <radialGradient id="gradient-moon">
                                    <stop
                                        stop-color="#fdfdfd"
                                        offset="0.7"
                                    ></stop>
                                    <stop
                                        stop-color="#e2e2e2"
                                        offset="1"
                                    ></stop>
                                </radialGradient>

                                <radialGradient id="gradient-crater">
                                    <stop
                                        stop-color="#e0e0e0"
                                        offset="0"
                                    ></stop>
                                    <stop
                                        stop-color="#d9d9d9"
                                        offset="1"
                                    ></stop>
                                </radialGradient>

                                <!-- pattern for the stars -->
                                <pattern
                                    id="pattern-dark"
                                    width="0.2"
                                    height="1"
                                    viewBox="0 0 20 45"
                                >
                                    <path
                                        fill="#fff"
                                        d="M 2 5 l 1 1 l -1 1 l -1 -1 l 1 -1"
                                    ></path>
                                    <path
                                        fill="#fff"
                                        d="M 10 16 l 1 1 l -1 1 l -1 -1 l 1 -1"
                                    ></path>
                                    <path
                                        fill="#fff"
                                        d="M 16 27 l 1 1 l -1 1 l -1 -1 l 1 -1"
                                    ></path>
                                    <path
                                        fill="#fff"
                                        d="M 10 38 l 1 1 l -1 1 l -1 -1 l 1 -1"
                                    ></path>
                                </pattern>
                            </defs>

                            <!-- actual graphics
                                      the idea is to include the elements for the light variant on top of the dark counterpart and change the opacity when the input is toggled
                                      ! beside changing the opacity of the .light elements the transition also affects the position of the sun/moon and of the patterns
                                  -->
                            <g transform="translate(5 2.5)">
                                <g clip-path="url(#clip)">
                                    <g class="dark">
                                        <use
                                            fill="url(#gradient-dark)"
                                            href="#background"
                                        ></use>
                                        <!-- translate the stars above the toggle
                                              ! the change in y scale allows to transition the stars with a faster pace (see the CSS)
                                              -->
                                        <g
                                            class="background"
                                            transform="translate(0 -40) scale(1 0.4)"
                                        >
                                            <rect
                                                transform="translate(-40 0) rotate(4)"
                                                fill="url(#pattern-dark)"
                                                x="0"
                                                y="0"
                                                width="100"
                                                height="45"
                                            ></rect>
                                        </g>
                                        <use
                                            mask="url(#mask-dark)"
                                            fill="url(#gradient-dark)"
                                            href="#background"
                                        ></use>
                                    </g>
                                    <g class="light">
                                        <use
                                            fill="url(#gradient-light)"
                                            href="#background"
                                        ></use>
                                        <!-- translate the waves above the toggle and reset their position with an opposite translation
                                              by translating the first group to 0 (alongside the stars) the waves are pushed below
                                              -->
                                        <g
                                            class="background"
                                            transform="translate(-30 -20)"
                                        >
                                            <g transform="translate(30 20)">
                                                <rect
                                                    fill="url(#pattern-light)"
                                                    x="-5"
                                                    y="27.5"
                                                    width="100"
                                                    height="45"
                                                ></rect>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>

                            <g transform="translate(77.5 22.5)">
                                <!-- translate this group to move the sun/moon to the right -->
                                <g class="translate" transform="translate(-55)">
                                    <!-- rotate this group to rotate the moon -->
                                    <g class="rotate" transform="rotate(-100)">
                                        <g class="dark">
                                            <circle
                                                fill="url(#gradient-moon)"
                                                cx="0"
                                                cy="0"
                                                r="20.5"
                                            ></circle>
                                            <g transform="translate(-8 -7.5)">
                                                <ellipse
                                                    transform="rotate(-30)"
                                                    fill="url(#gradient-crater)"
                                                    stroke="#d5d5d5"
                                                    stroke-width="0.2"
                                                    cx="0"
                                                    cy="0"
                                                    rx="4"
                                                    ry="3"
                                                ></ellipse>
                                            </g>
                                            <g transform="translate(11 5)">
                                                <ellipse
                                                    fill="url(#gradient-crater)"
                                                    stroke="#d5d5d5"
                                                    stroke-width="0.2"
                                                    cx="0"
                                                    cy="0"
                                                    rx="3.85"
                                                    ry="4"
                                                ></ellipse>
                                            </g>
                                            <g transform="translate(-6 12)">
                                                <ellipse
                                                    transform="rotate(-10)"
                                                    fill="url(#gradient-crater)"
                                                    stroke="#d5d5d5"
                                                    stroke-width="0.2"
                                                    cx="0"
                                                    cy="0"
                                                    rx="2"
                                                    ry="1.75"
                                                ></ellipse>
                                            </g>
                                        </g>
                                    </g>
                                    <g class="light">
                                        <circle
                                            fill="#FFD21F"
                                            cx="0"
                                            cy="0"
                                            r="21"
                                            filter="url(#blur-light)"
                                        ></circle>
                                        <circle
                                            fill="#FFD21F"
                                            cx="0"
                                            cy="0"
                                            r="20.5"
                                        ></circle>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </label>
                    <!-- End Of Switches -->
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Collection</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Menu</a></li>
                    </ul>
                    <div class="strip"></div>
                </nav>
            </header>
</body>