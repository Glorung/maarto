
<?php 
require_once 'src/view/template/navBar.php';

if ($user->_account == NULL)
    echo "Vous n'avez pas encore de compte en banque défini.";
else
{
    echo "<div style='overflow-x:auto'>";
    echo "<table class='table'>";
    echo "    <thead>";
    echo "        <tr>";
    echo "            <th scope='col'>Comptes</th>";
    echo "            <th scope='col'>Identifiant</th>";
    echo "            <th scope='col'>Soldes</th>";
    echo "            <th scope='col'>Détail</th>";
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
    echo "</div>";
}
?>
</body>
</html>