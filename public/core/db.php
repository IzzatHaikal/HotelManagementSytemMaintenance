<?php

    try {
        $pdo =  new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        session_start();
    } catch (PDOException $err) {
        die($err->getMessage());
    }
    
    // try {
    //     $pdo =  new PDO("mysql:host=us-cdbr-east-05.cleardb.net;dbname=heroku_005a985cabfb7a3,b8005b16c70c6a,93b3cea1");
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     session_start();
    // } catch (PDOException $err) {
    //     die($err->getMessage());
    // }
