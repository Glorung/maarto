<?php


// Teste si toutes les $values dans $array existe
function issetArray($array, $values)
{
    $i = 0;
    $good = true;
    
    // Parcours les valeurs
    while ($good == true && $i < count($values))
    {
        if (!ISSET($array[$values[$i]]))
            $good = false;
        $i += 1;
    }
    return ($good);
}

function checkOperation($user, $post)
{
    $values = array('date', 'name', 'nature',
                    'balance', 'regular', 'account',
                    'category', 'type');

    if (issetArray($post, $values))
    {
        $post['balance'] = abs($post['balance']);



        $testedValue = explode("-", $post['date']);
        if (count($testedValue) == 3 &&
                strlen($testedValue[0]) == 4 && ((int)$testedValue[0] <= 2018) &&
                strlen($testedValue[1]) == 2 && ((int)$testedValue[1] <= 12) &&
                strlen($testedValue[2]) == 2 && ((int)$testedValue[2] <= 31))
           {
            $testedValue = strlen($post['name']);
            if ($testedValue > 3 && $testedValue <= 50)
            {
                if ($post['nature'] == "C" || $post['nature'] == "D")
                {
                   if (is_int($post['balance']))
                   {
                       if ($post['regular'] == "0" || $post['regular'] == "1")
                       {
                           if ($post['account'])
                           {
                               if($post['category'])
                               {
                                   if ($post['type'])
                                   {
                                       return (true);
                                   }
                                   else 
                                       $user->_error = "Erreur: Type de paiement invalide.";
                               }
                               else
                                $user->_error = "Erreur: Catégorie non valide.";

                           }
                           else
                            $user->_error = "Erreur: Compte en banque inexistant.";

                       }
                       else
                        $user->_error = "Erreur[regular]: Formulaire invalide.";

                   }
                   else
                    $user->_error = "Erreur: Montant invalide.";                    
                }
                else
                    $user->_error = "Erreur[nature]: Formulaire invalide.";
            }
            else
                $user->_error = "Erreur: Libellé de l'opération invalide.";
        }
        else
            $user->_error = "Erreur: Date invalide.";
        echo $user->_error;
    return (false);
    }
    $user->_error = "Errer: Tous les champs ne sont pas rempli.";
    return (false);
}


function sendOperation($user, $post)
{
    $cmd = "INSERT INTO operation (date, name, count, regular, user_id, account_id, category_id, type_id)" .
            " VALUES ('" .
                $post['date'] . " 00:00:00', '" .
                $post['name'] . "', '";
    if ($post['nature'] == "D")
        $post['balance'] = "-" . $post['balance'];
    $cmd = $cmd . ($post['balance'] * 100) . "', '" .
                $post['regular'] . "', '" .
                $user->_user['user_id'] . "', '" .
                $post['account'] . "', '" .
                $post['category'] . "', '" .
                $post['type'] . "')";

    echo $cmd;
//   $db = new SQL_Connect();
//   $db->connect("Vincent_Bank");
//   $db->set($cmd);
}

function setOperation($user, $post)
{
    var_dump($post);
    
    if (checkOperation($user, $post))
    {
        $user->selectAccount($post['account']);
        if ($user->_error == NULL)
            sendOperation($user, $post);
    }
}