<?php

function dynamic_image() {
    include_once(__DIR__ . "../../../src/config/config.php");
    include_once(__DIR__ . "../../../src/database.php");

    try {
        $db = new BDD($config_db["host"], $config_db["port"], $config_db["dbname"], $config_db["user"], $config_db["pass"]);
        $db->connect();

        $username = $_SESSION["username"];
        $getUser = $db->select("SELECT U.userId FROM User as U WHERE U.pseudo = '$username'");
        $user = $getUser->fetch(PDO::FETCH_ASSOC);
        $userid = $user["userId"];

        $dbtable = $db->select("SELECT I.urlImage FROM Image as I JOIN User as U on I.userIdImage = $userid");
        $images_url = $dbtable->fetch(PDO::FETCH_ASSOC);

        return ($images_url === false) ? null : $images_url;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

?>