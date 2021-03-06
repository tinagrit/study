<?php session_start();include('server.php') ;


if(isset($_SESSION['newuser'])) {
    $username = $_SESSION['newuser'];
}

if(isset($_SESSION['existinguser'])) {
    $username = $_SESSION['existinguser'];
}

function get_web_page( $url )
    {
        $user_agent='Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';

        $options = array(

            CURLOPT_CUSTOMREQUEST  =>"GET",        //set request type post or get
            CURLOPT_POST           =>false,        //set to GET
            CURLOPT_USERAGENT      => $user_agent, //set user agent
            CURLOPT_COOKIEFILE     =>"cookie.txt", //set cookie file
            CURLOPT_COOKIEJAR      =>"cookie.txt", //set cookie jar
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        );

        $ch      = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        $header  = curl_getinfo( $ch );
        curl_close( $ch );

        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;
        return $header;
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
        @media screen and (max-height: 440px) {
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
            <h1 style="margin-bottom: 5px; margin-top: 0;">?????????????????????????????????????????????</h1>
            <p style="margin-top: 5px;">???????????????????????????????????? 4 ?????????????????????????????????????????????????????????</p>


            <form method="post" action="register.php">

                <div class="passwordContainer">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password1" maxlength='1' id="password1" onkeyup="typePassword(this,'password2','password1')" autocomplete="off">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password2" maxlength='1' id="password2" onkeyup="typePassword(this,'password3','password1')" autocomplete="off">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password3" maxlength='1' id="password3" onkeyup="typePassword(this,'password4','password2')" autocomplete="off">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password4" maxlength='1' id="password4" onkeyup="typePassword(this,'password4','password3'); checkButton()" autocomplete="off">
                </div>

                <input name="username" style="display:none" value="<?php echo $username ?>">

                <?php
                
                $igurl = "https://instausername.com/availability?q=" . $username;
                $xml = get_web_page($igurl);
                $page = $xml['content'];

                if (strpos($page, 'is free') !== false) {
                    echo '<br><strong>????????????????????????? ???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? Instagram ?????????????????????????????????????????????????????????????????????????????????????????????????????????</strong>';
                }
                
                ?>

                <p style='text-align: center'>?????????????????????????????? Tinagrit Study ????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                
            <div class="buttonarrow">
                <a href="policy.html"><i class="fas fa-arrow-right" style="color: black; font-size: 15px; margin-bottom: 30px" ></i>
                    <p style="color: black; font-size: 15px;">????????????????????????????????????????????????????????????</p>
                </a>
            </div>

                <button type="submit" class="submitPasswordButton greengradient" name='enterpassword'>
                    <strong>???????????????</strong>
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
            <h1 style="margin-bottom: 5px; margin-top: 0;">????????????????????????????????????????????????</h1>
            <p style="margin-top: 5px;">??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>


            <form method="post" action="register.php">

                <div class="passwordContainer">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password1" maxlength='1' id="password1" onkeyup="typePassword(this,'password2','password1')" autocomplete="off">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password2" maxlength='1' id="password2" onkeyup="typePassword(this,'password3','password1')" autocomplete="off">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password3" maxlength='1' id="password3" onkeyup="typePassword(this,'password4','password2')" autocomplete="off">
                    <input type="number" min="0" max ="9" pattern="[0-9]{1}" class="passwordBox" name="password4" maxlength='1' id="password4" onkeyup="typePassword(this,'password4','password3'); checkButton()" autocomplete="off">
                </div>

                <input name="username" style="display:none" value="<?php echo $username ?>">

                <button type="submit" style="margin-top: 30px" class="submitPasswordButton greengradient" name='submitpassword'>
                    <strong>???????????????</strong>
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