<?php

session_start();
    require_once('server.php');
    $restricted = $_SESSION['restricted'];
    $username = $_SESSION['username'];

    if (isset($_REQUEST['approve'])) {
        try {
            $id = $_REQUEST['approve'];

            $find_in_request = $db -> prepare("SELECT * FROM `requests` WHERE reqid = :id");
            $find_in_request->bindParam(':id', $id);
            $find_in_request->execute();
            $requestresult = $find_in_request->fetch(PDO::FETCH_ASSOC);
            $userid = $requestresult['id'];

            // $select_stmt = $db->prepare("SELECT * FROM `users` WHERE id = :id");
            // $select_stmt->bindParam(':id', $userid);
            // $select_stmt->execute();

            // $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            // extract($row);

            // $restricted = $_SESSION['restricted'];

            // if (in_array("$username", $restricted)) {
            //     header('location: usm.php');
            // }

            $go = $requestresult['access'];
            echo $go;
            $sql = "UPDATE `users` SET `$go` = '2' WHERE `users`.`id` = :id";

            $approve_stmt = $db->prepare($sql);
            // $approve_stmt->bindParam(':access', $requestresult['access']);
            $approve_stmt->bindParam(':id', $userid);
            // $approve_stmt->bindParam(':subj', $userid);

            if ($approve_stmt -> execute()) {
                $drop_request = $db->prepare('DELETE FROM `requests` WHERE `reqid` = :id');
                $drop_request->bindParam(':id',$id);
                if ($drop_request -> execute()) {
                    $login = $_SESSION["username"];
                    $date = date('Y-m-d H:i:s');
                    $actions = 'Accepted ' . $requestresult['username'] . ' for ' . $requestresult['access'];
                    $action = $db -> prepare ("INSERT INTO `transactions` (`dates`,`username`,`action`) VALUES (:dates,:logins,:actions)");
                    $action -> bindParam(':dates', $date);
                    $action -> bindParam(':logins', $login);
                    $action -> bindParam(':actions', $actions);
                    if ($action -> execute()) {
                        header('location: index.php');
                    }
                }
            }

        } catch(PDOException $e) {
               $e->getMessage();
               echo $e;
        }
    }

    if (isset($_REQUEST['reject'])) {
        try {
            $id = $_REQUEST['reject'];

            $find_in_request = $db -> prepare("SELECT * FROM `requests` WHERE reqid = :id");
            $find_in_request->bindParam(':id', $id);
            $find_in_request->execute();
            $requestresult = $find_in_request->fetch(PDO::FETCH_ASSOC);
            $userid = $requestresult['id'];

            // $select_stmt = $db->prepare("SELECT * FROM `users` WHERE id = :id");
            // $select_stmt->bindParam(':id', $userid);
            // $select_stmt->execute();

            // $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            // extract($row);

            // $restricted = $_SESSION['restricted'];

            // $makingreject = $requestresult["username"];

            // if (in_array("$makingreject", $restricted)) {
            //     header('location: index.php');
            // }

            $go = $requestresult['access'];
            echo $go;
            $sql = "UPDATE `users` SET `$go` = '3' WHERE `users`.`id` = :id";

            $approve_stmt = $db->prepare($sql);
            // $approve_stmt->bindParam(':access', $requestresult['access']);
            $approve_stmt->bindParam(':id', $userid);
            // $approve_stmt->bindParam(':subj', $userid);

            if ($approve_stmt -> execute()) {
                $drop_request = $db->prepare('DELETE FROM `requests` WHERE `reqid` = :id');
                $drop_request->bindParam(':id',$id);
                if ($drop_request -> execute()) {
                    $login = $_SESSION["username"];
                    $date = date('Y-m-d H:i:s');
                    $actions = 'Rejected ' . $requestresult['username'] . ' for ' . $requestresult['access'];
                    $action = $db -> prepare ("INSERT INTO `transactions` (`dates`,`username`,`action`) VALUES (:dates,:logins,:actions)");
                    $action -> bindParam(':dates', $date);
                    $action -> bindParam(':logins', $login);
                    $action -> bindParam(':actions', $actions);
                    if ($action -> execute()) {
                        header('location: index.php');
                    }
                }
            }

        } catch(PDOException $e) {
               $e->getMessage();
               echo $e;
        }
    }

    if (isset($_REQUEST['deleteclient'])) {
        try {
            $id = $_REQUEST['deleteclient'];

            $find_in_request = $db -> prepare("SELECT * FROM `requests` WHERE reqid = :id");
            $find_in_request->bindParam(':id', $id);
            $find_in_request->execute();
            $requestresult = $find_in_request->fetch(PDO::FETCH_ASSOC);
            $userid = $requestresult['id'];

            $go = $requestresult['access'];
            echo $go;
            $sql = "UPDATE `users` SET `$go` = '0' WHERE `users`.`id` = :id";

            $approve_stmt = $db->prepare($sql);
            // $approve_stmt->bindParam(':access', $requestresult['access']);
            $approve_stmt->bindParam(':id', $userid);
            // $approve_stmt->bindParam(':subj', $userid);

            if ($approve_stmt -> execute()) {

                $drop_request = $db->prepare('DELETE FROM `requests` WHERE `reqid` = :id');
                $drop_request->bindParam(':id',$id);
                if ($drop_request -> execute()) {
                    $login = $_SESSION["username"];
                    $date = date('Y-m-d H:i:s');
                    $actions = 'Deleted their own ' . $requestresult['access'] . ' request';
                    $action = $db -> prepare ("INSERT INTO `transactions` (`dates`,`username`,`action`) VALUES (:dates,:logins,:actions)");
                    $action -> bindParam(':dates', $date);
                    $action -> bindParam(':logins', $login);
                    $action -> bindParam(':actions', $actions);
                    if ($action -> execute()) {
                        header('location: ../index.php?logout=1');
                    }
                }
            }

        } catch(PDOException $e) {
               $e->getMessage();
               echo $e;
        }
    }



    if (isset($_REQUEST['deleteuserclient'])) {
        try {
            $id = $_SESSION['id'];

            if (!in_array($username,$restricted)) {

    
                    $drop_request = $db->prepare('DELETE FROM `users` WHERE `id` = :id');
                    $drop_request->bindParam(':id',$id);
                    if ($drop_request -> execute()) {
                        $login = $_SESSION["username"];
                        $date = date('Y-m-d H:i:s');
                        $actions = 'Deleted their own account';
                        $action = $db -> prepare ("INSERT INTO `transactions` (`dates`,`username`,`action`) VALUES (:dates,:logins,:actions)");
                        $action -> bindParam(':dates', $date);
                        $action -> bindParam(':logins', $login);
                        $action -> bindParam(':actions', $actions);
                        if ($action -> execute()) {
                            header('location: ../start.php');
                        }
                    }
                
            } else {
                header('location: ../account.php');
            }

            

        } catch(PDOException $e) {
               $e->getMessage();
               echo $e;
        }
    }
?>