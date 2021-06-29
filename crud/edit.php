<?php 
    session_start();
    require_once('server.php');

    if (isset($_REQUEST['update_user'])) {
        try {
            $id = $_REQUEST['update_user'];
            $select_stmt = $db->prepare("SELECT * FROM `users` WHERE id = :id");
            $select_stmt->bindParam(':id', $id);
            $select_stmt->execute();

            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);

            $restricted = $_SESSION['restricted'];

            if (in_array("$username", $restricted)) {
                header('location: usm.php');
            }

        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_update'])) {
        $username_up = $_REQUEST['username'];
        $roles_up = $_REQUEST['roles'];

        if (empty($username_up)) {
            $errorMsg = "Username cannot be blank or null";
        } else if (empty($roles_up)) {
            $errorMsg = "Roles cannot be blank or null";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $update_stmt = $db->prepare("UPDATE `users` SET username = :fname_up, roles = :lname_up WHERE id = :id");
                    $update_stmt->bindParam(':fname_up', $username_up);
                    $update_stmt->bindParam(':lname_up', $roles_up);
                    $update_stmt->bindParam(':id', $id);

                    $login = $_SESSION["username"];
                    $date = date('Y-m-d H:i:s');
                    $actions = 'Edited ' . $username . ' as ' . $roles . ' to ' . $username_up . ' as ' . $roles_up;
                    $action = $db -> prepare ("INSERT INTO `transactions` (`dates`,`username`,`action`) VALUES (:dates,:logins,:actions)");
                    $action -> bindParam(':dates', $date);
                    $action -> bindParam(':logins', $login);
                    $action -> bindParam(':actions', $actions);
                    $action -> execute();

                    if ($update_stmt->execute()) {
                        $updateMsg = "Record update successfully...";
                        header("refresh:0;usm.php");
                    }
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Tinagrit Study</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="crud.css">
</head>

<body>

<div class="main" style='padding: 0 10px; max-width: 800px; display: block; margin: 0 auto 0 auto'>
        <h1 >Edit <?php echo $username; ?></h1>
        <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>Error: <?php echo $errorMsg; ?></strong>
        </div>
        <?php } ?>



        <form method="post">

            <label for="username" style="font-size: 20px">Username</label>
            <input style="font-size: 15px; padding: 5px; margin-left: 10px" type="text" autocomplete="off" name="username" value="<?php echo $username; ?>"><br>

            <label for="roles" style="font-size: 20px">Role</label>
            <select style="font-size: 15px; padding: 5px; margin-left: 10px; margin-top: 10px" name="roles">

                <?php if($roles == "User") : ?>
                    <option value="User" selected>User</option>
                    <option value="Admin">Admin</option>
                <?php elseif ($roles == "Admin") : ?>
                    <option value="User">User</option>
                    <option value="Admin" selected>Admin</option>
                <?php endif ?>
                

            </select><br>

            <input style="font-size: 20px; color: white; background-color:orange; border:none; margin-top: 10px; padding: 5px" type="submit" name="btn_update" class="btn btn-success" value="Update">
            <a href="usm.php" class="btn btn-danger" style="margin-left: 10px; color: red;">Cancel</a>



        </form>
                </div>
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

        <script src="js/slim.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.js"></script>
</body>

</html>