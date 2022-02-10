<?php $page_title = 'profil'; /*$user_identifier = $_GET['user_identifier'];*/ ob_start(); ?>
<?php if(!isset($_SESSION["token"])) header("Location: http://127.0.0.1:12001/www/index.php?p=register");?>

<?php include(__DIR__ . "/../partials/navBar.php"); ?>
<main class="profil">
    <div class="profil-docker">
        <div class="profil-container">
            <div class="profil-picture-container">
                <img class="profil-picture"src="../../../src/img/userUnknown.png">
            </div>

            <div class="profil-description-container">
                <h4 class='profil-pseudo'><?= isset($_SESSION["username"]) ? $_SESSION["username"] : ""; ?></h4>
                <span class="profil-description">description à rajouter dans BDD si temps </span>
            </div>

            <div class="profil-gallery-container">
                <div class="profil-gallery">
                    <div class="gallery-column">
                        <?php 
                            include_once "../www/actions/galleryManagement.php";
                            if(isset($_SESSION["token"])) $url = dynamic_image();

                            foreach($url as $image) {
                                echo "
                                    <a href='#' target='_blank' class='gallery-link'>
                                        <figure class='gallery-thumb'>
                                            <img src='$image' alt='#' class='gallery-image'>
                                        </figure>
                                    </a>
                                ";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include(__DIR__."/../partials/footer.php"); ?>
<?php $content = ob_get_clean(); ?>