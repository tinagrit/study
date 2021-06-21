<?php 
    session_start();
    require_once('server.php');

    if (isset($_REQUEST['btn_add'])) {
        $username_up = $_REQUEST['username'];
        $roles_up = $_REQUEST['roles'];

        if (empty($username_up)) {
            $errorMsg = "Username cannot be blank or null";
        } else if (empty($roles_up)) {
            $errorMsg = "Roles cannot be blank or null";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $update_stmt = $db->prepare("INSERT INTO `users` (`username`,`roles`) VALUES (:fname_up,:lname_up)");
                    $update_stmt->bindParam(':fname_up', $username_up);
                    $update_stmt->bindParam(':lname_up', $roles_up);

                    $login = $_SESSION["username"];
                    $date = date('Y-m-d H:i:s');
                    $actions = 'Added ' . $username_up . ' as ' . $roles_up;
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

    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="crud.css">
</head>

<body>

<div class="main" style='padding: 0 10px; max-width: 800px; display: block; margin: 0 auto 0 auto'>
        <h1 >Add User</h1>
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
            <select style="font-size: 15px; padding: 5px; margin-left: 10px; margin-top: 10px" name="roles" value="<?php echo $roles; ?>">

                <option value="User">User</option>
                <option value="Admin">Admin</option>

            </select><br>

            <input style="font-size: 20px; color: white; background-color:green; border:none; margin-top: 10px; padding: 5px" type="submit" name="btn_add" class="btn btn-success" value="Add">
            <a href="usm.php" class="btn btn-danger" style="margin-left: 10px; color: red;">Cancel</a>



        </form>

        <script src="js/slim.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.js"></script>
</body>

</html>