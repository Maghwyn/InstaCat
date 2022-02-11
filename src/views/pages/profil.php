<?php $page_title = 'profil'; ob_start(); if(!isset($_SESSION)) session_start(); ?>
<?php if(!isset($_SESSION["token"])) header("Location: http://127.0.0.1:12001/www/index.php?p=register");?>

<?php include(__DIR__ . "/../partials/navBar.php"); ?>
<main class="profil">
    <div class="profil-docker">
        <div class="profil-container">
            <div class="profil-picture-container">
                <?php
                    if(isset($_SESSION["token"])) {
                        include_once "../www/actions/galleryManagement.php";
                        $pic_url = get_picture();

                        if($pic_url === NULL) echo "<img class='profil-picture' src='../../../src/img/userUnknown.png'>";
                        echo "<img class='profil-picture' src='$pic_url'>";
                    }else null;
                ?>
            </div>

            <div class="profil-description-container">
                <h4 class='profil-pseudo'><?= isset($_SESSION["username"]) ? $_SESSION["username"] : ""; ?></h4>
                <span class="profil-description">description à rajouter dans BDD si temps </span>
                <form class="profil-add-image-container" action="../../../www/actions/galleryManagement.php?do=edit" method="POST">
                    <input class="profil-add-image" type="submit" value="Edit">
                </form>
            </div>

            <div class="profil-gallery-container">
                <div class="profil-gallery">
                    <div class="gallery-column">
                        <?php 
                            if(isset($_SESSION["token"])) {
                                include_once "../www/actions/galleryManagement.php";

                                $url = dynamic_image();
                                foreach($url as $key_url) {
                                    $img = $key_url["urlImage"];
                                    echo "
                                        <a href='#' target='_blank' class='gallery-link'>
                                            <figure class='gallery-thumb'>
                                                <img src='$img' alt='#' class='gallery-image'>
                                            </figure>
                                        </a>
                                    ";
                                }
                            }else null;
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