<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="src/view/template/navBar.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        
        <nav>
            <ul class="topnav">
                <?php
                    $i = 0;
                    while ($i < count($links))
                    {
                        // <li></li>
                        echo '<li ';
                        if (ISSET($links[$i]['right']))
                            echo 'class="right" ';
                        echo '>';
                        
                        // <a></a>
                        echo '<a ';
                        
                        if (ISSET($links[$i]['active']))
                            echo 'class="active" ';
                        
                        echo 'href="index.php' . $links[$i]['action'];
                        echo '">';
                        echo $links[$i]['name'];
                        echo '</a>';
                        echo '</li>';
                    $i += 1;
                    }
                ?>
            </ul>
        </nav>
        