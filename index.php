<?php 

    session_start();

    if (!isset($_SESSION["username"])) {
        header('location: start.php');
    }

    if (isset($_GET["logout"])) {
        session_destroy();
        unset($_SESSION["username"]);
        header('location: start.php');
    }

    $restricted = array('tinagrit','gnnill_');
    $_SESSION['restricted'] = $restricted;
    header('Access-Control-Allow-Origin: *');



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinagrit Study (Development Mode)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <noscript>
        <div class="fullscreen">
            <h1>JavaScript Not Enabled</h1>
            <p>This website requires JavaScript to run, please check your settings.</p>
            <style>
                .pagetitle {
                    margin: 0;
                }
            </style>
        </div>
    </noscript>
    <div class="fullscreen unsupported">
        <h1>Unsupported Display</h1>
        <p>This display is unsupported, which could break the website's styling.</p>
    </div>

    <div class="contents">
        <h1 class="pagetitle"><strong>Study</strong><i class="fas fa-user-circle userprofile"></i></h1>

        <hr>

        <div class="box bluegradient countdownbox">
            <?php if (isset($_SESSION["username"])) : ?>
            <h1>สวัสดี <?php echo $_SESSION["username"] ?></h1>
            <?php endif ?>
            <p>Paragraph</p>
        </div>





        <div class="box transparentbox onlandscape">
            <p><strong>โปรทิป:</strong> Tinagrit Study ทำงานได้ดีกว่าในหน้าจอแคบ</p>
        </div>
        <div class="box transparentbox onprint">
            <p>เว็ปนี้ไม่ได้ออกแบบมาเพื่อการพิมพ์ อาจเกิดข้อผิดพลาดในการแสดงผลข้อมูล</p>
        </div>
        <div class="box transparentbox">
            <h1>Dev Info</h1>
            <p><strong>***HIDE THIS ON PRODUCTION***</strong></p><br>
            <a href="index.php?logout=true"><strong>DESTROY SESSION</strong></a><br><br>
            <p><strong>USERNAME:</strong> <?php echo $_SESSION["username"] ?></p>
            <p><strong>USERROLE:</strong> <?php echo $_SESSION["role"] ?></p>
            <p><strong>SESSION ACTIVE:</strong> TRUE</p><br>
            <p><strong>CURRENT DB:</strong> BETA</p>
            <p><strong>PROTOCOL:</strong>
                <?php if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') { echo 'HTTPS'; } else {echo 'HTTP';} ?>
            </p>
            <p><strong>RESPONSE CODE:</strong> <?php  echo '200 OK'; ?></p><br>
            <a href="crud"><strong>REDIRECT TO CRUD</a>
        </div>
        <div class="box redgradient outbreak">
            <h1>การระบาดของ COVID-19</h1>
            <div class="Height15PX" style="height: 10px;"></div>
            <div class="covidnum">
                <strong>
                    <h1 class="covidnew">+ 0</h1>
                </strong>
            </div>
            <div class="Height15PX" style="height: 10px;"></div>
            <h1 class="covidtotal">ERROR</h1>
            <br>
            <div class="buttonarrow">
                <a href="https://covid19.tinagrit.com"><i class="fas fa-arrow-right"></i>
                    <p>ดูเพิ่มเติม</p>
                </a>
            </div>
        </div>
        
        <div class="box transparentbox">
            <h1>hello</h1>
            <p>content</p>
        </div>
        <div class="box transparentbox">
            <h1>hello</h1>
            <p>content</p>
        </div>
        <div class="box transparentbox">
            <h1>hello</h1>
            <p>content</p>
        </div>
        <div class="box transparentbox">
            <h1>hello</h1>
            <p>content</p>
        </div>
        <div class="box transparentbox">
            <h1>hello</h1>
            <p>content</p>
        </div>
        <div class="box transparentbox">
            <h1>hello</h1>
            <p>content</p>
        </div>
        <div class="box transparentbox">
            <h1>hello</h1>
            <p>content</p>
        </div>
        <div class="box transparentbox">
            <h1>hello</h1>
            <p>content</p>
        </div>



        <div class="bottomHeight"></div>
        <div class="tabs">
            <hr style="margin: 0.5px 0 0 0">
            <ul class='tabs-nav '>
                <li class="tabs-li tabs-nav-selected"><div><i class="fas fa-home"></i><br><span class='navdesc'>Home</span></div></li>
                <li class="tabs-li"><div><i class="fas fa-tools"></i><br><span class='navdesc'>Tools</span></div></li>
                <li class="tabs-li"><div><i class="fas fa-user"></i><br><span class='navdesc'>Account</span></div></li>
            </ul>
            
        </div>
    </div>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="ios.js"></script>
    <script src="index.js"></script>
</body>

</html>