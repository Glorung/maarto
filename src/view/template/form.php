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
        ?>

        <?php
        echo '<form action="index.php?user=' . $user->_user['user_id'] .
        '&set=operation" method="post">';
      ?>          <h1>Ajout d\'une operation</h1><br>
            Compte:
            <select name="account">
                <optgroup>
                  <?php
                  $i = 0;
                  while ($i < count($user->_account))
                  {
                    echo '<option value="' . $user->_account[$i]['account_id'] .
                    '">' . $user->_account[$i]['name'] . '</option>';
                    $i += 1;
                  }
                  ?>
                </optgroup>
            </select>

            <br>

            <input type="text" placeholder="Libellé de l'opération" name="name"><br>
            <input type="date" name="date"> <br>

            <input type="number" step="any" placeholder="Montant de l'opération" name="balance"><br>

            Type:
            <select name="type">
                <optgroup>
                  <option value="1">Virement</option>
                  <option value="2">Prelevement</option>
                  <option value="3">Carte bancaire</option>
                  <option value="4">Cheque</option>
                  <option value="5">Internet</option>
                </optgroup>
            </select>

            <br>

            Categorie:
            <select name="category">
                <optgroup>
                  <?php
                  $i = 0;
                  while ($i < count($user->_category))
                  {
                    echo '<option value="' . $user->_category[$i]['category_id'] .
                    '">' . $user->_category[$i]['name'] . '</option>';
                    $i += 1;
                  }
                  ?>
                 </optgroup>
            </select>

            <br>

            <input type="radio" name="nature" value="C">
            <label for="credit">Crédit</label>
            <input type="radio" name="nature" value="D" checked>
            <label for="debit">Débit</label>

            <input type="hidden" value="0" name="regular">
            <input type="checkbox" name="regular" value="1">
            <label for="regular">Dépense fixe</label>

            <br>

            <input type="submit" value="Envoyer">

          </form>

          <?php
          echo '<form action="index.php?user=' . $user->_user['user_id'] .
          '&set=category" method="post">';
          ?>
            <h1>Ajout d\'une categorie</h1><br>

            <input type="text" placeholder="Nom" name="name"> <br>
            <input type="submit" value="Envoyer">
          </form>

          <?php
          echo '<form action="index.php?user=' . $user->_user['user_id'] .
          '&set=type" method="post">';
          ?>
            <h1>Ajout d\'une categorie</h1><br>

            <input type="text" placeholder="Nom" name="name"> <br>
            <input type="submit" value="Envoyer">
          </form>
    </body>
</html>
