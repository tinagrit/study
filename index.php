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

    $restricted = array('tinagrit','gnnill_','root');
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
    <title>หน้าหลัก - Tinagrit Study</title>
    <meta name="description" content="Tinagrit Study for Exams">
    <meta name="theme-color" content="#0059ff">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="timeline.css">
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="logo/favicon.png">
    <link rel="apple-touch-icon" href="logo/apple-touch-icon.png">
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

    <header>


        <div class="head">
            <div class="header darkbluegradient">
                <div class="contents">
                    <h1 class="pagetitle"><strong>Study</strong><i class="fas fa-user-circle userprofile"></i></h1>

                    <hr>
                    <div class="headcontent count" data-transition='true'>
                        <p class="textCenter welcome" style="margin: 0;">สวัสดี <?php echo $_SESSION['username'] ?>!</p>
                        <div class="subjects">
                            <h1 class="subjfrn textCenter"></h1>
                        </div>
                        <p class="subjfrn textCenter subjdate"></p>
                        <div class="countdown">
                            <div class="time-con time-day">
                                <div class="loader"></div>
                                <h1>99</h1>
                                <p>วัน</p>
                            </div>
                            <div class="time-con time-hour">
                                <div class="loader"></div>
                                <h1>23</h1>
                                <p>ชั่วโมง</p>
                            </div>
                            <div class="time-con time-min">
                                <div class="loader"></div>
                                <h1>59</h1>
                                <p>นาที</p>
                            </div>
                            <div class="time-con time-sec">
                                <div class="loader"></div>
                                <h1>59</h1>
                                <p>วินาที</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="headerbottom darkbluegradient">
                <div class='scrolldown' data-transition='true'></div>
            </div>
        </div>
    </header>









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

        <div class="padd onExamActive" data-transition='true'>
            <h1 class="textCenter">ตารางสอบ</h1>
        </div>

        <div class="tableContainer onExamActive" data-transition='true'>
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


    </div>
    <div class="table-timeline-wrap onExamActive scroller" data-transition='true'>
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

    <div class="contents textCenter" data-transition='true'>
        <p class="textCenter padd switchTable onExamActive" style="margin-top: 15px; margin-bottom: 10px;">ถ้าการแสดงผลดูแปลกๆ คลิกที่นี่
            เพื่อดูแบบตาราง
        </p>


        <div class="testRoom onExamActive">
            <h1 class="textCenter" style="margin: 30px 0 0 0;">ห้องสอบ</h1>
            <select id="roomSelect">
                <option value="" selected disabled>เลือกห้อง</option>
                <option value="1">ห้อง 1</option>
                <option value="2">ห้อง 2</option>
                <option value="3">ห้อง 3</option>
                <option value="4">ห้อง 4</option>
                <option value="5">ห้อง 5</option>
                <option value="6">ห้อง 6</option>
                <option value="7">ห้อง 7</option>
                <option value="8">ห้อง A</option>
            </select>
            <select id="numberSelect">
                <option value="" id='optionRoomOne' selected disabled>เลือกเลขที่</option>
            </select>
            <div class="box greengradient">
                <h1 class="textCenter" style="margin: 0;">สอบห้อง </h1>
            </div>
        </div>
        




    </div>








    <div class="older">

        <h1 class="textCenter" style="margin: 0 0 0 0;">ม.3 เทอม 2</h1>


        <div class="scroller fileList" data-transition='true'>
            <div class="fileListChild">
                <div class="filecard transparentbox">
                    <h1>ภาษาไทย</h1>
                    <p>สรุป - หลิงหลิง</p>
                    <ul>
                        <li>ความสมเหตุสมผล การลำดับความ และความเป็นไปได้ของเรื่อง</li>
                        <li>แสดงความคิดเห็นโต้แย้ง</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox">
                    <h1>คณิตศาสตร์</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>วงกลม</li>
                        <li>ความน่าจะเป็น</li>
                        <li>สถิติ</li>
                        <ul>
                            <li>แผนภาพกล่อง</li>
                        </ul>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox">
                    <h1>สังคมศึกษา</h1>
                    <p>สรุป - หลิงหลิง</p>
                    <ul>
                        <li>กลไลราคาในระบบเศรษฐกิจ</li>
                        <li>บทบาทหน้าที่ของรัฐบาลในระบบเศรษฐกิจ</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox">
                    <h1>วิทยาศาสตร์</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>แสงและการมองเห็น</li>
                        <ul>
                            <li>การสะท้อนของแสง</li>
                            <li>การหักเหของแสง</li>
                        </ul>
                        <li>ปฏิสัมพันธ์ในระบบสุริยะ</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox" style="width: 230px">
                    <h1>วิทยาศาสตร์เพิ่มเติม</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>พลังงานนิวเคลียร์</li>
                        <li>ดาราศาสตร์และอวกาศ</li>
                        <ul>
                            <li>ระบบสุริยะ</li>
                        </ul>
                        <li>แสงและการมองเห็น</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
            </div>
        </div>

        <div class="contents textCenter">
            <h1 style="margin: 30px 0 0 0;">ม.3 เทอม 1</h1>
        </div>
        <div class="scroller fileList">
            <div class="fileListChild">
                <div class="filecard transparentbox">
                    <h1>คณิตศาสตร์</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>การแยกตัวประกอบ</li>
                        <li>สมการกำลังสอง</li>
                        <li>พาราโบล่า</li>
                        <li>อสมการ</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox">
                    <h1>ภาษาอังกฤษ</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>กาลเวลา</li>
                        <li>ข้อเท็จจริง</li>
                        <li>ความคิดเห็น</li>
                        <li>กริยาทั่วไป</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox">
                    <h1>วิทยาศาสตร์</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>พอลิเมอร์</li>
                        <li>เซรามิค</li>
                        <li>วัสดุผสม</li>
                        <li>ปฏิกิริยาเคมี</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox" style="width: 250px">
                    <h1>วิทยาศาสตร์ (คำถาม)</h1>
                    <p>คำถาม - TinagritProject</p>
                    <ul>
                        <li>พอลิเมอร์</li>
                        <li>เซรามิค</li>
                        <li>วัสดุผสม</li>
                        <li>ปฏิกิริยาเคมี</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox">
                    <h1>คณิตศาสตร์</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>อสมการ</li>
                        <li>สมการเชิงเส้นสองตัวแปร</li>
                        <li>พื้นที่ผิว</li>
                        <li>ปริมาตร</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox" style="width: 250px">
                    <h1>คณิตศาสตร์ (คำถาม)</h1>
                    <p>คำถาม - TinagritProject</p>
                    <ul>
                        <li>อสมการ</li>
                        <li>สมการเชิงเส้นสองตัวแปร</li>
                        <li>พื้นที่ผิว</li>
                        <li>ปริมาตร</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox">
                    <h1>ภาษาอังกฤษ</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>การอ่านคำสนทนา</li>
                        <li>แกรมม่า</li>
                        <li>กาลเวลา</li>
                        <li>การเขียน</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
            </div>
        </div>

        <div class="contents textCenter">
            <h1 style="margin: 30px 0 0 0;">ม.2 เทอม 2</h1>
        </div>
        <div class="scroller fileList">
            <div class="fileListChild">
                <div class="filecard transparentbox">
                    <h1>สังคมศึกษา</h1>
                    <p>สรุป - หลิงหลิง</p>
                    <ul>
                        <li>เครื่องมือทางภูมิศาสตร์</li>
                        <li>ปัจจัยทางกายภาพ</li>
                        <li>ปัจจัยทางสังคม</li>
                        <li>ทวีป</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox">
                    <h1>วิทยาศาสตร์</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>เชื้อเพลิงซากดึกดำบรรพ์</li>
                        <li>การผุพัง การกร่อน การสะสมตัว</li>
                        <li>สมบัติของดินและนํ้า</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox">
                    <h1>ภาษาไทย</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>คุณค่าจากวรรณคดี</li>
                        <li>ข้อคิดจากวรรณคดี</li>
                        <li>ประเมินคุณค่าจากการอ่าน</li>
                        <li>อธิบายคุณค่าของวรรณคดี</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox" style="width: 250px">
                    <h1>วิทยาศาสตร์เพิ่มเติม</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>ประเภทโครงงาน</li>
                        <li>สมมติฐาน</li>
                        <li>ตัวแปร</li>
                        <li>แผงโครงงาน</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox" style="width: 250px">
                    <h1>คณิตศาสตร์เพิ่มเติม</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>การประยุกต์พื้นที่ผิวและปริมาตร</li>
                        <li>เส้นขนาน</li>
                        <li>สถิติ</li>
                        <li>ความน่าจะเป็น</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox">
                    <h1>การงานอาชีพ</h1>
                    <p>สรุป - หลิงหลิง</p>
                    <ul>
                        <li>งานธุรกิจ</li>
                        <li>การติดต่อสื่อสาร</li>
                        <li>การจัดการผลผลิต</li>
                        <li>ทักษะการประกอบอาชีพ</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox">
                    <h1>ประวัติศาสตร์</h1>
                    <p>สรุป - หลิงหลิง</p>
                    <ul>
                        <li>การสถาปนากรุงธนบุรี</li>
                        <li>การสร้างเสถียรภาพ</li>
                        <li>ภูมิปัญญาไทย</li>
                        <li>บุคคลสำคัญ</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox">
                    <h1>คณิตศาสตร์</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>พื้นที่ผิวและปริมาตร</li>
                        <li>เส้นขนาน</li>
                        <li>สถิติ</li>
                        <li>ความน่าจะเป็น</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox">
                    <h1>สุขศึกษา</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>การสร้างเสริมสุขภาพ</li>
                        <li>เทคโนโลยี</li>
                        <li>สุขภาพกาย จิต</li>
                        <li>สมรรถภาพร่างกาย</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox">
                    <h1>ศิลปะพื้นฐาน</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>งานทัศนศิลป์โฆษณา</li>
                        <li>วัฒนธรรมไทย</li>
                        <li>การวิจารณ์</li>
                        <li>การวาดภาพบุคลิก</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>
                <div class="filecard transparentbox">
                    <h1>ภาษาอังกฤษ</h1>
                    <p>สรุป - TinagritProject</p>
                    <ul>
                        <li>การสนทนา</li>
                        <li>การอ่าน</li>
                        <li>การเขียน</li>
                        <li>แกรมม่า</li>
                    </ul>
                    <p class="textCenter">...</p>
                </div>








            </div>
        </div>

        <p class="read-more"><a class="button button-rm">ดูเพิ่มเติม</a></p>

        <div class="read-less-btn">
            <p class="read-less"><a class="button button-rl">ย่อลง</a></p>
        </div>
        <div style="height: 20px;"></div>
    </div>

    <div class="contents">
        <div class="btnb" style="position:relative" data-transition='true'>
            <div style="height: 40px;"><i class="fas fa-tools fa-4x background-tools"></i></div>
            <div class="box greengradient">
                <h1><i class="fas fa-arrow-right"></i> เครื่องมือและแอพ</h1>

            </div>
        </div>
        <div class="btnb" style="position:relative" data-transition='true'>
            <div style="height: 0;"><i class="fas fa-user fa-4x background-tools background-account"></i></div>
            <div class="box yellowgradient">
                <h1><i class="fas fa-arrow-right"></i> จัดการบัญชี</h1>

            </div>
        </div>
    </div>

    <div class="credits">
        <p style="margin-bottom: 15px;">© TinagritProject (2021)</p>
        <p><a href="policy.html"><i class="fas fa-arrow-right" style="margin-right: 5px;"></i>นโยบายความเป็นส่วนตัวและข้อกำหนดการใช้บริการ</a></p>
        <p><a href="exams.json"><i class="fas fa-arrow-right" style="margin-right: 5px;"></i> API ตารางสอบ</a></p>
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
    <script src="exam.js"></script>
    <script src="ios.js"></script>
    <script src="index.js"></script>
</body>

</html>