<?php 
    require_once('crud/server.php');
    session_start();

    if (!isset($_SESSION["username"])) {
        header('location: start.php');
    }

    if (isset($_GET["logout"])) {
        session_destroy();
        unset($_SESSION["username"]);
        header('location: start.php');
    }


    if (isset($_REQUEST['subjid'])) {
        $subjid = $_REQUEST['subjid'];
        $subject_stmt = $db->prepare('SELECT * FROM `subj` WHERE subjid = :subjid');
        $subject_stmt -> bindParam(':subjid',$subjid);
        if ($subject_stmt -> execute()) {
            $subjrow = $subject_stmt->fetch(PDO::FETCH_ASSOC);
        }
    } else {
        header('location: index.php');
    }

    $frn = $subjrow['friendlyname'];

    $username = $_SESSION["username"];
    

    $select_stmt = $db->prepare("SELECT * FROM `users` WHERE username = :username");
    $select_stmt->bindParam(':username', $username);
    $select_stmt->execute();
    $row1 = $select_stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($_GET['requests'])) {
        $make_request_stmt = $db -> prepare("UPDATE `users` SET `$frn` = 1 WHERE id = :id");
        $make_request_stmt -> bindParam(':id', $row1['id']);
        if ($make_request_stmt -> execute()) {
            $login = $_SESSION["username"];
                    $date = date('Y-m-d H:i:s');
                    $actions = 'Made a request for ' . $frn;
                    $action = $db -> prepare ("INSERT INTO `transactions` (`dates`,`username`,`action`) VALUES (:dates,:logins,:actions)");
                    $action -> bindParam(':dates', $date);
                    $action -> bindParam(':logins', $login);
                    $action -> bindParam(':actions', $actions);
                    if ($action -> execute()) {
                        $id = $row1['id'];
                        $insert_request = $db -> prepare("INSERT INTO `requests` (`dates`, `id`, `username`, `access`) VALUES (:dates, :id, :username, :frn)");
                        $insert_request -> bindParam(':dates',$date);
                        $insert_request -> bindParam(':id',$id);
                        $insert_request -> bindParam(':username',$username);
                        $insert_request -> bindParam(':frn',$frn);
                        if ($insert_request -> execute()) {
                            header('location: subj.php?subjid=' . $subjid);
                        }
                        
                    }
        }
    }
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
        <h1 class="pagetitle"><strong><?php echo $subjrow['friendlyname'] ?></strong><i class="fas fa-user-circle userprofile"></i></h1>

        <hr>

        





        <div class="box transparentbox onlandscape">
            <p><strong>โปรทิป:</strong> Tinagrit Study ทำงานได้ดีกว่าในหน้าจอแคบ</p>
        </div>
        <div class="box transparentbox onprint">
            <p>เว็ปนี้ไม่ได้ออกแบบมาเพื่อการพิมพ์ อาจเกิดข้อผิดพลาดในการแสดงผลข้อมูล</p>
        </div>
        



        <div class="bottomHeight"></div>
        <div class="tabs">
            <hr style="margin: 0.5px 0 0 0">
            <div class="download">
                <?php  if ($row1["$frn"] == 0) : ?>
                <div class="download-button download-button-blue">
                    <h2>ส่งคำขอ</h2>
                </div>
                <?php elseif ($row1["$frn"] == 1) : ?>
                <div class="download-button download-button-gray">
                    <h2>อยู่ในคิว</h2>
                </div>
                <?php elseif ($row1["$frn"] == 2) : ?>
                <div class="download-button download-button-green">
                    <h2>ดาวน์โหลด</h2>
                </div>
                <?php elseif ($row1["$frn"] == 3) : ?>
                <div class="download-button download-button-red">
                    <h2>ถูกปฏิเสธ</h2>
                </div>
                <?php endif ?>
            </div>
            <ul class='tabs-nav '>
                <li class="tabs-li"><div><i class="fas fa-home"></i><br><span class='navdesc'>Home</span></div></li>
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