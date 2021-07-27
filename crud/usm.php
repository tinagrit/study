<?php 
    require_once('server.php');
    session_start();

    if (!isset($_SESSION["username"])) {
        header('location: ../start.php');
    }

    if (isset($_GET["logout"])) {
        session_destroy();
        unset($_SESSION["username"]);
        header('location: ../start.php');
    }

    $restricted = $_SESSION['restricted'];
    $username = $_SESSION['username'];

?>

<?php 
    require_once('server.php');

    if (isset($_REQUEST['delete_user'])) {
        $id = $_REQUEST['delete_user'];

        $select_stmt = $db->prepare("SELECT * FROM `users` WHERE id = :id");
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        // Delete an original record from db
        $delete_stmt = $db->prepare('DELETE FROM `users` WHERE id = :id');
        $delete_stmt->bindParam(':id', $id);
        $delete_stmt->execute();

        $login = $_SESSION["username"];
        $date = date('Y-m-d H:i:s');
        $actions = 'Deleted ' . $row['username'];
        $action = $db -> prepare ("INSERT INTO `transactions` (`dates`,`username`,`action`) VALUES (:dates,:logins,:actions)");
        $action -> bindParam(':dates', $date);
        $action -> bindParam(':logins', $login);
        $action -> bindParam(':actions', $actions);
        $action -> execute();

        header('Location:usm.php');
    }

    if (!isset($_SESSION["username"])) {
        header('location: ../start.php');
    }

    try {
        $login = $_SESSION['username'];
        $select_stmt = $db->prepare("SELECT * FROM `users` WHERE username = :username");
        $select_stmt->bindParam(':username', $login);
        $select_stmt->execute();
    
        $now = $select_stmt->fetch(PDO::FETCH_ASSOC);
        extract($now);
    
    } catch(PDOException $e) {
        $e->getMessage();
    }
    
    if ($roles != 'Admin') {
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
    <h1 style='margin-bottom: 0;'>User Management</h1>
    <p style="margin-top: 0"><a href="index.php" style='color: blue;' >Go to Requests</a></p>
    
    <a href="add.php" style="color: white; background-color: green; padding: 5px; font-size: 15px; margin-bottom: 10px;">+ Add User</a>
    <p style="display: inline; margin-left: 15px">Administrator: <?php echo $username ?></p>
    <div style="height: 20px"></div>
    <table>
        <colgroup>
            <col span='1' style='width: 15%'>
            <col span='1' style='width: 40%'>
            <col span='1' style='width: 15%'>
            <col span='1' style='width: 15%'>
            <col span='1' style='width: 15%'>
        </colgroup>
        <thead>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Username</strong></th>
                <th><strong>Role</strong></th>
                <th colspan=2><strong>Modify</strong></th>

            </tr>
        </thead>
        <tbody>
            <?php 
            
                $select_stmt = $db -> prepare ("SELECT * FROM `users`");
                $select_stmt -> execute();

                while ($row = $select_stmt -> fetch(PDO::FETCH_ASSOC)) {

                
            
            ?>

            <tr>
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
                <td><?php echo $row['roles']?></td>


                
                <?php if (in_array($row['username'], $restricted)) : ?>
                    <td><a style="visibility: hidden" ><i class="fas fa-user-edit"></i> Edit</a></td>
                    <td><a style="visibility: hidden" ><i class="fas fa-user-slash"></i> Delete</a></td>
                <?php elseif ($row['username'] == $username) : ?>
                    <td><a href="edit.php?update_user=<?php echo $row['id']; ?>" class='btn btnwarn'><i class="fas fa-user-edit"></i> Edit</a></td>
                    <td><a style="visibility: hidden" ><i class="fas fa-user-slash"></i> Delete</a></td>
                <?php elseif ($row['roles'] == 'Admin') : ?>
                    <td><a href="edit.php?update_user=<?php echo $row['id']; ?>" class='btn btnwarn'><i class="fas fa-user-edit"></i> Edit</a></td>
                    <td><a style="visibility: hidden" ><i class="fas fa-user-slash"></i> Delete</a></td>

                <?php else : ?>
                    <td><a href="edit.php?update_user=<?php echo $row['id']; ?>" class='btn btnwarn'><i class="fas fa-user-edit"></i> Edit</a></td>
                    <td><a href="usm.php?delete_user=<?php echo $row['id']; ?>" class='btn btndanger'><i class="fas fa-user-slash"></i> Delete</a></td>
                <?php endif ?>
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