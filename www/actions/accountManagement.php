<?php
function change_pass() {
    if(!isset($_SESSION)) session_start();

    $are_fields_valid = false;
    $user_old_pass = htmlspecialchars($_POST["old-pass"]);
    $user_new_pass = htmlspecialchars($_POST["new-pass"]);

    if (!empty($user_old_pass) && !empty($user_new_pass)) {
        include_once(__DIR__ . "../../../src/config/config.php");
        include_once(__DIR__ . "../../../src/database.php");

        try {
            $db = new BDD($config_db["host"], $config_db["port"], $config_db["dbname"], $config_db["user"], $config_db["pass"]);
            $db->connect();
            $username = $_SESSION["username"];
            $dbtable = $db->select("SELECT * FROM User WHERE pseudo = '$username'");
            $user = $dbtable->fetch(PDO::FETCH_ASSOC);
            $userId = $user["userId"];

            if(password_verify($user_old_pass, $user['password'])) {
                $verified_password =  password_hash($user_new_pass, PASSWORD_DEFAULT);
                $db->update("UPDATE User SET password = '$verified_password' WHERE userId = $userId");
                $are_fields_valid = true;
            }

            $db->disconnect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    if($are_fields_valid) {
        session_write_close();
        header('Location: http://127.0.0.1:12001/www/index.php?p=profil&update=passchanged');
        exit(); 
    }else {
        header('Location: http://127.0.0.1:12001/www/index.php?p=account&error=code_error');
        exit();
    }
}


function change_email() {
    if(!isset($_SESSION)) session_start();

    $are_fields_valid = false;
    $user_pass = htmlspecialchars($_POST["current-pass"]);
    $user_new_email = htmlspecialchars($_POST["new-email"]);

    if (!empty($user_pass) && !empty($user_new_email)) {
        include_once(__DIR__ . "../../../src/config/config.php");
        include_once(__DIR__ . "../../../src/database.php");

        try {
            $db = new BDD($config_db["host"], $config_db["port"], $config_db["dbname"], $config_db["user"], $config_db["pass"]);
            $db->connect();
            $username = $_SESSION["username"];
            $dbtable = $db->select("SELECT * FROM User WHERE pseudo = '$username'");
            $user = $dbtable->fetch(PDO::FETCH_ASSOC);
            $userId = $user["userId"];

            if(password_verify($user_pass, $user['password'])) {
                $db->update("UPDATE User SET email = '$user_new_email' WHERE userId = $userId");
                $are_fields_valid = true;
            }

            $db->disconnect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    if($are_fields_valid) {
        session_write_close();
        header('Location: http://127.0.0.1:12001/www/index.php?p=profil&update=emailchanged');
        exit(); 
    }else {
        header('Location: http://127.0.0.1:12001/www/index.php?p=account&error=code_error');
        exit();
    }
}

if(isset($_GET['id'])) {
    if($_GET['id'] === "changepass") change_pass();
    else if($_GET['id'] === "changeemail" ) change_email();
}
?>