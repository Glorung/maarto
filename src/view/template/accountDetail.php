<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title ?></title>
    </head>
    <body>
        <?php
        $i = 0;
        while ($i < count($links))
        {
            echo    "<a href='index.php" . $links[$i]['action'] . "'>" .
                        $links[$i]['name'] .
                    "</a>";
            $i += 1;
        }
        echo "<br>";
        
        if ($user->_operations == NULL)
                    echo "Vous n'avez pas encore d'opérations sur ce compte.";
        else
        {
            echo "<table>";
            echo "    <thead>";
            echo "        <tr>";
            echo "            <th>Compte</th>";
            echo "        </tr>";
            echo "    </thead>";
            echo "    <tbody>";

            $i = 0;
            while ($i < count($user->_operations))
            {
                echo "<tr>";
                echo "<td>" . $user->_operations[$i]['name'] . "</td>";
                echo "</tr>";

                $i += 1;
            }
            echo "</tbody>";
            echo "</table>";
        }
        ?>

    </body>
</html>