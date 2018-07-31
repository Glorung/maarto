<?php

function viewHost($user)
{
    // Definition of page's tittle
    $title = "Bank Management";

    // Definition of links
        // Host webpage
    $host = array   ("action" => "?user=" . $user->_user['user_id'],
                    "name" => "Acceuil");
    
        // Set all the webpage's links
    $links = array  ($host);

    // Show webpage
    require_once('src/view/template/host.php');
}