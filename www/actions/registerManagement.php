<?php

function LogIn() {
    session_start();

    $are_fields_valid = false;

    $email = htmlspecialchars($_POST["log-in-user"]);
    $password = htmlspecialchars($_POST["log-in-password"]);

    if(!empty($email) && !empty($password)) {
        include_once(__DIR__."../src/config/config.php -> config.php");
        include_once(__DIR__."../src/database.php -> database.php");

        try {
            $bd = new BDD(config_db["host"], config_db["port"], config_db["dbname"], config_db["user"], config_db["pass"]);
            $bd -> connect();
            $dbtable = $bd -> select("SELECT * FROM User WHERE email = '$email'");
            $user = $dbtable -> fetch(PDO::FETCH_ASSOC);

            if($email === $user['email'] && password_verify($password, $user['password'])) $are_fields_valid = true;
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //$$$$$$$$$$$$$$$$$$$$$$ When working on it, change the somewhere to the right page.
    if($are_fields_valid) {
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        echo 'Login success';
        header('Location: http://127.0.0.1:12001/www/index.php?p=somewhere');
        session_destroy();
        exit(); 
    }else {
        header('Location: http://127.0.0.1:12001/www/index.php?p=register&error=code_error');
        session_destroy();
        exit();
    }
}

function SingIn() {
    session_start();

    $are_fields_valid = true;
    $rgx_pseudo = "/[^a-zA-Z0-9]/";
    $rgx_email = "/^(?=.{6,30}@)[0-9a-zA-Z]+(?:\.[0-9a-z]+)*@[a-z0-9-]{2,}(?:\.[a-z]{2,})+$/";

    // Generate a random ID : Careful it doesn't verify if the ID already exist in the database.
    $array = ["","","","","","","","","",""];
    $random_id = array_rand($array, 9);
    shuffle($random_id);

    $key_id = intval(implode("", $random_id), 10);
    $pseudo = htmlspecialchars($_POST["sign-in-pseudo"]);
    $email = htmlspecialchars($_POST["sign-in-email"]);
    $password = password_hash($_POST["sign-in-password"], PASSWORD_DEFAULT);
    $password_verified = password_hash($_POST["sign-in-password-verified"], PASSWORD_DEFAULT);

    if(empty($pseudo) || empty($email) || empty($password)){
        $are_fields_valid = false;
    }
    else if(strlen($pseudo)<= 3 && strlen($password) <=3){
        $are_fields_valid = false;
    }else if($password_verified != $password) {
        $are_fields_valid = false;
    }
    else{
        if(preg_match(regex, $rgx_pseudo) && preg_match(regex, $email)&& preg_match(regex, $password)){
            $are_fields_valid = true;
        }
        $are_fields_valid = true;
    }
    
    if($are_fields_valid) {
        include_once(__DIR__."../src/config/config.php -> config.php");
        include_once(__DIR__."../src/database.php -> database.php");

        try {
            $bd = new BDD(config_db["host"], config_db["port"], config_db["dbname"], config_db["user"], config_db["pass"]);
            $user = new User($key_id, $pseudo, $email, $password);
    
            $bd -> connect();
            $bd -> insert($user);
            $bd -> disconnect();
            
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
        //$$$$$$$$$$$$$$$$$$$$$$ When working on it, change the somewhere to the right page.
        $_SESSION["pseudo"] = $pseudo;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        $_SESSION["password_verified"] = $password_verified;
        header('Location: http://127.0.0.1:12001/www/index.php?p=somewhere');
        session_destroy();
        exit(); 
    }else {
        //$$$$$$$$$$$$$$$$$$$$$$ Keep the values of the fields just in case, except the password.
        $_SESSION["pseudo"] = $pseudo;
        $_SESSION["email"] = $email;
        header('Location: http://127.0.0.1:12001/www/index.php?p=register&error=code_error');
        exit();
    }
}
?>