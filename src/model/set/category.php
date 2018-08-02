<?php


function checkCategory($user, $post)
{
    $user->_errorFrom = "category";
    if (checkName($user, $post['name']))
        return (true);
    return false;
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
    $post['name'] = htmlentities(trim(strip_tags($post['name'], ENT_NOQUOTES)));
    
    if (checkCategory($user, $post))
        sendCategory($user, $post);
    viewForm($user);
}