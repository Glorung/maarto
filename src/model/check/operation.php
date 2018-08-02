<?php

function    checkOperationDate($user, $date)
{
    $date = explode("-", $date);
    if (count($date) == 3 &&
        strlen($date[0]) == 4 && ((int)$date[0] <= 2018) &&
        strlen($date[1]) == 2 && ((int)$date[1] <= 12) &&
        strlen($date[2]) == 2 && ((int)$date[2] <= 31))
        return true;
    else
        $user->_error = "Erreur: Date invalide: " . $date;
    return false;
}

function    checkName($user, $name)
{
    $name = strlen($name);
    if ($name >= 3 && $name <= 50)
        return true;
    else
        $user->_error = "Erreur: Libellé de l'opération invalide.";
    return false;
}

function    checkNature($user, $nature)
{
    if ($nature == "C" || $nature == "D")
        return true;
    else
        $user->_error = "Erreur[nature]: Formulaire invalide.";
    return false;
}

function    checkBalance($user, $balance)
{
    if (is_int($balance) || is_float($balance))
        return true;
    else
        $user->_error = "Erreur: Montant invalide: " . $balance;
    return false;
}

function    checkRegular($user, $regular)
{
    if ($regular == "0" || $regular == "1")
        return true;
    else
        $user->_error = "Erreur[regular]: Formulaire invalide.";
    return false;
}

function    checkAccount($user, $account)
{
    $user->selectAccount($account);
    if ($user->_error == NULL)
        return true;
    else
        $user->_error = "Erreur: Compte en banque inexistant.";
    return false;
}

function    checkOperationCategory($user, $category)
{
    if ($user->_category != NULL)
    {
        $i = 0;
        
        while ($i < count($user->_category) &&
                $user->_category[$i]['category_id'] != $category)
            $i = $i + 1;
        if ($user->_category[$i]['category_id'] == $category)
            return true;
        else
        {
            $user->_error = "Erreur: Catégorie non valide.";
            return false;
        }
    }
    else
        $user->_error = "Erreur: Catégorie non valide.";
    return false;
}

function    checkType($user, $type)
{
    if ($type)
        return true;
    else
        $user->_error = "Erreur: Type de paiement invalide.";
}
