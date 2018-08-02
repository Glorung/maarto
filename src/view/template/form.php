<?php

require_once 'src/view/template/navBar.php';

echo '<div class="card">';

echo '<form action="index.php?user=' . $user->_user['user_id'] .
                                    '&set=operation" method="post">';
?>


<h1>Ajout d'une operation</h1><br>
Compte:
<select class="form-control" name="account">
        <?php
            $i = 0;
            while ($i < count($user->_account))
            {
              echo '<option value="' . $user->_account[$i]['account_id'] .
              '">' . $user->_account[$i]['name'] . '</option>';
              $i += 1;
            }
        ?>
</select>
<br>
<input class="form-control" type="text" placeholder="Libellé de l'opération" name="name"><br>
<input class="form-control" type="date" name="date"> <br>
<input class="form-control" type="number" step="any" placeholder="Montant de l'opération" name="balance"><br>

Type:
<select class="form-control" name="type">
    <optgroup label="Type de paiement">
        <option value="1">Virement</option>
        <option value="2">Prelevement</option>
        <option value="3">Carte bancaire</option>
        <option value="4">Cheque</option>
        <option value="5">Internet</option>
    </optgroup>
</select>
<br>

Categorie:
<select class="form-control" name="category">
        <?php
            $i = 0;
            while ($i < count($user->_category))
            {
              echo '<option value="' . $user->_category[$i]['category_id'] .
              '">' . $user->_category[$i]['name'] . '</option>';
              $i += 1;
            }
        ?>
</select>
<br>

<input type="radio" name="nature" value="C">
<label for="credit">Crédit</label>
<input type="radio" name="nature" value="D" checked>
<label for="debit">Débit</label><br>

<label for="regular">Dépense fixe</label>
<input type="hidden" value="0" name="regular">
<input type="checkbox" name="regular" value="1">

<br>

<input type="submit" value="Envoyer"><br>

<?php
    if ($user->_errorFrom == "operation")
    {
        echo '<br>';
        if ($user->_error)
            echo $user->_error;
        else
            echo "Votre demande a bien été prise en compte.";
    }
    echo "</form>";

    echo '<form action="index.php?user=' .  $user->_user['user_id'] .
                                            '&set=category" method="post">';
?>

<br>
<h1>Ajout d'une categorie</h1>
<br>

<input type="text" placeholder="Nom" name="name"> <br>
<input type="submit" value="Envoyer">
</form>

<?php
    if ($user->_errorFrom == "category")
    {
        echo '<br>';
        if ($user->_error)
            echo $user->_error;
        else
            echo "Votre demande a bien été prise en compte.";
    }
echo '<form action="index.php?user=' . $user->_user['user_id'] .
                                    '&set=operation" method="post">';
?>


<br>
<h1>Ajout d'un type</h1>
<br>

<input type="text" placeholder="Nom" name="name"> <br>
<input type="submit" value="Envoyer">
</form>

<?php
    if ($user->_error && $user->_errorFrom == "type")
        echo $user->_error;
?>

</div>

</body>
</html>
