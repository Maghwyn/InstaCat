<?php $page_title = 'register'; ob_start(); ?>
<?php include(__DIR__."/../partials/navBar.php"); ?>
<main>
    <div class="register-body">
        <div class="register">

            <div class="register-log-in">
                <form class="log-in" action="null" method="POST">

                    <div class="log-in-user-docker">
                        <div class="log-in-user-container">
                            <input class="log-in-user" name="log-in-user" type="text" required>
                            <label><strong>Pseudo/Email</strong></label>
                        </div>
                    </div>

                    <div class="log-in-password-docker">
                        <div class="log-in-password-container">
                            <input class="log-in-password" name="log-in-password" type="password" required>
                            <label><strong>Password</strong></label>
                        </div>
                    </div>

                    <div class="log-in-btn-docker">
                        <div class="log-in-btn-container">
                            <input class="log-in-btn" type="submit" value="Log-in">
                        </div>
                    </div>

                </form>
            </div>

            <div class="register-sign-in">
                <form class="sign-in" action="null" method="POST">

                    <div class="sign-in-pseudo-docker">
                        <div class="sign-in-pseudo-container">
                            <input class="sign-in-pseudo" name="sign-in-pseudo" type="text" required>
                            <label><strong>Pseudo</strong></label>
                        </div>
                    </div>

                    <div class="sign-in-email-docker">
                        <div class="sign-in-email-container">
                            <input class="sign-in-email" name="sign-in-email" type="email" required>
                            <label><strong>Email</strong></label>
                        </div>
                    </div>

                    <div class="sign-in-password-docker">
                        <div class="sign-in-password-container">
                            <input class="sign-in-password" name="sign-in-password" type="password" required>
                            <label><strong>Password</strong></label>
                        </div>
                    </div>

                    <div class="sign-in-password-docker">
                        <div class="sign-in-password-container">
                            <input class="sign-in-password" name="sign-in-password-verified" type="password" required>
                            <label><strong>Verify Password</strong></label>
                        </div>
                    </div>

                    <div class="sign-in-btn-docker">
                        <div class="sign-in-btn-container">
                            <input class="sign-in-btn" type="submit" value="Sign-in">
                        </div>
                    </div>
                    
                </form>
            </div>

            <div class="register-switch">
                <div class="switch-btn-container">
                    <button class="switch-btn" value="NONE">
                </div>
            </div>
        </div>
    </div>
</main>
<?php include(__DIR__."/../partials/footer.php"); ?>
<?php $content = ob_get_clean(); ?>