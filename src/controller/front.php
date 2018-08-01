<?php


require_once('src/model/class/UserAccount.class.php');


// view
require_once ('src/view/model/host.php');
require_once ('src/view/model/form.php');
require_once('src/view/model/accountDetail.php');

function frontController($get, $post = NULL)
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
            else if (ISSET($get['form']))
              viewForm($user);
            else if (ISSET($get['set']))
              setController($user, $get, $post);
            else
                viewHost($user);
        }
        else
            echo $user->_error;
    }
    else
        viewLogin();
}


// Setters
require_once ('src/model/set/category.php');
require_once ('src/model/set/operation.php');
require_once ('src/model/set/type.php');

function setController ($user, $get, $post)
{
  var_dump($post);

  $value = $get['set'];

  if ($value == "operation")
    setOperation($user, $post);
  else if ($value == "category")
    setCategory($user, $post);
  else if ($value == "type")
    setBankType($user, $post);
  else
    echo "Erreur: Ce formulaire n'est pas reconnu.";
}
