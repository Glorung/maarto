<?php

require_once 'src/model/check/operation.php';

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

    echo $cmd;
//   $db = new SQL_Connect();
//   $db->connect("Vincent_Bank");
//   $db->set($cmd);
}

function setOperation($user, $post)
{   
    if (checkOperation($user, $post))
    {
        $user->selectAccount($post['account']);
        if ($user->_error == NULL)
            sendOperation($user, $post);
    }
    else
        viewForm($user);
}