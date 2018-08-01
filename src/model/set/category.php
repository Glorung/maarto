<?php


function checkCategory($user, $post)
{
    $user->_errorFrom = "category";
    return (true);
}

function sendCategory($user, $post)
{
    $cmd = "INSERT INTO category (name, user_id)" .
            " VALUES ('" .
            $post['name'] . "', '" .
            $user->_user['user_id'] . "')";
    
    $db = new SQL_Connect();
    $db->connect("Vincent_Bank");
    $db->set($cmd);
}

function setCategory($user, $post)
{
    var_dump($post);

    if (checkCategory($user, $post))
        sendCategory($user, $post);
}