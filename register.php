<?php 
    session_start();
    include('server.php');
    
    $errors = array();
    $done = 0;

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);

        if (empty($username)) {
            array_push($errors, "Username cannot be empty or null");
            $_SESSION['error'] = "Username cannot be empty or null";
        }

        


        $user_check_query = "SELECT * FROM `users` WHERE `username` = '$username' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {

                $done = 1;
            }
            $_SESSION['role'] = $result['roles'];
        }

        if (count($errors) == 0) {

            if ($done != 1) {
                $sql = "INSERT INTO `users` (`id`, `username`, `roles`) VALUES (NULL, '$username', 'User')";
                mysqli_query($conn, $sql);
                $_SESSION['role'] = 'User';
            }
            
            $_SESSION['username'] = $username;
            
            header('location: index.php');
        } else {
            header("location: start.php");
        }
    }

?>
