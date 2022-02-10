<?php
session_start();

$existing_pages = ['register', 'profil', 'account', 'fill'];

$page="register";

if(isset($_GET['p'])) {
    if(in_array($_GET['p'], $existing_pages)) $page = $_GET['p'];
}
else if(isset($_GET['cmd'])) {
    if(!empty($_GET['cmd']) && $_GET['cmd'] === "logout") {
        $page="register";
        session_unset();
        session_destroy();
    }
}else $page = "404";

include __DIR__ . "/../src/views/pages/$page.php";
include __DIR__ . "/../src/views/partials/template.php";
?>