<?php $page_title = 'profil'; ob_start(); ?>
<?php 
// setcookie("user", "", time() - (86400 * 31), "/", true, true);
// var_dump($_COOKIE); //Debug

if(isset($_COOKIE['user']) && !isset($_SESSION["login"])) {
    var_dump($_COOKIE['user']);
    $user = $_COOKIE['user'];

    $_SESSION["login"] = true;
    $_SESSION["username"] = $user;
}else {
    header("Location: http://127.0.0.1:12001/www/index.php?p=register");
}
?>
<main>
    <h1>Nothing for now, but it's the profil page</h1>
</main>
<?php $content = ob_get_clean(); ?>