<?php

require_once 'src/view/template/navBar.php';

        echo "<br>";

        if ($user->_operations == NULL)
                    echo "Vous n'avez pas encore d'opérations sur ce compte.";
        else
        {
            echo "<div style='overflow-x:auto'>";
            echo "<table class='table'>";
            echo "    <thead>";
            echo "        <tr>";
            echo "            <th scope='col'>Date</th>";
            echo "            <th scope='col'>Categorie</th>";
            echo "            <th scope='col'>Nom</th>";
            echo "            <th scope='col'>Débit</th>";
            echo "            <th scope='col'>Crédit</th>";
            echo "            <th scope='col'>Type</th>";
            echo "        </tr>";
            echo "    </thead>";
            echo "    <tbody>";

            $i = 0;
            while ($i < count($user->_operations))
            {
                echo "<tr>";
                echo "<td>Le " . date("j M, Y", strtotime($user->_operations[$i]['date'])) . "</td>";
                echo "<td>" . $user->categoryIdToString($user->_operations[$i]['category_id']) . "</td>";
                echo "<td>" . $user->_operations[$i]['name'] . "</td>";
                $balance = ($user->_operations[$i]['count'] / 100);
                if ($balance < 0)
                {
                    echo "<td>" . $balance . "</td>";
                    echo "<td></td>";
                }
                else
                {
                    echo "<td></td>";
                    echo "<td>" . $balance . "</td>";
                }
                echo "<td>" . $user->typeIdToString($user->_operations[$i]['type_id']) . "</td>";
                echo "</tr>";

                $i += 1;
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        }
        ?>

    </body>
</html>
