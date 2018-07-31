<?php

require_once ('src/model/class/Connect.class.php');

function getAccountByUserId($id)
{
    $cmd = "SELECT *" .
            " FROM account" .
            " WHERE user_id = " . $id;
    
    $db = new SQL_Connect();
    $db->connect("Vincent_Bank");
    $answer = $db->ask($cmd);
    return ($answer);
}

function getAccountById($id)
{
    $cmd = "SELECT *" .
            " FROM account" .
            " WHERE account_id = " . $id;
    
    $db = new SQL_Connect();
    $db->connect("Vincent_Bank");
    $answer = $db->ask($cmd);
    return ($answer);
}

