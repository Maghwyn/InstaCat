<?php $page_title = 'account'; ob_start(); if(!isset($_SESSION)) session_start(); ?>
<?php if(!isset($_SESSION["token"])) header("Location: http://127.0.0.1:12001/www/index.php?p=register");?>
<?php include(__DIR__."/../partials/navBar.php"); ?>
<main>
    <h1>Nothing for now, but it's the account page</h1>
</main>
<?php include(__DIR__."/../partials/footer.php"); ?>
<?php $content = ob_get_clean(); ?>