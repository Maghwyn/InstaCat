<?php $page_title = 'profil'; /*$user_identifier = $_GET['user_identifier'];*/ ob_start(); ?>
<?php include(__DIR__ . "/../partials/navBar.php"); ?>

<main class="profil">
    <div class="profil-docker">
        <div class="profil-container">
            <div class="profil-picture-container">
                <img class="profil-picture"src="../../../src/img/register_bg.jpg">
            </div>

            <div class="profil-description-container">
                <!-- <?= "<h4 class='name'>  $user_identifier</h4>"; ?> -->
                <span class="profil-description">description à rajouter dans BDD si temps </span>
            </div>

            <div class="profil-gallery-container">
                <div class="profil-gallery">
                    <div class="gallery-column">
                        <a href="https://unsplash.com/@jeka_fe" target="_blank" class="gallery-link">
                            <figure class="gallery-thumb">
                                <img src="https://source.unsplash.com/_cvwXhGqG-o/300x300" alt="Portrait by Jessica Felicio"
                                    class="gallery-image">
                            </figure>
                        </a>
                        <a href="https://unsplash.com/@oladimeg" target="_blank" class="gallery-link">
                            <figure class="gallery-thumb">
                                <img src="https://source.unsplash.com/AHBvAIVqk64/300x500" alt="Portrait by Oladimeji Odunsi"
                                class="gallery-image">
                            </figure>
                        </a>

                        <a href="https://unsplash.com/@a2eorigins" target="_blank" class="gallery-link">
                            <figure class="gallery-thumb">
                                <img src="https://source.unsplash.com/VLPLo-GtrIE/300x300" alt="Portrait by Alex Perez"
                                class="gallery-image">
                            </figure>
                        </a>

                        <a href="https://unsplash.com/@noahbuscher" target="_blank" class="gallery-link">
                            <figure class="gallery-thumb">
                                <img src="https://source.unsplash.com/AR7aumwKr2s/300x300" alt="Portrait by Noah Buscher"
                                class="gallery-image">
                            </figure>
                        </a>

                        <a href="https://unsplash.com/@von_co" target="_blank" class="gallery-link">
                            <figure class="gallery-thumb">
                                <img src="https://source.unsplash.com/dnL6ZIpht2s/300x300" alt="Portrait by Ivana Cajina"
                                class="gallery-image">
                            </figure>
                        </a>

                        <a href="https://unsplash.com/@samburriss" target="_blank" class="gallery-link">
                            <figure class="gallery-thumb">
                                <img src="https://source.unsplash.com/tV_1sC603zA/300x500" alt="Portrait by Sam Burriss"
                                class="gallery-image">
                            </figure>
                        </a>

                        <a href="https://unsplash.com/@marilezhava" target="_blank" class="gallery-link">
                            <figure class="gallery-thumb">
                                <img src="https://source.unsplash.com/Xm9-vA_bhm0/300x500" alt="Portrait by Mari Lezhava"
                                class="gallery-image">
                            </figure>
                        </a>

                        <a href="https://unsplash.com/@ethanhaddox" target="_blank" class="gallery-link">
                            <figure class="gallery-thumb">
                                <img src="https://source.unsplash.com/NTjSR3zYpsY/300x300" alt="Portrait by Ethan Haddox"
                                class="gallery-image">
                            </figure>
                        </a>

                        <a href="https://unsplash.com/@mr_geshani" target="_blank" class="gallery-link">
                            <figure class="gallery-thumb">
                                <img src="https://source.unsplash.com/2JH8d3ChNec/300x300" alt="Portrait by Amir Geshani"
                                class="gallery-image">
                            </figure>
                        </a>

                        <a href="https://unsplash.com/@frxgui" target="_blank" class="gallery-link">
                            <figure class="gallery-thumb">
                                <img src="https://source.unsplash.com/FQhLLehm4dk/300x300" alt="Portrait by Guilian Fremaux"
                                class="gallery-image">
                            </figure>
                        </a>

                        <a href="https://unsplash.com/@majestical_jasmin" target="_blank" class="gallery-link">
                            <figure class="gallery-thumb">
                                <img src="https://source.unsplash.com/OQd9zONSx7s/300x300" alt="Portrait by Jasmin Chew"
                                class="gallery-image">
                            </figure>
                        </a>

                        <a href="https://unsplash.com/@dimadallacqua" target="_blank" class="gallery-link">
                            <figure class="gallery-thumb">
                                <img src="https://source.unsplash.com/XZkEhowjx8k/300x500" alt="Portrait by Dima DallAcqua"
                                class="gallery-image">
                            </figure>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include(__DIR__ . "/../partials/footer.php"); ?>
<?php $content = ob_get_clean(); ?>