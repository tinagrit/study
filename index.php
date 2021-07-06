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
<html lang="en" translate="no">

<head>
    <meta charset="UTF-8">
    <meta name="google" content="notranslate">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinagrit Study (Development Mode)</title>
    <meta name="description" content="Tinagrit Study for Exams">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="logo/favicon.png">
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

    <div class="head">
        <div class="header darkbluegradient">
            <div class="contents" >
                <h1 class="pagetitle"><strong>Study</strong><i class="fas fa-user-circle userprofile"></i></h1>

                <hr>
                <div class="headcontent" data-transition='true'>
                    <h1 style="margin: 0; padding-left: 25px">content</h1>
                </div>
                
            </div>

        </div>
        <div class="headerbottom darkbluegradient">
            <div class='scrolldown' data-transition='true'></div>
        </div>
    </div>









    <div class="contents">
        <div class="box transparentbox onprint">
            <p>เว็ปนี้ไม่ได้ออกแบบมาเพื่อการพิมพ์ อาจเกิดข้อผิดพลาดในการแสดงผลข้อมูล</p>
        </div>
        <?php if (!isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'on') : ?>
        <div class="box redgradient" data-transition='true'>
            <h1><i class="fas fa-unlock" style="margin-right:10px"></i> การเชื่อมต่อไม่ปลอดภัย</h1>
            <p>Tinagrit Study รันบนโปรโตคอลที่ปลอดภัย (HTTPS)
                การเชื่อมต่อในลักษณะนี้อาจทำให้ไม่สามารถแสดงผลข้อมูลบางอย่างได้</p>
            <div class="buttonarrow">
                <a href="https://study.tinagrit.com"><i class="fas fa-arrow-right"></i>
                    <p>ลองใหม่อีกครั้ง</p>
                </a>
            </div>
        </div>
        <?php endif ?>

        <div class="padd" data-transition='true'>
            <h1 class="textCenter" >ตารางสอบ</h1>
        </div>

        <div class="tableContainer" data-transition='true'>
            <table>
                <thead>
                    <tr>
                        <th>วันที่</th>
                        <th colspan='2'>เวลา</th>
                        <th>วิชา</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>จ. 20 ก.ค. 2564</td>
                        <td>8:40 - 9:40</td>
                        <td>(1:00 ชั่วโมง)</td>
                        <td>คณิตศาสตร์</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>10:00 - 11:30</td>
                        <td>(1:30 ชั่วโมง)</td>
                        <td>ภาษาอังกฤษ</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>13:00 - 14:30</td>
                        <td>(1:30 ชั่วโมง)</td>
                        <td>ภาษาไทย</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <link rel="stylesheet" href="timeline.css">
    </div>
    <div class="table-timeline-wrap " data-transition='true'>
        <table class="table-timeline" cellspacing='0'>
            <colgroup>
                <col width="80px">
                <col width="120px">
                <col width="120px">
                <col width="180px">
                <col width="120px">
                <col width="120px">
                <col width="60px">

                <col width="20px">

                <col width="180px">
                <col width="120px">
                <col width="120px">
                <col width="120px">
                <col width="60px">

                <col width="20px">

                <col width="240px">
                <col width="180px">
                <col width="120px">

                <col width="120px">
            </colgroup>
            <tbody>
                <tr>
                    <th></th>
                    <td colspan='6' class="time day" style="background-color: #FF8474;">
                        วันอังคารที่ 30 มี.ค. 64
                    </td>
                    <td colspan='6' class="time day" style="background-color: #F5A962;">
                        วันพฤหัสบดีที่ 1 เม.ย. 64
                    </td>
                    <td colspan='4' class="time day" style="background-color: #FFC947;">
                        วันจันทร์ที่ 5 เม.ย. 64
                    </td>
                    <td rowspan='8'></td>
                </tr>
                <tr>
                    <th></th>

                    <!-- DAY 1 -->
                    <td class="time">8:40 - 9:40</td>
                    <td class="time">9:50 - 10:50</td>
                    <td class="time">11:00 - 12:30</td>
                    <td class="time">13:40 - 14:40</td>
                    <td class="time">14:50 - 15:50</td>
                    <td class="time">- 16:20</td>

                    <!-- DAY 2 -->
                    <td></td>
                    <td class="time">8:40 - 10:10</td>
                    <td class="time">10:20 - 11:20</td>
                    <td class="time">11:30 - 12:30</td>
                    <td class="time">13:30 - 14:30</td>
                    <td class="time">- 15:00</td>

                    <!-- DAY 3 -->
                    <td></td>
                    <td class="time">8:40 - 10:40</td>
                    <td class="time">10:50 - 12:20</td>
                    <td class="time">13:30 - 14:30</td>
                </tr>
                <tr>
                    <th>ห้อง 1</th>

                    <!-- DAY 1 -->
                    <td rowspan='6' style="background-color: #008b8b">ภาษาไทย</td>
                    <td rowspan='6' style="background-color: #483d8b">ประวัติศาสตร์</td>
                    <td rowspan='6' style="background-color: #CD113B">ภาษาอังกฤษ</td>
                    <td rowspan='6' style="background-color: #3C8DAD">ภาษาอังกฤษ<br>เพิ่มเติม</td>
                    <td rowspan='1' colspan='2' style="background-color: #03256C">กลศาสตร์</td>

                    <!-- DAY 2 -->
                    <td rowspan='6'></td>
                    <td rowspan='1' style="background-color: #00ADB5">ความน่าจะเป็น</td>
                    <td rowspan='6' style="background-color: #B83B5E">สังคมศึกษา</td>
                    <td></td>
                    <td rowspan='1' colspan='2' style="background-color: #FCE38A">ปริมาณสัมพันธ์</td>

                    <!-- DAY 3 -->
                    <td rowspan='6'></td>
                    <td rowspan='1' style="background-color: #3C8DAD">ความสัมพันธ์และฟังก์ชัน</td>
                    <td rowspan='1' style="background-color: #F8B595; font-size: smaller;">พันธุศาสตร์และวิวัฒนาการ</td>
                    <td rowspan='2' style="background-color: #005792">โลก ดาราศาสตร์<br>และอวกาศ</td>
                </tr>
                <tr>
                    <th>ห้อง 2-3</th>

                    <!-- DAY 1 -->
                    <td rowspan='1' colspan='2' style="background-color: #FF96AD">ฟิสิกส์เพิ่มเติม</td>

                    <!-- DAY 2 -->
                    <td rowspan='5' style="background-color: #1FAB89">คณิตศาสตร์</td>
                    <td></td>
                    <td rowspan='1' colspan='2' style="background-color: #3F72AF">เคมีเพิ่มเติม</td>

                    <!-- DAY 3 -->
                    <td rowspan='2' style="background-color: #4ECCA3">คณิตศาสตร์เพิ่มเติม</td>
                    <td rowspan='1' style="background-color: #F38181">ชีววิทยาเพิ่มเติม</td>
                </tr>
                <tr>
                    <th>ห้อง 4</th>

                    <!-- DAY 1 -->
                    <td rowspan='2' style="background-color: #962D2D; font-size: smaller;">เปิดประตูสู่อาเซียน</td>

                    <!-- DAY 2 -->
                    <td></td>
                    <td rowspan='4' style="background-color: #FF9A00">วิทยาศาสตร์</td>
                    <td rowspan='2' style="background-color: #6639A6">ภาษาอังกฤษ<br>ฟัง-พูด</td>
                </tr>
                <tr>
                    <th>ห้อง 5-7</th>

                    <!-- DAY 1 -->

                    <!-- DAY 2 -->

                </tr>
                <tr>
                    <th>ห้อง A วิทย์</th>

                    <!-- DAY 1 -->
                    <td rowspan='1' colspan='2' style="background-color: #907FA4">ฟิสิกส์</td>

                    <!-- DAY 2 -->
                    <td rowspan='1' colspan='2' style="background-color: #008b8b">เคมี</td>

                    <!-- DAY 3 -->
                    <td rowspan='2' style="background-color: #39A2DB">คณิตศาสตร์เพิ่มเติม</td>
                    <td rowspan='1' style="background-color: #FFA900">ชีววิทยา</td>

                </tr>
                <tr>
                    <th>ห้อง A ศิลป์</th>

                    <!-- DAY 1 -->
                    <td rowspan='1' style="background-color: #962D2D; font-size: smaller;">เปิดประตูสู่อาเซียน</td>

                    <!-- DAY 2 -->
                    <td></td>
                    <td rowspan='1' colspan='2' style="background-color: #F73859">IELTS</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="contents" data-transition='true'>
        <p class="textCenter padd switchTable" style="margin-top: 15px;" >ถ้าการแสดงผลดูแปลกๆ คลิกที่นี่ เพื่อดูแบบตาราง
        </p>
    </div>










    <div class="bottomHeight"></div>
    <div class="tabs" style="z-index: 4;">
        <hr style="margin: 0; height: 1px; padding: 0">
        <div class="contents">
            <ul class='tabs-nav'>
                <li class="tabs-li tabs-nav-selected">
                    <div><i class="fas fa-home"></i><br><span class='navdesc'>Home</span></div>
                </li>
                <li class="tabs-li">
                    <div><i class="fas fa-tools"></i><br><span class='navdesc'>Tools</span></div>
                </li>
                <li class="tabs-li">
                    <div><i class="fas fa-user"></i><br><span class='navdesc'>Account</span></div>
                </li>
            </ul>
        </div>


    </div>

    <script>
        function isIE() {
            var ua = window.navigator.userAgent; //Check the userAgent property of the window.navigator object
            var msie = ua.indexOf('MSIE '); // IE 10 or older
            var trident = ua.indexOf('Trident/'); //IE 11

            return (msie > 0 || trident > 0);
        }

        if (isIE()) {
            window.location.href = "https://study.tinagrit.com/ie.html";
        }
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="ios.js"></script>
    <script src="index.js"></script>
</body>

</html>