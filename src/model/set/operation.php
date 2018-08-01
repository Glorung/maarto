<?php


function checkOperation($user, $post)
{
    return (true);
}


function sendOperation($user, $post)
{
    $cmd = "INSERT INTO operation (date, name, count, regular, user_id, account_id, category_id, type_id)" .
            " VALUES ('" .
                $post['date'] . " 00:00:00', '" .
                $post['name'] . "', '";
    if ($post['nature'] == "D")
        $post['balance'] = "-" . $post['balance'];
    $cmd = $cmd . ($post['balance'] * 100) . "', '" .
                $post['regular'] . "', '" .
                $user->_user['user_id'] . "', '" .
                $post['account'] . "', '" .
                $post['category'] . "', '" .
                $post['type'] . "')";

   $db = new SQL_Connect();
   $db->connect("Vincent_Bank");
   $db->set($cmd);
}

function setOperation($user, $post)
{
    var_dump($post);

    if (checkOperation($user, $post))
    {
        $user->selectAccount($post['account']);
        if ($user->_error == NULL)
            sendOperation($user, $post);
    }
}