<main class="image-viewer">
    <div class="image-edit-container">
        <div class="image-edit">
            <span>Upload an image to the gallery :</span>
            <form class="image-process" action="../../../www/actions/galleryManagement.php?do=add" method="POST">
                <input class="select-image" name="selected-image" type="text" placeholder="Paste URL" >
                <input class="submit-image" type="submit" value="Upload"/>
            </form>
        </div>
    </div>
</main>