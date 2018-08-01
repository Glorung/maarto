<?php

function viewLogin()
{
    // Definition of page's tittle
    $title = "Redirection";

    // Definition of where to go after login
    $siteUrl = "http://sites.elannet.info/stasta/PhpProject1/maarto/";
    $redirectionTo = "index.php?user=1";
    $redirection = $siteUrl . $redirectionTo;

    // Show webpage
    require_once('src/view/template/login.php');
}