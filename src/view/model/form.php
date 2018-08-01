<?php

function viewForm($user)
{
    // Definition of page's tittle
    $title = "Formulaires";

    // Definition of links
        // Host webpage
    $host = array   ("action" => "?user=" . $user->_user['user_id'],
                    "name" => "Acceuil");

                  // Definition of form
                $form = array   ("action" => "?user=" . $user->_user['user_id'] .
                                            "&form=1",
                                "name" => "Formulaires",
                                "active" => true);

                $changeAccount = array   ("action" => "",
                                 "name" => "Changer de compte",
                                "right" => true);
                
                // Set all the webpage's links
                $links = array  ($host,
                                $form,
                                $changeAccount);

    // Show webpage
    require_once('src/view/template/form.php');
}
