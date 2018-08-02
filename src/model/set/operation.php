<?php

require_once 'src/model/check/operation.php';
require_once 'src/model/modify/account.php';

// Teste si toutes les $values dans $array existe
function issetArray($array, $values)
{
    $i = 0;
    $good = true;

    // Parcours les valeurs
    while ($good == true && $i < count($values))
    {
        if (!ISSET($array[$values[$i]]))
            $good = false;
        $i += 1;
    }
    return ($good);
}

function checkOperation($user, $post)
{
    $values = array('date', 'name', 'nature',
                    'balance', 'regular', 'account',
                    'category', 'type');

    $user->_errorFrom = "operation";
    if (issetArray($post, $values))
    {
        $post['balance'] = abs($post['balance']);

        if  (checkOperationDate($user, $post['date']) &&
            checkName($user, $post['name']) &&
            checkNature($user, $post['nature']) &&
            checkBalance($user, $post['balance']) &&
            checkRegular($user, $post['regular']) &&
            checkAccount($user, $post['account']) &&
            checkOperationCategory($user, $post['category']) &&
            checkType($user, $post['type']))
                return true;
        else
        {
            echo $user->_error;
            return false;
        }
    }
    $user->_error = "Errer: Tous les champs ne sont pas rempli.";
    return (false);
}


function sendOperation($user, $post)
{
    $cmd = "INSERT INTO operation (date, name, count, regular, user_id, account_id, category_id, type_id)" .
            " VALUES ('" .
                $post['date'] . " 00:00:00', '" .
                $post['name'] . "', '";
    if ($post['nature'] == "D")
        $post['balance'] = "-" . $post['balance'];
    $cmd = $cmd . ($post['balance'] * 100) . "', '" .
                $post['regular'] . "', '" .
                $user->_user['user_id'] . "', '" .
                $post['account'] . "', '" .
                $post['category'] . "', '" .
                $post['type'] . "')";

     $db = new SQL_Connect();
     $db->connect("Vincent_Bank");
     $db->set($cmd);
}

function setOperation($user, $post)
{
   $post['date'] = htmlentitie(strim(strip_tags($post['date'], ENT_NOQUOTES)));
   $post['name'] = htmlentitie(trim(strip_tags($post['name'], ENT_NOQUOTES)));
   $post['nature'] = htmlentitie(trim(strip_tags($post['nature'], ENT_NOQUOTES)));
   $post['balance'] = htmlentitie(trim(strip_tags($post['balance'], ENT_NOQUOTES)));
   $post['regular'] = htmlentitie(trim(strip_tags($post['regular'], ENT_NOQUOTES)));
   $post['account'] = htmlentitie(trim(strip_tags($post['account'], ENT_NOQUOTES)));
   $post['category'] = htmlentitie(trim(strip_tags($post['category'], ENT_NOQUOTES)));
   $post['type'] = htmlentitie(trim(strip_tags($post['type'], ENT_NOQUOTES)));

    if (checkOperation($user, $post))
    {
        if ($user->_error == NULL)
        {
            updateAccount($user, $post);
            sendOperation($user, $post);
        }
    }
    viewForm($user);
}
