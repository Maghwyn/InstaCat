<main class="image-viewer">
    <div class="image-edit-container">

        <div class="picture-edit">
            <span>Upload a picture to your profil :</span>
            <form class="picture-process" action="../../../www/actions/galleryManagement.php?do=pic" method="POST">
                <input class="select-picture" name="selected-picture" type="text" placeholder="Paste URL" >
                <input class="submit-picture" type="submit" value="Upload"/>
            </form>
        </div>

        <div class="gallery-edit">
            <span>Upload an image to the gallery :</span>
            <form class="gallery-process" action="../../../www/actions/galleryManagement.php?do=add" method="POST">
                <input class="select-image" name="selected-image" type="text" placeholder="Paste URL" >
                <input class="submit-image" type="submit" value="Upload"/>
            </form>
        </div>

    </div>
</main>