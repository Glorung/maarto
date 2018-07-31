<?php


require_once('src/model/class/UserAccount.class.php');


// view
require_once ('src/view/model/host.php');
require_once('src/view/model/accountDetail.php');

function frontController($get)
{
    // if a user is set
    if (ISSET($get['user']))
    {
        $user = new UserAccount($get['user']);
        if ($user->_error == NULL)
        {
            if (ISSET($get['account']))
            {
                $user->selectAccount($get['account']);
                
                if ($user->_error == NULL)
                    viewAccountDetail($user);
                else
                   echo $user->_error;
            }
            else
                viewHost($user);
        }
        else
            echo $user->_error;
    }
    else
        viewLogin();
}