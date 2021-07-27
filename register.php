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
            $_SESSION['autherror'] = "ต้องมีชื่อผู้ใช้";
            header('location: start.php');
            exit();
        }

        if ($username == 'root') {
            array_push($errors, "Root is not accessible");
            $_SESSION['autherror'] = "ผู้ใช้นี้เข้าถึงไม่ได้";
            header('location: start.php');
            exit();
        }

        if (strpos($username, "SELECT ") !== FALSE OR strpos($username, "DELETE ") !== FALSE OR strpos($username, "INSERT ") !== FALSE OR strpos($username, "UPDATE ") !== FALSE OR strpos($username, " FROM ")) {
            array_push($errors, "This username is too risky to SQL Injection");
            $_SESSION['autherror'] = "ชื่อผู้ใช้มีคำไม่อนุญาต (SQL Commands)";
            header('location: start.php');
            exit();
        }

        if (strpos($username, "admin") !== FALSE OR strpos($username, "tinagritstudy") !== FALSE) {
            array_push($errors, "This username is not allowed");
            $_SESSION['autherror'] = "ชื่อผู้ใช้มีคำไม่อนุญาต";
            header('location: start.php');
            exit();
        }

        if (strpos($username, "<") !== FALSE OR strpos($username, ">") !== FALSE OR strpos($username, "script") !== FALSE) {
            array_push($errors, "This username is too risky to XSS attack");
            $_SESSION['autherror'] = "ชื่อผู้ใช้มีคำไม่อนุญาต (HTML Tag)";
            header('location: start.php');
            exit();
        }


        
        if (isset($_POST['g-recaptcha-response'])) {
            $ip = $_SERVER["REMOTE_ADDR"];
            $response = $_POST['g-recaptcha-response'];
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretcaptcha&response=$response";
            $fire = file_get_contents($url);
            $_SESSION['fire'] = $fire;
            $result = substr($fire,14,5);
            if($result != " true") {
                $_SESSION['autherror'] = "ต้องคลิกที่ช่อง I'm not a robot";
                header('location: start.php');
                exit();
            }
        } else {
            $_SESSION['autherror'] = 'เกิดปัญหากับ reCAPTCHA';
            header('location: start.php');
            exit();
        }

        $user_check_query = "SELECT * FROM `users` WHERE `username` = '$username' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                
                $_SESSION['existinguser'] = $result['username'];
                $_SESSION['role'] = $result['roles'];

                $done = 1;
            }
            
        }

        if (count($errors) == 0) {

            if ($done != 1) {
                $_SESSION['newuser'] = $username;
                
                
            }
            
            
            
            header('location: confirm.php');
        } else {
            header("location: start.php");
        }
    }

    if (isset($_POST['enterpassword'])) {
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $password3 = $_POST['password3'];
        $password4 = $_POST['password4'];
        $password = $password1 . $password2 . $password3 . $password4;
        if (empty($password)) {
            $_SESSION['autherror'] = 'ต้องใส่รหัสผ่าน';
            header('location: start.php');
            exit();
        }
        $newusername = $_POST['username'];


    $sql = "INSERT INTO `users` (`id`, `username`, `password`, `roles`) VALUES (NULL, '$newusername', '$password', 'User')";
    mysqli_query($conn, $sql);
    $_SESSION['role'] = 'User';
    $_SESSION['username'] = $newusername;

    $login = $newusername;
    $date = date('Y-m-d H:i:s');
    $actions = 'Created their own account';
    $action = $db -> prepare ("INSERT INTO `transactions` (`dates`,`username`,`action`) VALUES (:dates,:logins,:actions)");
    $action -> bindParam(':dates', $date);
    $action -> bindParam(':logins', $login);
    $action -> bindParam(':actions', $actions);
    $action -> execute();

        if (isset($_SESSION['afterlogin'])) {
            header('location: ' . $_SESSION['afterlogin']);
        } else {
            header('location: index.php');
        }
    }





    if (isset($_POST['submitpassword'])) {
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $password3 = $_POST['password3'];
        $password4 = $_POST['password4'];
        $password = $password1 . $password2 . $password3 . $password4;
        $oldusername = $_POST['username'];

        if (empty($password)) {
            $_SESSION['autherror'] = 'ต้องใส่รหัสผ่าน';
            header('location: start.php');
            exit();
        }

        $query = "SELECT * FROM `users` WHERE `username` = '$oldusername' AND `password` = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $oldusername;
            if (isset($_SESSION['afterlogin'])) {
                header('location: ' . $_SESSION['afterlogin']);
            } else {
                header('location: index.php');
            }
            exit();
        } else {
            $_SESSION['autherror'] = 'รหัสผ่านไม่ถูกต้อง';
            header('location: start.php');
        }
    }

?>
