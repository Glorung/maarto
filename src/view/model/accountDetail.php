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
    
        // Set all the webpage's links
    $links = array  ($host);
    
    require_once ('src/view/template/accountDetail.php');
}