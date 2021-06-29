<?php 
    session_start();
    include('server.php');
    include('secretcode.php');
    require_once('crud/server.php');
    
    $errors = array();
    $done = 0;

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);

        if (empty($username)) {
            array_push($errors, "Username cannot be empty or null");
            $_SESSION['error'] = "Username cannot be empty or null";
        }

        
        if (isset($_POST['g-recaptcha-response'])) {
            $ip = $_SERVER["REMOTE_ADDR"];
            $response = $_POST['g-recaptcha-response'];
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretcaptcha&response=$response";
            $fire = file_get_contents($url);
            $_SESSION['fire'] = $fire;
            $result = substr($fire,14,5);
            if($result != " true") {
                header('location: start.php');
                exit();
            }
        } else {
            header('location: start.php');
            exit();
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

                $login = $_SESSION["username"];
                $date = date('Y-m-d H:i:s');
                $actions = 'Created their own account';
                $action = $db -> prepare ("INSERT INTO `transactions` (`dates`,`username`,`action`) VALUES (:dates,:logins,:actions)");
                $action -> bindParam(':dates', $date);
                $action -> bindParam(':logins', $login);
                $action -> bindParam(':actions', $actions);
            }
            
            $_SESSION['username'] = $username;
            
            header('location: index.php');
        } else {
            header("location: start.php");
        }
    }

?>
