<?php session_start();include('server.php') ;


if(isset($_SESSION['newuser'])) {
    $username = $_SESSION['newuser'];
}

if(isset($_SESSION['existinguser'])) {
    $username = $_SESSION['existinguser'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm - Tinagrit Study</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="logo/favicon.png">

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        @media screen and (max-height: 340px) {
            .onMiddle {
                display: block;
            }
        }
    </style>
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

    <?php if (isset($_SESSION['newuser'])) { ?>
    <div class="onMiddle">

    <div class="contents">

   
        <div class="textCenter" style="padding: 0 25px;">
            <h1 style="margin-bottom: 5px; margin-top: 0;">ขอเวลาครึ่งนาที</h1>
            <p style="margin-top: 5px;">ตั้งรหัสผ่าน 4 ตัวเพื่อความปลอดภัย</p>


            <form method="post" action="register.php">

                <div class="passwordContainer">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password1" maxlength='1' id="password1" onkeyup="typePassword(this,'password2','password1')" autocomplete="off">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password2" maxlength='1' id="password2" onkeyup="typePassword(this,'password3','password1')" autocomplete="off">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password3" maxlength='1' id="password3" onkeyup="typePassword(this,'password4','password2')" autocomplete="off">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password4" maxlength='1' id="password4" onkeyup="typePassword(this,'password4','password3'); checkButton()" autocomplete="off">
                </div>

                <input name="username" style="display:none" value="<?php echo $username ?>">

                <p style='text-align: center'>ด้วยการใช้ Tinagrit Study แสดงว่าคุณได้อ่านและทำความเข้าใจข้อกำหนดการให้บริการและนโยบายความเป็นส่วนตัวแล้ว</p>

            <div class="buttonarrow">
                <a href="policy.html"><i class="fas fa-arrow-right" style="color: black; font-size: 15px; margin-bottom: 30px" ></i>
                    <p style="color: black; font-size: 15px;">ข้อกำหนดการใช้บริการ</p>
                </a>
            </div>

                <button type="submit" class="submitPasswordButton greengradient" name='enterpassword'>
                    <strong>ไปต่อ</strong>
                </button>
                

            </form>

            
        </div>
    </div>
    </div>
    <?php } ?>

    <?php if (isset($_SESSION['existinguser'])) { ?>
    <div class="onMiddle">

    <div class="contents">

   
        <div class="textCenter" style="padding: 0 25px;">
            <h1 style="margin-bottom: 5px; margin-top: 0;">ยินดีต้อนรับกลับ</h1>
            <p style="margin-top: 5px;">ใส่รหัสผ่านที่คุณตั้งไว้เมื่อลงชื่อเข้าใช้ครั้งแรก</p>


            <form method="post" action="register.php">

                <div class="passwordContainer">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password1" maxlength='1' id="password1" onkeyup="typePassword(this,'password2','password1')" autocomplete="off">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password2" maxlength='1' id="password2" onkeyup="typePassword(this,'password3','password1')" autocomplete="off">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password3" maxlength='1' id="password3" onkeyup="typePassword(this,'password4','password2')" autocomplete="off">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password4" maxlength='1' id="password4" onkeyup="typePassword(this,'password4','password3'); checkButton()" autocomplete="off">
                </div>

                <input name="username" style="display:none" value="<?php echo $username ?>">

                <button type="submit" style="margin-top: 30px" class="submitPasswordButton greengradient" name='submitpassword'>
                    <strong>ไปต่อ</strong>
                </button>
                

            </form>

            
        </div>
    </div>
    </div>
    <?php } ?>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        let hasDeleted = 0;
        function typePassword(now,next,before) {
            if (now.value.length) {
                now.style.backgroundColor = 'black';
                document.getElementById(next).focus();
            } else {
                if ((document.getElementById('password4') === document.activeElement)) {
                    

                    if (hasDeleted == 1) {
                        document.getElementById(before).value = '';
                        document.getElementById(before).style.backgroundColor = 'white';
                        document.getElementById(before).focus();
                        hasDeleted = 0;
                    } else {
                        now.style.backgroundColor = 'white';
                        now.value = '';
                        now.focus();
                        hasDeleted = 1;
                    }
                       
                    
                } else {
                    document.getElementById(before).value = '';
                    document.getElementById(before).style.backgroundColor = 'white';
                    document.getElementById(before).focus();
                }

                
            }
        }
        function checkButton() {
            if ((document.getElementById('password1').value) && (document.getElementById('password2').value) && (document.getElementById('password3').value) && (document.getElementById('password4').value)) {
                document.querySelector('.submitPasswordButton').style.display = 'inline-block';
            } else {
                document.querySelector('.submitPasswordButton').style.display = 'none';
            }
        }

    </script>
</body>

</html>