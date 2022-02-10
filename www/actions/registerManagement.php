<?php

function LogIn()
{
    session_start();

    $are_fields_valid = false;
    $user_identifier = htmlspecialchars($_POST["log-in-user"]);
    $password = htmlspecialchars($_POST["log-in-password"]);

    if (!empty($user_identifier) && !empty($password)) {
        include_once(__DIR__ . "../../../src/config/config.php");
        include_once(__DIR__ . "../../../src/database.php");

        str_contains($user_identifier, "@") ? $identifier = "email" : $identifier = "pseudo";

        try {
            $db = new BDD($config_db["host"], $config_db["port"], $config_db["dbname"], $config_db["user"], $config_db["pass"]);
            $db->connect();
            $dbtable = $db->select("SELECT * FROM User WHERE $identifier = '$user_identifier'");
            $user = $dbtable->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $user['password'])) $are_fields_valid = true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    if($are_fields_valid) {
        session_unset();
        $_SESSION["token"] = "logged";
        $_SESSION["username"] = $user["pseudo"];
        session_write_close();
        header('Location: http://127.0.0.1:12001/www/index.php?p=profil');
        exit(); 
    }else {
        header('Location: http://127.0.0.1:12001/www/index.php?p=register&error=code_error');
        session_destroy();
        exit();
    }
}

function SingIn()
{
    session_start();

    $rgx_pseudo = "/[^a-zA-Z0-9]/";
    $rgx_email = "/^(?=.{6,30}@)[0-9a-zA-Z]+(?:\.[0-9a-z]+)*@[a-z0-9-]{2,}(?:\.[a-z]{2,})+$/";

    $pseudo = htmlspecialchars($_POST["sign-in-pseudo"]);
    $email = htmlspecialchars($_POST["sign-in-email"]);
    $password = htmlspecialchars($_POST["sign-in-password"]);
    $password2 = htmlspecialchars($_POST["sign-in-password-verified"]);

    if (
        (strlen($pseudo)   <= 20 || !empty($pseudo)   ||  preg_match($rgx_pseudo, $pseudo)) &&
        (strlen($email)    <= 50 || !empty($email)    ||  preg_match($rgx_email, $email)) &&
        (strlen($password) >= 7  || !empty($password) || ($password === $password2))
    ) {
        $are_fields_valid = true;
    } else $are_fields_valid = false;

    if ($are_fields_valid) {
        include_once(__DIR__ . "../../../src/config/config.php");
        include_once(__DIR__ . "../../../src/database.php");

        $array = ["", "", "", "", "", "", "", "", "", ""];
        $random_id = array_rand($array, 9);
        shuffle($random_id);

        try {
            $bd = new BDD($config_db["host"], $config_db["port"], $config_db["dbname"], $config_db["user"], $config_db["pass"]);
            $bd->connect();

            // $dbtable = $bd -> select("SELECT * FROM User WHERE userId = '$random_id'");
            // $user = $dbtable -> fetch(PDO::FETCH_ASSOC);
            // while($user["id"] === $key_id) { shuffle($random_id); }

            $key_id = intval(implode("", $random_id), 10);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $user = new User($key_id, $pseudo, $email, $hashed_password);

            $bd->insert($user);
            $bd->disconnect();
        } catch (Exception $e) {
            die($e->getMessage());
        }

        header('Location: http://127.0.0.1:12001/www/index.php?p=register&success');
        session_destroy();
        exit();
    } else {
        $_SESSION["sign-in-pseudo"] = $pseudo;
        $_SESSION["sign-in-email"] = $email;

        header('Location: http://127.0.0.1:12001/www/index.php?p=register&error=code_error');
        exit();
    }
}

$control = ['login', 'signin'];

if (!empty($_GET['do']) && in_array($_GET['do'], $control)) {
    if ($_GET['do'] === "login") LogIn();
    else SingIn();
}