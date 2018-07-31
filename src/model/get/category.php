<?php

require_once ('src/model/class/Connect.class.php');

function getCategoryByUserId($id)
{
    $cmd = "SELECT *" .
            " FROM category" .
            " WHERE user_id = " . $id;
    
    $db = new SQL_Connect();
    $db->connect("Vincent_Bank");
    $answer = $db->ask($cmd);
    return ($answer);
}