<?php

require_once ('src/model/class/Connect.class.php');

function getUserList()
{
    $cmd = "SELECT *" .
            " FROM user";

    $db = new SQL_Connect();
    $db->connect("Vincent_Bank");
    $answer = $db->ask($cmd);
    return ($answer);
}

function getUserById($id)
{
    $cmd = "SELECT *" .
            " FROM user" .
            " WHERE user_id =" . $id;

    $db = new SQL_Connect();
    $db->connect("Vincent_Bank");
    $answer = $db->ask($cmd);
    return ($answer);
}