<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title ?></title>
    </head>
    <body>
        <h1><?php echo $title ?></h1>

        <!-- Redirection du client vers sa page -->
        <script>
            function redirection()
            {
                location.href = '<?php echo $redirection ?>';
            }

            setTimeout(redirection, 2000);
        </script>
    </body>
</html>