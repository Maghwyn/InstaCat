<main class="image-viewer">
    <div class="image-viewer-container">

        <div class="image-docker">
            <div class="image-container">
                <img class='display-image' src="https://source.unsplash.com/<?=$img_src?>">
            </div>
        </div>
        
        <div class="message-docker">
            <div class="message-container">
                <?php 
                    if(isset($_SESSION["token"]) && isset($_SESSION["fetched-msgs"])) {
                        foreach($_SESSION["fetched-msgs"] as $key_url) {
                            $txt_msg = $key_url["textComment"];

                            echo "
                                <div class='message-box'>
                                    <span class='message'>$txt_msg</span>
                                </div>
                            ";
                        }

                        unset($_SESSION["fetched-msgs"]);
                    }
                ?>
            </div>
            <div class="message-editor-container">
                <form class="message-editor" action="../../../www/actions/galleryManagement.php?do=msg" method="POST">
                    <input class="message-user" name="msg-user" type="textarea" placeholder="Type your message here">
                    <input class="message-submit" type="submit" value="Submit">
                </form>
            </div>

            <div class="btn-edit">
            <form class="btn-exit" action="../../../www/actions/galleryManagement.php?do=exit" method="POST">
                <input class="exit" type="submit" value="Exit"/>
            </form>
        </div>
        </div>
    </div>
</main>