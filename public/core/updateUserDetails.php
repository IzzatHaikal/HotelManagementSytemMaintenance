<?php
    require("../config.php");
    header("Content-Type: application/json; charset=utf-8");
        $fname = $_POST['user_fname'];
        $lname = $_POST['user_lname'];
        $phonenumber = $_POST['user_phone'];
        $email = $_POST['user_email'];
        $user_id = $_SESSION["user_id"];

        $sqlUpdate = "UPDATE users SET user_fname = :user_fname, user_phone = :user_phone, user_lname = :user_lname WHERE user_email = :user_email";
        // $param = [
        //     'user_id' => 3,
        //     'user_lname' => 'Joe'
        // ];
        // Prepare statement
        $statement = $pdo->prepare($sqlUpdate);
        
        // $statement->bindParam(':user_id', $param['user_id'], PDO::PARAM_INT);
        // $statement->bindParam(':user_lname', $param['user_lname']);
        // execute the query
        $statement->execute(array(
            ":user_email" => $email,
            ":user_fname" => $fname,
            ":user_lname" => $lname,
            ":user_phone" => $phonenumber,
            // ":user_id" => $user_id,
        ));

        // echo a message to say the UPDATE succeeded
        // echo $statement->rowCount() . " records UPDATED successfully";
        sendJson("Update successful", 0);
        return;
    
        // echo $sqlUpdate . "<br>" . $e->getMessage();
        // sendJson("Update failed", 1);
        // return;
?>