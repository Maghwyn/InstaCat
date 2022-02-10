<?php $page_title = 'profil';
// require __DIR__ . '../../../../www/actions/registerManagement.php';
$user_identifier = $_GET['user_identifier'];

ob_start(); ?>
<?php include(__DIR__ . "/../partials/navBar.php"); ?>
<main class="fillMain">


  <div class="row">
    <div class="left col-lg-4">
      <div class="photo-left">
        <img class="photo"
          src="https://images.pexels.com/photos/1804796/pexels-photo-1804796.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" />
        <div class="active"></div>
      </div>
      <?= "<h4 class='name'>  $user_identifier</h4>"; ?>


      <div class="stats row">

        <p class="desc">description à rajouter dans BDD si temps </p>



        <div class="gallery">
          <div class="gallery__column">
            <a href="https://unsplash.com/@jeka_fe" target="_blank" class="gallery__link">
              <figure class="gallery__thumb">
                <img src="https://source.unsplash.com/_cvwXhGqG-o/300x300" alt="Portrait by Jessica Felicio"
                  class="gallery__image">

              </figure>
            </a>

            <a href="https://unsplash.com/@oladimeg" target="_blank" class="gallery__link">
              <figure class="gallery__thumb">
                <img src="https://source.unsplash.com/AHBvAIVqk64/300x500" alt="Portrait by Oladimeji Odunsi"
                  class="gallery__image">

              </figure>
            </a>

            <a href="https://unsplash.com/@a2eorigins" target="_blank" class="gallery__link">
              <figure class="gallery__thumb">
                <img src="https://source.unsplash.com/VLPLo-GtrIE/300x300" alt="Portrait by Alex Perez"
                  class="gallery__image">
              </figure>
            </a>
          </div>

          <div class="gallery__column">
            <a href="https://unsplash.com/@noahbuscher" target="_blank" class="gallery__link">
              <figure class="gallery__thumb">
                <img src="https://source.unsplash.com/AR7aumwKr2s/300x300" alt="Portrait by Noah Buscher"
                  class="gallery__image">

              </figure>
            </a>

            <a href="https://unsplash.com/@von_co" target="_blank" class="gallery__link">
              <figure class="gallery__thumb">
                <img src="https://source.unsplash.com/dnL6ZIpht2s/300x300" alt="Portrait by Ivana Cajina"
                  class="gallery__image">

              </figure>
            </a>

            <a href="https://unsplash.com/@samburriss" target="_blank" class="gallery__link">
              <figure class="gallery__thumb">
                <img src="https://source.unsplash.com/tV_1sC603zA/300x500" alt="Portrait by Sam Burriss"
                  class="gallery__image">

              </figure>
            </a>
          </div>

          <div class="gallery__column">
            <a href="https://unsplash.com/@marilezhava" target="_blank" class="gallery__link">
              <figure class="gallery__thumb">
                <img src="https://source.unsplash.com/Xm9-vA_bhm0/300x500" alt="Portrait by Mari Lezhava"
                  class="gallery__image">

              </figure>
            </a>

            <a href="https://unsplash.com/@ethanhaddox" target="_blank" class="gallery__link">
              <figure class="gallery__thumb">
                <img src="https://source.unsplash.com/NTjSR3zYpsY/300x300" alt="Portrait by Ethan Haddox"
                  class="gallery__image">

              </figure>
            </a>

            <a href="https://unsplash.com/@mr_geshani" target="_blank" class="gallery__link">
              <figure class="gallery__thumb">
                <img src="https://source.unsplash.com/2JH8d3ChNec/300x300" alt="Portrait by Amir Geshani"
                  class="gallery__image">

              </figure>
            </a>
          </div>

          <div class="gallery__column">
            <a href="https://unsplash.com/@frxgui" target="_blank" class="gallery__link">
              <figure class="gallery__thumb">
                <img src="https://source.unsplash.com/FQhLLehm4dk/300x300" alt="Portrait by Guilian Fremaux"
                  class="gallery__image">

              </figure>
            </a>

            <a href="https://unsplash.com/@majestical_jasmin" target="_blank" class="gallery__link">
              <figure class="gallery__thumb">
                <img src="https://source.unsplash.com/OQd9zONSx7s/300x300" alt="Portrait by Jasmin Chew"
                  class="gallery__image">

              </figure>
            </a>

            <a href="https://unsplash.com/@dimadallacqua" target="_blank" class="gallery__link">
              <figure class="gallery__thumb">
                <img src="https://source.unsplash.com/XZkEhowjx8k/300x500" alt="Portrait by Dima DallAcqua"
                  class="gallery__image">

              </figure>
            </a>
          </div>
        </div>
        <?php include(__DIR__ . "/../partials/footer.php"); ?>
        <?php $content = ob_get_clean(); ?>
</main>