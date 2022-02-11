<?php

function gallery_editor()
{
    if (!isset($_SESSION)) session_start();
    $_SESSION["edit-image"] = true;
    session_write_close();
    header('Location: http://127.0.0.1:12001/www/index.php?p=profil');
    exit();
}

function add_image()
{
    if (!isset($_SESSION)) session_start();

    include_once(__DIR__ . "../../../src/config/config.php");
    include_once(__DIR__ . "../../../src/database.php");

    $image_name = htmlspecialchars($_POST["selected-image"]);
    $tag_name = htmlspecialchars($_POST["selected-tag"]);

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

        if (!empty($tag_name)) {
            $array_id = ["", "", "", "", "", "", "", "", "", ""];
            $random_id_tag = array_rand($array_id, 9);
            shuffle($random_id_tag);
            $key_id_tag = intval(implode("", $random_id_tag), 10);


            $db->select("INSERT INTO `Tag` (`tagId`, `nameTag`) VALUES ('$key_id_tag', '$tag_name')");
            $db->select("INSERT INTO `NbTag` (`imageId`, `tagId`) VALUES ('$key_id', '$key_id_tag') ");
        }


        $db->disconnect();
    } catch (Exception $e) {
        die($e->getMessage());
    }

    unset($_SESSION["edit-image"]);
    session_write_close();
    header('Location: http://127.0.0.1:12001/www/index.php?p=profil');
    exit();
}

function add_picture()
{
    if (!isset($_SESSION)) session_start();

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

function add_description()
{
    if (!isset($_SESSION)) session_start();

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

function load_content()
{
    if (!isset($_SESSION)) session_start();

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

        $dbtable = $db->select("SELECT I.urlImage FROM Image as I JOIN User as U on I.userIdImage = U.userId WHERE U.userId = $userid GROUP BY I.urlImage");
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

function exit_edit()
{
    if (!isset($_SESSION)) session_start();

    if (isset($_SESSION["edit-image"])) unset($_SESSION["edit-image"]);
    if (isset($_SESSION["view-image"])) unset($_SESSION["view-image"]);

    session_write_close();
    header('Location: http://127.0.0.1:12001/www/index.php?p=profil');
    exit();
}

function img_get_src()
{
    if (!isset($_SESSION)) session_start();

    include_once(__DIR__ . "../../..//src/config/config.php");
    include_once(__DIR__ . "../../../src/database.php");

    try {
        $db = new BDD($config_db["host"], $config_db["port"], $config_db["dbname"], $config_db["user"], $config_db["pass"]);
        $db->connect();

        $username = $_SESSION["username"];
        $image_url = "https://source.unsplash.com/" . $_GET['id'];

        $getUser = $db->select("SELECT U.userId FROM User as U WHERE U.pseudo = '$username'");
        $user = $getUser->fetch(PDO::FETCH_ASSOC);
        $userid = $user["userId"];

        $dbtable = $db->select("SELECT I.imageId FROM Image as I, User as U WHERE I.userIdImage = U.userId and U.userId = $userid and I.urlImage = '$image_url';");
        $imgids = $dbtable->fetchAll(PDO::FETCH_ASSOC);
        $imgid = $imgids[0]['imageId'];

        $getMsg = $db->select("SELECT C.textComment FROM Comment as C, User as U, Image as I WHERE C.imageId = I.imageId and C.userIdComment = U.userId 
        and I.imageId = $imgid and U.userId = $userid GROUP BY C.commentId;");
        $msg_content = $getMsg->fetchAll(PDO::FETCH_ASSOC);

        $db->disconnect();
    } catch (Exception $e) {
        die($e->getMessage());
    }

    $_SESSION["view-image"] = true;
    $_SESSION["img-src"] = $_GET['id'];
    $_SESSION["fetched-msgs"] = $msg_content;

    session_write_close();
    header('Location: http://127.0.0.1:12001/www/index.php?p=profil');
    exit();
}

function send_msg()
{
    if (!isset($_SESSION)) session_start();

    include_once(__DIR__ . "../../..//src/config/config.php");
    include_once(__DIR__ . "../../../src/database.php");

    $msg_content = htmlspecialchars($_POST["msg-user"]);
    $array = ["", "", "", "", "", "", "", "", "", ""];
    $random_id = array_rand($array, 9);
    shuffle($random_id);

    try {
        $db = new BDD($config_db["host"], $config_db["port"], $config_db["dbname"], $config_db["user"], $config_db["pass"]);
        $db->connect();

        $username = $_SESSION["username"];
        $image_url = "https://source.unsplash.com/" . $_SESSION["img-src"];

        $getUser = $db->select("SELECT U.userId FROM User as U WHERE U.pseudo = '$username'");
        $user = $getUser->fetch(PDO::FETCH_ASSOC);
        $userid = $user["userId"];

        $dbtable = $db->select("SELECT I.imageId FROM Image as I, User as U WHERE I.userIdImage = U.userId and U.userId = $userid and I.urlImage = '$image_url';");
        $imgids = $dbtable->fetchAll(PDO::FETCH_ASSOC);
        $imgid = $imgids[0]['imageId'];

        $key_id = intval(implode("", $random_id), 10);
        $msg = new Comment($key_id, $imgid, $userid, $msg_content);

        $db->insert_msg($msg);

        $getMsg = $db->select("SELECT C.textComment FROM Comment as C, User as U, Image as I WHERE C.imageId = I.imageId and C.userIdComment = U.userId 
        and I.imageId = $imgid and U.userId = $userid GROUP BY C.commentId;");
        $msgcontent = $getMsg->fetchAll(PDO::FETCH_ASSOC);

        $db->disconnect();
    } catch (Exception $e) {
        die($e->getMessage());
    }

    $_SESSION["fetched-msgs"] = $msgcontent;
    session_write_close();
    header('Location: http://127.0.0.1:12001/www/index.php?p=profil');
    exit();
};

function search_tags()
{


    // $_SESSION["tag"] = $tag;


    var_dump($_GET['tag']);




    // $tag = htmlspecialchars($_GET['s']);
    // var_dump($tag);
};


if (isset($_GET['do'])) {
    if ($_GET['do'] === "edit") gallery_editor();
    else if ($_GET['do'] === "pic") add_picture();
    else if ($_GET['do'] === "desc") add_description();
    else if ($_GET['do'] === "add") add_image();
    else if ($_GET['do'] === "exit") exit_edit();
    else if ($_GET['do'] === 'msg') send_msg();
    else if ($_GET['do'] === 'search') search_tags();
} else if (isset($_GET['id'])) img_get_src();