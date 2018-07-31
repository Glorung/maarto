<?php

require_once ('src/model/class/Connect.class.php');

function getBankById($id)
{
    $cmd = "SELECT *" .
            " FROM bank" .
            " WHERE bank_id = " . $id;
    
    $db = new SQL_Connect();
    $db->connect("Vincent_Bank");
    $answer = $db->ask($cmd);
    return ($answer);
}