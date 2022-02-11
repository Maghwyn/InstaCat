<main class="image-editor">
    <div class="image-edit-container">

        <div class="picture-edit">
            <span>Upload a picture to your profil :</span>
            <form class="picture-process" action="../../../www/actions/galleryManagement.php?do=pic" method="POST">
                <input class="select-picture" name="selected-picture" type="text" placeholder="Paste URL" >
                <input class="submit-picture" type="submit" value="Upload"/>
            </form>
        </div>

        <div class="desc-edit">
            <span>Define the description of your profil :</span>
            <form class="desc-process" action="../../../www/actions/galleryManagement.php?do=desc" method="POST">
                <input class="define-desc" name="defined-desc" type="text" placeholder="Write what you have in mind">
                <input class="submit-desc" type="submit" value="Upload"/>
            </form>
        </div>

        <div class="gallery-edit">
            <span>Upload an image to the gallery :</span>
            <form class="gallery-process" action="../../../www/actions/galleryManagement.php?do=add" method="POST">
                <input class="select-image" name="selected-image" type="text" placeholder="Paste URL" >
                <input class="submit-image" type="submit" value="Upload"/>
            </form>
        </div>

        <div class="btn-edit">
            <form class="btn-exit" action="../../../www/actions/galleryManagement.php?do=exit" method="POST">
                <input class="exit" type="submit" value="Exit"/>
            </form>
        </div>
    </div>
</main>