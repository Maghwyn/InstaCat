<?php
session_start();

$existing_pages = ['register', 'profil', 'account'];

$page="register";

if (!empty($_GET['p']) && in_array($_GET['p'], $existing_pages)) $page = $_GET['p'];
else $page = "404";

include __DIR__ . "/../src/views/pages/$page.php";
include __DIR__ . "/../src/views/partials/template.php";

session_destroy();
?>