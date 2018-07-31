<?php

require_once ('src/model/class/Connect.class.php');

function getAgencyById($id)
{
    $cmd = "SELECT *" .
            " FROM agency" .
            " WHERE agency_id = " . $id;
    
    $db = new SQL_Connect();
    $db->connect("Vincent_Bank");
    $answer = $db->ask($cmd);
    return ($answer);
}