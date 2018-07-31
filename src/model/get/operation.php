<?php

require_once ('src/model/class/Connect.class.php');

function getOperationByUserId($id)
{
    $cmd = "SELECT *" .
            " FROM operation" .
            " WHERE user_id = " . $id;
    
    $db = new SQL_Connect();
    $db->connect("Vincent_Bank");
    $answer = $db->ask($cmd);
    return ($answer);
}

function getOperationByAccountId($id)
{
    $cmd = "SELECT *" .
            " FROM operation" .
            " WHERE account_id = " . $id;
    
    $db = new SQL_Connect();
    $db->connect("Vincent_Bank");
    $answer = $db->ask($cmd);
    return ($answer);
}