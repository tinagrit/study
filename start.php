<?php  session_start(); include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinagrit Study</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="logo/favicon.png">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
    <div class="unsupported">
        <h1>Unsupported Display</h1>
        <p>This display is unsupported, which could break the website's styling.</p>
    </div>
    <div class="contents">
        <img src="" alt="" class="banner">
        <div class="textCenter" style="padding: 0 25px;">
            <h1 style="margin-bottom: 5px;">ยินดีต้อนรับสู่ Tinagrit Study</h1>
            <p style="margin-top: 5px;">เข้าสู่ระบบโดยกรอกชื่อผู้ใช้ Instagram ที่กล่องด้านล่าง</p>
            <?php if (isset($_SESSION['autherror'])) {
                echo "<p>" . $_SESSION['autherror'] ."</p>";
                session_destroy();
            } ?>


            <form method="post" action="register.php">

                <input type="text" class="usernameBox" name="username" placeholder="ชื่อผู้ใช้" autocomplete="off">
                <button type="submit" class="submitButton" name='reg_user'><i
                        class="fas fa-arrow-circle-right fa-3x"></i></button>
                <div class="captcha">
                    <div class="g-recaptcha" data-sitekey="6LepFGQbAAAAACTVcyB2J3zvkYPmUBCg7h6YpqGp"></div>
                </div>
                

            </form>


            <!-- <p style="margin-bottom: 0;"><span class="idDesc"></span><span class="usernameLive"></span><span
                    class="idDesc2"></span> <i class="fas fa-star starOnType" style="margin: 0 5px;"></i><span
                    class="idNum"></span><span class="idDesc3"></span></p> -->

            <br>
            <div class="buttonarrow"
                ><a href="policy.html"><i class="fas fa-arrow-right" style="color: black; font-size: 15px;" ></i>
                    <p style="color: black; font-size: 15px;">ข้อกำหนดการใช้บริการ</p>
                </a>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="register.js"></script>
</body>

</html>