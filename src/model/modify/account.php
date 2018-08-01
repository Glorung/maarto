<?php

function updateAccount($user, $post)
{
    $money = $user->_selectedAccount['balance'];
    $postMoney = $post['balance'];
    $postMoney = $postMoney * 100;
    if ($post['nature'] == "D")
      $newMoney = $money - $postMoney;
    else
      $newMoney = $money + $postMoney;

    $cmd = "UPDATE account " .
            " SET balance = " . $newMoney .
            " WHERE account_id = " . $user->_selectedAccount['account_id'];
    $db = new SQL_Connect();
    $db->connect("Vincent_Bank");
    $db->set($cmd);
}
?>
