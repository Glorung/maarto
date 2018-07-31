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
            echo "            <th>Date</th>";
            echo "            <th>Categorie</th>";
            echo "            <th>Nom</th>";
            echo "            <th>Prix</th>";
            echo "            <th>Type</th>";
            echo "        </tr>";
            echo "    </thead>";
            echo "    <tbody>";

            $i = 0;
            while ($i < count($user->_operations))
            {
                echo "<tr>";
                echo "<td>" . $user->_operations[$i]['date'] . "</td>";
                echo "<td>" . $user->categoryIdToString($user->_operations[$i]['category_id']) . "</td>";
                echo "<td>" . $user->_operations[$i]['name'] . "</td>";
                echo "<td>" . ($user->_operations[$i]['count'] / 100) . "</td>";
                echo "<td>" . $user->typeIdToString($user->_operations[$i]['type_id']) . "</td>";
                echo "</tr>";

                $i += 1;
            }
            echo "</tbody>";
            echo "</table>";
        }
        ?>

    </body>
</html>
