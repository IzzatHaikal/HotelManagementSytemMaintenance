<?php
    require("../config.php");
    header("Content-Type: application/json; charset=utf-8");

        $impression = $_POST["impression"];
        $first_hear = $_POST["first_hear"];
        $missing_features = $_POST["missing_features"];
        $recommend = $_POST["recommend"];
        $useful_features = $_POST["useful_features"];
        $ease_of_use = $_POST["ease_of_use"];

        $sql = "INSERT INTO feedback (impression, first_hear, missing_features, recommend, useful_features, ease_of_use) VALUES (:impression, :first_hear, :missing_features, :recommend, :useful_features, :ease_of_use)";

        $statement = $pdo->prepare($sql);

        $statement->execute(array(
            ":impression" => $impression,
            ":first_hear" => $first_hear,
            ":missing_features" => $missing_features,
            ":recommend" => $recommend,
            ":useful_features" => $useful_features,
            ":ease_of_use" => $ease_of_use,
        ));
