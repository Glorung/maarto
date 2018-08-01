<?php

require_once('src/controller/front.php');
require_once('src/view/model/login.php');

if (count($_GET) == 0)
    viewLogin();
else
  {
    if (ISSET($_POST['name']))
      frontController($_GET, $_POST);
    else
      frontController($_GET);
  }
