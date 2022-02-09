<?php

function LogIn() {
    session_start();

    $are_fields_valid = false;

    // $email = htmlspecialchars($_POST["the tag name"]);
    // $password = htmlspecialchars($_POST["the tag name"]); // Don't hash the password.

    if(!empty($email) && !empty($password)) {
        //$$$$$$$$$$$$$$$$$$$$$$ Just a template.
        // include_once(__DIR__."BDD_infos_path -> config.php");
        // include_once(__DIR__."CLASS_path -> database.php");

        // try {
        //     $bd = new BDD(config_db["host"], config_db["port"], config_db["dbname"], config_db["user"], config_db["pass"]);
        //     $bd -> connect();
        //     $dbtable = $bd -> select("SELECT * FROM User WHERE email = '$email'");
        //     $user = $dbtable -> fetch(PDO::FETCH_ASSOC);

        //     if (password_verify($password, $user['password'])) $are_fields_valid = true;
        // }
        // catch (Exception $e) {
        //     die($e->getMessage());
        // }
    }

    //$$$$$$$$$$$$$$$$$$$$$$ When working on it, change the somewhere to the right page.
    // if($are_fields_valid) {
    //     header('Location: http://127.0.0.1:12001/www/index.php?p=somewhere');
    //     session_destroy();
    //     exit(); 
    // }else {
    //     header('Location: http://127.0.0.1:12001/www/index.php?p=register&error=code_error');
    //     session_destroy();
    //     exit();
    // }
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
    // $pseudo = htmlspecialchars($_POST["the tag name"]);
    // $email = htmlspecialchars($_POST["the tag name"]);
    // $password = password_hash($_POST["the tag name"], PASSWORD_DEFAULT);

    /********************
        Verification of the field goes here :
            - strlen($field) >= value    // Set the limit of characters in the field. 
            - empty($field)              // Check if the field is empty.
            - preg_match(regex, $field)  // Check if the field has an unwanted character, or doesn't follow a rule.

        If one of these requirements is false, the form is invalid.
    ********************/

    if($are_fields_valid) {
        //$$$$$$$$$$$$$$$$$$$$$$ Just a template.
        // include_once(__DIR__."BDD_infos_path -> config.php");
        // include_once(__DIR__."CLASS_path -> database.php");

        // try {
        //     $bd = new BDD(config_db["host"], config_db["port"], config_db["dbname"], config_db["user"], config_db["pass"]);
        //     $user = new User($key_id, $pseudo, $email, $password);
    
        //     $bd -> connect();
        //     $bd -> insert($user);
        //     $bd -> disconnect();
        // }
        // catch (Exception $e) {
        //     die($e->getMessage());
        // }

        //$$$$$$$$$$$$$$$$$$$$$$ When working on it, change the somewhere to the right page.
        // header('Location: http://127.0.0.1:12001/www/index.php?p=somewhere');
        // session_destroy();
        // exit(); 
    }else {
        //$$$$$$$$$$$$$$$$$$$$$$ Keep the values of the fields just in case, except the password.
        // $_SESSION["pseudo"] = $pseudo;
        // $_SESSION["email"] = $email;

        header('Location: http://127.0.0.1:12001/www/index.php?p=register&error=code_error');
        exit();
    }
}
?>