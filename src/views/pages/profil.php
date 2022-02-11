<?php $page_title = 'profil'; ob_start(); if(!isset($_SESSION)) session_start(); ?>
<?php if(!isset($_SESSION["token"])) header("Location: http://127.0.0.1:12001/www/index.php?p=register");?>
<?php if(isset($_SESSION["token"])) {
    include "../www/actions/galleryManagement.php"; 
    load_content();
}
?>
<?php include(__DIR__ . "/../partials/navBar.php"); ?>
<main class="profil">
    <div class="profil-docker">
        <div class="profil-container">
            <div class="profil-picture-container">
                <?php
                    if(isset($_SESSION["token"])) {
                        $get_pic = $_SESSION["userpic"];
                        if($get_pic === NULL) echo "<img class='profil-picture' src='../../../src/img/userUnknown.png'>";
                        else echo "<img class='profil-picture' src='$get_pic'>";

                        unset($_SESSION["userpic"]);
                    }
                ?>
            </div>

            <div class="profil-description-container">
                <h4 class='profil-pseudo'><?= isset($_SESSION["username"]) ? $_SESSION["username"] : ""; ?></h4>
                <?php
                    if(isset($_SESSION["token"])) {
                        $get_desc = $_SESSION["userdesc"];
                        if($get_desc === NULL) echo "<span class='profil-description'>Edit your profile to change the description.</span>";
                        else echo "<span class='profil-description'>$get_desc</span>";

                        unset($_SESSION["userdesc"]);
                    }
                ?>
                <form class="profil-add-image-container" action="../../../www/actions/galleryManagement.php?do=edit" method="POST">
                    <input class="profil-add-image" type="submit" value="Edit">
                </form>
            </div>

            <div class="profil-gallery-container">
                <div class="profil-gallery">
                    <div class="gallery-column">
                        <?php 
                            if(isset($_SESSION["token"]) && isset($_SESSION["images_url"])) {
                                foreach($_SESSION["images_url"] as $key_url) {
                                    $img = $key_url["urlImage"];
                                    echo "
                                        <a href='#' target='_blank' class='gallery-link'>
                                            <figure class='gallery-thumb'>
                                                <img src='$img' alt='#' class='gallery-image'>
                                            </figure>
                                        </a>
                                    ";
                                }

                                unset($_SESSION["images_url"]);
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include(__DIR__."/../partials/footer.php"); ?>
<?php 
if(isset($_SESSION["edit-image"])) {
    include(__DIR__."/../partials/editImage.php");
}else null; 
?>
<?php $content = ob_get_clean(); ?>