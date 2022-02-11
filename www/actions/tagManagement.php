<?php
$page_title = 'search';
include_once(__DIR__ . "../../../src/config/config.php");
include_once(__DIR__ . "../../../src/database.php");
// require_once __DIR__ . '../../../src/views/pages/fill.php';
// $user_identifier = $_GET['user_identifier'];
$array_url_image = array();

try {
  $bd = new BDD($config_db["host"], $config_db["port"], $config_db["dbname"], $config_db["user"], $config_db["pass"]);
  $bd->connect();
} catch (Exception $e) {
  die("Une érreur a été trouvé : " . $e->getMessage());
}


if (isset($_GET["do"]) and $_GET["do"] == "search") {
  $_GET["tag"] = htmlspecialchars($_GET["tag"]);
  // $user_identifier = $_GET['user_identifier'];
  $tag = $_GET["tag"];
  $tag = trim($tag);
  $tag = strip_tags($tag);

  if (isset($tag)) {
    $tag = strtolower($tag);
    $select_tag = $bd->select("SELECT `urlImage` FROM Image, NbTag, Tag WHERE Image.imageId = NbTag.imageId AND NbTag.tagId = Tag.tagId AND '$tag' = Tag.nameTag");
    $tag = $select_tag->fetchAll(PDO::FETCH_ASSOC);
    foreach ($tag as $value) {
      foreach ($value as $tag_print) {
        if (!empty($tag_print)) {
          $print = true;
          $template[] =
            "
        <form class='gallery-link' action='/www/actions/galleryManagement.php?' method='POST'>
            <figure class='gallery-thumb' onClick='javascript:this.parentNode.submit();'>
                <img src='$tag_print' alt='#' class='gallery-image'>
            </figure>
        </form>
          ";
        } else {
          $print = false;
          $message = "le tag n'existe pas";
        }
      }
    }
  } else {
    $message = "le tag n'existe pas";
  }
}














// ob_start(); 
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InstaCat - <?= $page_title; ?></title>
  <link rel="shortcut icon" href="#">
  <link rel="stylesheet" type="text/css" href="../../www/assets/css/style.css">
</head>
<?= require(__DIR__ . "../../../src/views/partials/navBar.php"); ?>
<main class="fillMain">





  <div class="stats row">

    <p class="desc">Résultats de votre recherche</p>

    <?php if ($print === true) {
      foreach ($template as $temp) {
        echo $temp;
      }
    } ?>





















    <!-- $url -->
    <!-- <div class="gallery">
      <div class="gallery__column">
        <figure class="gallery__thumb">
          <img src='' alt="Portrait by Jessica Felicio" class="gallery__image">
        </figure>
        <figure class="gallery__thumb">
          <img src="" alt="" class="gallery__image">
        </figure>

        <figure class="gallery__thumb">
          <img src="https://source.unsplash.com/_cvwXhGqG-o/300x300" alt="Portrait by Jessica Felicio"
            class="gallery__image">
        </figure>


        <figure class="gallery__thumb">
          <img src="https://source.unsplash.com/AHBvAIVqk64/300x500" alt="Portrait by Oladimeji Odunsi"
            class="gallery__image">

        </figure>



        <figure class="gallery__thumb">
          <img src="https://source.unsplash.com/VLPLo-GtrIE/300x300" alt="Portrait by Alex Perez"
            class="gallery__image">
        </figure>

      </div>

      <div class="gallery__column">

        <figure class="gallery__thumb">
          <img src="https://source.unsplash.com/AR7aumwKr2s/300x300" alt="Portrait by Noah Buscher"
            class="gallery__image">

        </figure>



        <figure class="gallery__thumb">
          <img src="https://source.unsplash.com/dnL6ZIpht2s/300x300" alt="Portrait by Ivana Cajina"
            class="gallery__image">

        </figure>



        <figure class="gallery__thumb">
          <img src="https://source.unsplash.com/tV_1sC603zA/300x500" alt="Portrait by Sam Burriss"
            class="gallery__image">

        </figure>

      </div>

      <div class="gallery__column">

        <figure class="gallery__thumb">
          <img src="https://source.unsplash.com/Xm9-vA_bhm0/300x500" alt="Portrait by Mari Lezhava"
            class="gallery__image">

        </figure>



        <figure class="gallery__thumb">
          <img src="https://source.unsplash.com/NTjSR3zYpsY/300x300" alt="Portrait by Ethan Haddox"
            class="gallery__image">

        </figure>



        <figure class="gallery__thumb">
          <img src="https://source.unsplash.com/2JH8d3ChNec/300x300" alt="Portrait by Amir Geshani"
            class="gallery__image">

        </figure>

      </div>

      <div class="gallery__column">

        <figure class="gallery__thumb">
          <img src="https://source.unsplash.com/FQhLLehm4dk/300x300" alt="Portrait by Guilian Fremaux"
            class="gallery__image">

        </figure>



        <figure class="gallery__thumb">
          <img src="https://source.unsplash.com/OQd9zONSx7s/300x300" alt="Portrait by Jasmin Chew"
            class="gallery__image">

        </figure>



        <figure class="gallery__thumb">
          <img src="https://source.unsplash.com/XZkEhowjx8k/300x500" alt="Portrait by Dima DallAcqua"
            class="gallery__image">

        </figure>

      </div>
    </div> -->
    <?php include(__DIR__ . "../../../src/views/partials/footer.php"); ?>

</main>