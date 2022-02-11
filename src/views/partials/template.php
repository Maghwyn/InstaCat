<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InstaCat - <?= $page_title; ?></title>
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" type="text/css" href="../../../www/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <?= $content; ?>

    <script>
        /* when a user clicks, toggle the 'is-animating' class */
        $(".heart").on('click touchstart', function() {
            $(this).toggleClass('is_animating');
        });
        
        /* when the animation is over, remove the class */
        $(".heart").on('animationend', function(){
            $(this).toggleClass('is_animating');
        });
    </script>
</body>
</html>