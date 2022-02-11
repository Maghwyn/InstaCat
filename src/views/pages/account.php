<?php $page_title = 'account'; ob_start(); if(!isset($_SESSION)) session_start(); ?>
<?php if(!isset($_SESSION["token"])) header("Location: http://127.0.0.1:12001/www/index.php?p=register");?>
<?php include(__DIR__."/../partials/navBar.php"); ?>
<main>
    <div class="parameter-container">
        <div class="parameter">
            <section class="parameter-menu">
                <div class="menu-account">
                    <span>Security</span>
                </div>
            </section>
            <section class="parameter-option-docker">
                <div class="parameter-option-container">
                    <form class="option-password" action='/www/actions/accountManagement.php?id=changepass' method="POST">
                        <span>Change your password here</span>
                        <input name="old-pass" type="password" placeholder="Enter your old password"></input>
                        <input name="new-pass" type="password" placeholder="Enter your new password"></input>
                        <input type="submit"></input>
                    </form>
                    <form class="option-email" action='/www/actions/accountManagement.php?id=changeemail' method="POST">
                        <span>Change your email here</span>
                        <input name="current-pass" type="password" placeholder="Enter your old password"></input>
                        <input name="new-email" type="email" placeholder="Enter your new email"></input>
                        <input type="submit"></input>
                    </form>
                </div>
            </section>
        </div>
    </div>
</main>
<?php include(__DIR__."/../partials/footer.php"); ?>
<?php $content = ob_get_clean(); ?>