<?php

// categorie
// $type
// compte
// Banque

function viewAccountDetail($user)
{
    // Definition of page's tittle
    $title = "Mon compte ";

    // Definition of links
        // Host webpage
    $host = array   ("action" => "?user=" . $user->_user['user_id'],
                    "name" => "Acceuil");
        // Definition of form
    $form = array   ("action" => "?user=" . $user->_user['user_id'] .
                                "&form=1",
                                "name" => "Formulaires");
    $changeAccount = array  ("action" => "",
                            "name" => "Changer de compte",
                            "right" => true);

    // Set all the webpage's links
    $links = array  ($host,
                    $form,
                    $changeAccount);

    require_once ('src/view/template/accountDetail.php');
}
