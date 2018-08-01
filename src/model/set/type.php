<?php


function checkBankType($user, $post)
{
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
    var_dump($post);

    if (checkType($user, $post))
    {
        if ($user->_error == NULL)
        {
            sendBankType($user, $post);
        }
    }
}