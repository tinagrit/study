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

    $username = $_SESSION["username"];
    
    require_once('crud/server.php');
    $select_stmt = $db->prepare("SELECT * FROM `users` WHERE username = :username");
    $select_stmt->bindParam(':username', $username);
    $select_stmt->execute();
    $row1 = $select_stmt->fetch(PDO::FETCH_ASSOC);

    $id = $row1['id'];

    $_SESSION['id'] = $id;
    $restricted =  $_SESSION['restricted'];
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
    <link rel="stylesheet" href="crud/crud.css">
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
        <h1 class="pagetitle"><strong>Account</strong></h1>

        <hr>



        <!-- <div class="box transparentbox onlandscape">
            <p><strong>โปรทิป:</strong> Tinagrit Study ทำงานได้ดีกว่าในหน้าจอแคบ</p>
        </div> -->
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
            <a href="crud"><strong>REDIRECT TO CRUD</strong></a>
        </div> 



        <i class="fas fa-user-circle fa-4x profilepic"></i>
        <div class="username-profile">
            <h1><?php echo $username ?></h1>
            <h3>
                <?php if (in_array($username, $restricted)) {
                if($username == 'tinagrit') {
                    echo 'MULLL';
                } else if ($username == 'gnnill_') {
                    echo 'LLLMU';
                }
            } else {
                echo strtoupper(substr(md5($id), -5)); 
            }
            
            
            
            ?></h3>
        </div>
        <div style="height: 20px"></div>
        <hr>
        <h1 class="title-profile">คำขอที่อยู่ในคิว</h1>
        <div class="pendingRequestTable">
        <table class='pendingRequest'>
            <colgroup>
                <col span='1' style='width: 40%'>
                <col span='1' style='width: 30%'>
                <col span='1' style='width: 30%'>
            </colgroup>
            <thead>
                <tr>
                    <th><strong>วันที่</strong></th>
                    <th><strong>คำขอ</strong></th>
                    <th><strong>เปลี่ยนแปลง</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php 
            
                $select_stmt = $db -> prepare ("SELECT * FROM `requests` WHERE id=:id");
                $select_stmt -> bindParam(':id',$id);
                $select_stmt -> execute();

                while ($row = $select_stmt -> fetch(PDO::FETCH_ASSOC)) {

                
            
            ?>

                <tr>
                    <td><?php echo $row['dates']?></td>
                    <td><?php echo $row['access']?></td>

                    <td><a href="crud/action.php?deleteclient=<?php echo $row['reqid']; ?>" class='btn btndanger'><i class="fas fa-trash"></i> ลบทิ้ง</a></td>
                </tr>


                <?php } ?>
            </tbody>
        </table>

        </div>

        <div style="height: 20px"></div>     
        <hr>
        <h1 class="title-profile">สิทธิ์การเข้าถึง</h1>
        <div class="pendingRequestTable">
        <table class='pendingRequest'>
            <colgroup>
                <col span='1' style='width: 50%'>
                <col span='1' style='width: 50%'>
            </colgroup>
            <thead>
                <tr>
                    <th><strong>หัวข้อ</strong></th>
                    <th><strong>สิทธิ์การเข้าถึง</strong></th>
                </tr>
            </thead>
            <tbody>

                    <?php
                     
                     $ignore = array('USER','CURRENT_CONNECTIONS','TOTAL_CONNECTIONS','id','username','roles');
                     $get_col_name = $db->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'users'");
                     $get_col_name -> execute();
                     while ($column = $get_col_name -> fetch(PDO::FETCH_ASSOC)) {
                    
                    ?>

                        <?php if(!in_array($column['COLUMN_NAME'],$ignore)) : ?>
                            <tr>
                                <td><?php $colnow = $column['COLUMN_NAME']; echo $colnow ?></td>
                                <td><?php switch($row1["$colnow"]) {
                                    case '0':
                                        echo 'ไม่ได้ขอเข้าถึง';
                                        break;
                                    case '1':
                                        echo 'อยู่ในคิว';
                                        break;
                                    case '2':
                                        echo 'ถูกอนูญาต';
                                        break;
                                    case '3':
                                        echo 'ถูกปฏิเสธ';
                                        break;
                                } ?></td>
                            </tr>
                        <?php endif ?>
                    

                    
                     
                     
                     <?php }
                     
                     
                     
                     ?>

                </tr>
            </tbody>
        </table>

        

        </div>
        
        <div style="height: 20px;"></div>
        <hr style="margin-bottom: 0;">
        <p class="dangerButton logoutbutton">ออกจากระบบ</p>

        <?php if (in_array($username,$restricted)) : ?>
        <hr>
        <?php else : ?>
        <hr style="margin-bottom: 0;">
        <p class="dangerButton deletebutton">ลบบัญชี</p>
        <hr>
        <?php endif ?>


       
    </div>

    <div class="bottomHeight"></div>
    <div class="tabs">
        <hr style="margin: 0; height: 1px; padding: 0">
        <div class="contents">
            <ul class='tabs-nav'>
                <li class="tabs-li ">
                    <div><i class="fas fa-home"></i><br><span class='navdesc'>Home</span></div>
                </li>
                <li class="tabs-li">
                    <div><i class="fas fa-tools"></i><br><span class='navdesc'>Tools</span></div>
                </li>
                <li class="tabs-li tabs-nav-selected">
                    <div><i class="fas fa-user"></i><br><span class='navdesc'>Account</span></div>
                </li>
            </ul>
        </div>


    </div>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="index.js"></script>
</body>

</html>