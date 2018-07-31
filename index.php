<?php

require_once('src/controller/front.php');
require_once('src/view/model/login.php');

if (count($_GET) == 0)
    viewLogin();
else
    frontController($_GET);