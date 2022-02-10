<?php $page_title = 'profil'; ob_start(); ?>
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
    <div class="profil">
        <div class="profil-container">
            <header class="profil-header">
                <div class="profil-picture-docker">
                    <div class="profil-picture-container">
                        <img class="profil-picture">
                    </div>
                </div>
                <div class="profil-username-docker">
                    <div class="profil-username-container">
                        <span class="profil-username"></span>
                    </div>
                </div>
            </header>

            <div class="profil-gallery-separator">
                <span>Create</span>
            </div>

            <div class="profil-gallery-docker">
                <article class="profil-gallery-container">
                    <!-- <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>
                    <div class="profil-gallery-content">
                        <img class="gallery-content">
                    </div>     -->
                </article>
            </div>
        </div>
    </div>
</main>
<?php include(__DIR__."/../partials/footer.php"); ?>
<?php $content = ob_get_clean(); ?>