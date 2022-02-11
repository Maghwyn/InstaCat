<div class="nav">
    <div class="nav-header-logo">
        <div class="nav-logo-container">
            <img class="nav-logo" src="../../src/img/InstaCatLogo.png"></img>
        </div>
    </div>
    <div class="nav-header-btn">
        <div class="nav-links-container">
            <?php 
                if(isset($_SESSION["token"])) {
                    echo "
                    <div class='nav-links'>
                        <a href='index.php?p=profil'><span>Profil</span></a>
                        <a href='index.php?p=account'><span>Account</span></a>
                        <a href='index.php?cmd=logout'><span>Log out</span></a>
                    </div>

                    <form action='../../../www/actions/tagManagement.php?do=search' method='GET'>
                        <input type='search' name='tag'>
                        <input type='submit' name='do' value='search'>
                    </form>
                    ";
                }
            ?>
        </div>
    </div>
</div>