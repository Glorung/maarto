<?php

require_once ('src/model/class/Connect.class.php');

function getTypeByBankId($id)
{
    $cmd = "SELECT *" .
            " FROM type" .
            " WHERE bank_id = " . $id;

    $db = new SQL_Connect();
    $db->connect("Vincent_Bank");
    $answer = $db->ask($cmd);
    return ($answer);
}
