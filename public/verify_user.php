<?php
  require_once("./config.php");

  $status = array(
    "verified" => true
  );

 if (isset($_SESSION["user_email"])) {
     $verification = isUserVerified($pdo, $_SESSION["user_email"]);
     $status["verified"] = true;

     header("Location: index.php");
     exit();
    //  return;
     if ($verification["verified"] == 1) {
         $status["verified"] = true;

         header("Location: index.php");
         exit();
        //  return;
     }
 }

  if (isset($_GET["email"]) && isset($_GET["hash"])) {
      $user_email = $_GET["email"];
      $verification_hash = $_GET["hash"];

      $sql = "SELECT user_id FROM users WHERE user_email = :user_email AND verification_hash = :verification_hash";

      $statement = $pdo->prepare($sql);

      $statement->execute(array(
        ":user_email" => $user_email,
        ":verification_hash" => $verification_hash
      ));

      if ($statement->fetch(PDO::FETCH_ASSOC) != false) {
          // Verify User
          $sql = "UPDATE users SET user_verified = 1 WHERE user_email = :user_email AND verification_hash = :verification_hash";

          $statement = $pdo->prepare($sql);

          $statement->execute(array(
            ":user_email" => $user_email,
            ":verification_hash" => $verification_hash
          ));

          $status["verified"] = true;

          header("Location: index.php");
          exit();
          // return;
      }

      $status["verified"] = false;
  }
?>


