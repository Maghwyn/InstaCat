<!-- <div class="nav">
    <div class="nav-header-logo">
        <div class="nav-logo-container">
            <img class="nav-logo" src="../../src/img/InstaCatLogo.png"></img>
        </div>
    </div>
    <div class="nav-header-btn">
        <div class="nav-links-container">
            <div class="nav-links">
                <a href="index.php?p=profil"><span>Profil</span></a>
                <a href="index.php?p=account"><span>Account</span></a>
                <a href="index.php?cmd=logout"><span>Log out</span></a>
            </div>
        </div>
    </div>
</div> -->


<div class="nav">
  <div class="nav-header-logo">
    <div class="nav-logo-container">
      <img class="nav-logo" src="../../src/img/InstaCatLogo.png"></img>
    </div>

    <div class="nav-header-btn">

      <div class="nav-links-container">

        <div class="nav-links">
          <a href="http://127.0.0.1:12001/www/index.php?p=home"><span>Home</span></a>
          <a href="http://127.0.0.1:12001/www/index.php?p=contact"><span>Contact</span></a>
          <a href="http://127.0.0.1:12001/www/index.php?p=log"><span>Login</span></a>
          <!-- input tag -->
          <!-- <form action="../../../www/actions/tagManagement.php" method="GET"> -->

          <form action="../../../www/actions/tagManagement.php?do=search" method="GET">
            <input type="search" name="tag">
            <input type="submit" name="do" value="search">
          </form>

        </div>
      </div>
    </div>
  </div>
</div>