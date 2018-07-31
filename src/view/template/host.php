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
        
        if ($user->_account == NULL)
                    echo "Vous n'avez pas encore de compte en banque défini.";
        else
        {
            echo "<table>";
            echo "    <thead>";
            echo "        <tr>";
            echo "            <th>Comptes</th>";
            echo "            <th>Identifiant</th>";
            echo "            <th>Soldes</th>";
            echo "            <th>Détail</th>";
            echo "        </tr>";
            echo "    </thead>";
            echo "    <tbody>";

            $i = 0;
            while ($i < count($user->_account))
            {
                echo "<tr>";
                echo "<td>" . $user->_account[$i]['name'] . "</td>";
                echo "<td>" . $user->_account[$i]['account_id'] . "</td>";
                echo "<td>" . ($user->_account[$i]['balance'] / 100) . "</td>";

                echo    "<td>" ."<a href=" .
                                "'index.php?user=" . $user->_user['user_id'] .
                                "&account=" . $user->_account[$i]['account_id'] .
                                "'>" . "detail_icon" . "</a>" .
                        "</td>";

                echo "</tr>";

                $i += 1;
            }
            echo "</tbody>";
            echo "</table>";
        }
        ?>
    </body>
</html>