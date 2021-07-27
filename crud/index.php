<?php 
    require_once('server.php');
    session_start();

    if (!isset($_SESSION["username"])) {
        header('location: ../start.php');
    }

    try {
        $login = $_SESSION['username'];
        $select_stmt = $db->prepare("SELECT * FROM `users` WHERE username = :username");
        $select_stmt->bindParam(':username', $login);
        $select_stmt->execute();
    
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
    
    } catch(PDOException $e) {
        $e->getMessage();
    }
    
    if ($roles != 'Admin') {
        header('location: ../start.php');
    }

    if (isset($_GET["logout"])) {
        session_destroy();
        unset($_SESSION["username"]);
        header('location: ../start.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Tinagrit Study</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="crud.css">
</head>
<body>
    <div class="main" style='padding: 0 10px; max-width: 800px; display: block; margin: 0 auto 0 auto'>
    <h1 style='margin-bottom: 0;'>Requests</h1>
    <p style="margin-top: 0"><a href="usm.php" style='color: blue;' >Go to User Management</a></p>
    <p>Administrator: <?php echo $username ?></p>
    <table>
    <colgroup>
            <col span='1' style='width: 20%'>
            <col span='1' style='width: 10%'>
            <col span='1' style='width: 30%'>
            <col span='1' style='width: 30%'>
            <col span='1' style='width: 5%'>
            <col span='1' style='width: 5%'>
        </colgroup>
        <thead>
            <tr>
                <th><strong>Date</strong></th>
                <th><strong>ID</strong></th>
                <th><strong>Username</strong></th>
                <th><strong>Request</strong></th>
                <th colspan=2><strong>Action</strong></th>

            </tr>
        </thead>
        <tbody>
            <?php 
            
                $select_stmt = $db -> prepare ("SELECT * FROM `requests`");
                $select_stmt -> execute();

                while ($row = $select_stmt -> fetch(PDO::FETCH_ASSOC)) {

                
            
            ?>

            <tr>
                <td><?php echo $row['dates']?></td>

                <?php if ($row['username'] == 'tinagrit') :?>
                    <td><?php $originalId = $row['id']; echo 'MULLL'; ?></td>

                <?php elseif ($row['username'] == 'gnnill_') : ?>
                    <td><?php $originalId = $row['id']; echo 'LLLMU'; ?></td>

                <?php elseif ($row['username'] == 'root') : ?>
                    <td><?php $originalId = $row['id']; echo 'R'; ?></td>


                <?php else :?>
                    <td><?php $originalId = $row['id']; echo strtoupper(substr(md5($originalId), -5)); ?></td>
                <?php endif ?>
                
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['access']?></td>
                <td><a href="action.php?approve=<?php echo $row['reqid']; ?>" class='btn btnsuccess'><i class="fas fa-check-circle "></td>
                <td><a href="action.php?reject=<?php echo $row['reqid']; ?>" class='btn btndanger'><i class="fas fa-times-circle"></td>
            </tr>


            <?php } ?>
        </tbody>
    </table>
    </div>
    <div class="bottomHeight"></div>
    <div class="tabs">
        <hr style="margin: 0; height: 1px; padding: 0">
        <div class="contents">
            <ul class='tabs-nav'>
                <li class="tabs-li-crud">
                    <div><i class="fas fa-home"></i><br><span class='navdesc'>Home</span></div>
                </li>
                <li class="tabs-li-crud tabs-nav-selected">
                    <div><i class="fas fa-tools"></i><br><span class='navdesc'>Tools</span></div>
                </li>
                <li class="tabs-li-crud">
                    <div><i class="fas fa-user"></i><br><span class='navdesc'>Account</span></div>
                </li>
            </ul>
        </div>
    </div>
    <script src="../index.js"></script>

    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>