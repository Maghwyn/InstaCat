<?php $page_title = 'account'; ob_start(); ?>
<?php 
// setcookie("user", "", time() - (86400 * 31), "/", true, true);
// var_dump($_COOKIE); //Debug

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
    <div class="parameter-container">
        <div class="parameter">
            <section class="parameter-menu">
                <div class="parameter-username">
                    <span>Username</span>
                </div>
                <div class="menu-account">
                    <span>Security</span>
                </div>
            </section>
            <section class="parameter-option-docker">
                <div class="parameter-option-container">
                    <div class="option-password">
                        <span>Change your password here</span>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>
<?php include(__DIR__."/../partials/footer.php"); ?>
<?php $content = ob_get_clean(); ?>