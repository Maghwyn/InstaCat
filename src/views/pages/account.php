<?php $page_title = 'account'; ob_start(); ?>
<?php 
setcookie("user", "", time() - (86400 * 31), "/", false, false);
var_dump($_COOKIE); //Debug

if(isset($_COOKIE['user']) && !isset($_SESSION["login"])) {
    // var_dump($_COOKIE['user']);
    $user = $_COOKIE['user'];

    $_SESSION["login"] = true;
    $_SESSION["username"] = $user;
}else {
    header("Location: http://127.0.0.1:12001/www/index.php?p=register");
}
?>
<?php include(__DIR__."/../partials/navBar.php"); ?>
<main>
    <h1>Nothing for now, but it's the account page</h1>
</main>
<?php include(__DIR__."/../partials/footer.php"); ?>
<?php $content = ob_get_clean(); ?>