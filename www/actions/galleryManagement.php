<?php

function gallery_editor() {
    if(!isset($_SESSION)) session_start();
    $_SESSION["edit-image"] = true;
    session_write_close();
    header('Location: http://127.0.0.1:12001/www/index.php?p=profil');
    exit();
}

function add_image() {
    if(!isset($_SESSION)) session_start();

    include_once(__DIR__ . "../../../src/config/config.php");
    include_once(__DIR__ . "../../../src/database.php");
    
    $image_name = htmlspecialchars($_POST["selected-image"]);
    $array = ["", "", "", "", "", "", "", "", "", ""];
    $random_id = array_rand($array, 9);
    shuffle($random_id);

    try {
        $db = new BDD($config_db["host"], $config_db["port"], $config_db["dbname"], $config_db["user"], $config_db["pass"]);
        $db->connect();

        $username = $_SESSION["username"];
        $getUser = $db->select("SELECT U.userId FROM User as U WHERE U.pseudo = '$username'");
        $user = $getUser->fetch(PDO::FETCH_ASSOC);
        $userid = $user["userId"];

        $key_id = intval(implode("", $random_id), 10);
        $img = new Image($key_id, $userid, $image_name, 0);

        $db->insert($img);
        $db->disconnect();

    } catch (Exception $e) {
        die($e->getMessage());
    }

    unset($_SESSION["edit-image"]);
    session_write_close();
    header('Location: http://127.0.0.1:12001/www/index.php?p=profil');
    exit();
}

function add_picture() {
    if(!isset($_SESSION)) session_start();

    include_once(__DIR__ . "../../../src/config/config.php");
    include_once(__DIR__ . "../../../src/database.php");
    
    $picture = htmlspecialchars($_POST["selected-picture"]);

    try {
        $db = new BDD($config_db["host"], $config_db["port"], $config_db["dbname"], $config_db["user"], $config_db["pass"]);
        $db->connect();

        $username = $_SESSION["username"];
        $getUser = $db->select("SELECT U.userId FROM User as U WHERE U.pseudo = '$username'");
        $user = $getUser->fetch(PDO::FETCH_ASSOC);
        $userid = $user["userId"];

        $db->update("UPDATE User SET profilPicture = '$picture' WHERE userId = $userid");
        $db->disconnect();

    } catch (Exception $e) {
        die($e->getMessage());
    }

    unset($_SESSION["edit-image"]);
    session_write_close();
    header('Location: http://127.0.0.1:12001/www/index.php?p=profil');
    exit();
}

function add_description() {
    if(!isset($_SESSION)) session_start();

    include_once(__DIR__ . "../../../src/config/config.php");
    include_once(__DIR__ . "../../../src/database.php");
    
    $desc = htmlspecialchars($_POST["defined-desc"]);
    var_dump($desc);

    try {
        $db = new BDD($config_db["host"], $config_db["port"], $config_db["dbname"], $config_db["user"], $config_db["pass"]);
        $db->connect();

        $username = $_SESSION["username"];
        $getUser = $db->select("SELECT U.userId FROM User as U WHERE U.pseudo = '$username'");
        $user = $getUser->fetch(PDO::FETCH_ASSOC);
        $userid = $user["userId"];

        $db->update("UPDATE User SET profilDesc = '$desc' WHERE userId = $userid");
        $db->disconnect();

    } catch (Exception $e) {
        die($e->getMessage());
    }

    unset($_SESSION["edit-image"]);
    session_write_close();
    header('Location: http://127.0.0.1:12001/www/index.php?p=profil');
    exit();
}

function load_content() {
    if(!isset($_SESSION)) session_start();

    include_once(__DIR__ . "../../..//src/config/config.php");
    include_once(__DIR__ . "../../../src/database.php");

    try {
        $db = new BDD($config_db["host"], $config_db["port"], $config_db["dbname"], $config_db["user"], $config_db["pass"]);
        $db->connect();

        $username = $_SESSION["username"];
        $getUser = $db->select("SELECT U.userId, U.profilPicture, U.profilDesc FROM User as U WHERE U.pseudo = '$username'");
        $user = $getUser->fetch(PDO::FETCH_ASSOC);
        $userid = $user["userId"];
        $userpic = $user["profilPicture"];
        $userdesc = $user["profilDesc"];

        $dbtable = $db->select("SELECT I.urlImage FROM Image as I JOIN User as U on I.userIdImage = $userid GROUP BY I.urlImage");
        $images_url = $dbtable->fetchAll(PDO::FETCH_ASSOC);
   
        $db->disconnect();

        $_SESSION["userpic"] = $userpic;
        $_SESSION["images_url"] = $images_url;
        $_SESSION["userdesc"] = $userdesc;

        session_write_close();
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

function exit_edit() {
    if(!isset($_SESSION)) session_start();
    unset($_SESSION["edit-image"]);
    session_write_close();
    header('Location: http://127.0.0.1:12001/www/index.php?p=profil');
    exit();
}

if(isset($_GET['do'])) {
    if($_GET['do'] === "edit") gallery_editor();
    else if($_GET['do'] === "pic" ) add_picture();
    else if($_GET['do'] === "desc") add_description();
    else if($_GET['do'] === "add" ) add_image();
    else if($_GET['do'] === "exit") exit_edit();
}
?>