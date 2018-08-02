<?php


function checkBankType($user, $post)
{
    $user->_errorFrom = "type";
    return (true);
}

function sendBankType($user, $post)
{
     $cmd = "INSERT INTO operation (date, name, count, regular, user_id, account_id, category_id, type_id)" .
            " VALUES ()";
     
    $db = new SQL_Connect();
    $db->connect("Vincent_Bank");
    //$db->set($cmd);
}

function setBankType($user, $post)
{
    if (checkType($user, $post))
    {
        $user->_errirFrom = "type";
        $user->_error = "Error: La fonctionnalité n'est pas encore implémenté.";
        
    }
}