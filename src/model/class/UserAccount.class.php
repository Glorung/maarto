<?php

// Database
require_once ('src/model/get/account.php');
require_once ('src/model/get/agency.php');
require_once ('src/model/get/bank.php');
require_once ('src/model/get/category.php');
require_once ('src/model/get/operation.php');
require_once ('src/model/get/type.php');
require_once ('src/model/get/user.php');

// A SQL implementation
class UserAccount
{
// Attributes

    public      $_user;
    public      $_account;
    public      $_selectedAccount;
    public      $_agency;
    public      $_bank;
    public      $_operations;
    public      $_type;
    public      $_category;

    public      $_error;

// Construct/Destruct
    public function __construct($userId)
    {
        $this->_error = NULL;

        // get user data
        $this->_user = getUserById($userId);
        if (empty($this->_user[0]))
            $this->_error = "Erreur: Utilisateur non trouvé";
        else
            $this->_user = $this->_user[0];
        
        // init data
        $this->_selectedAccount = NULL;
        $this->_operations = NULL;
        $this->initAccount();
        $this->initAgency();
        $this->initBank();
    }

    public function __destruct()
    {
    }

// Members
    
    private function initAccount()
    {
        if ($this->_error == NULL)
        {
            $this->_account = getAccountByUserId($this->_user['user_id']);
            if (empty($this->_account[0]))
                $this->_account = NULL;
        }
    }
    
    private function initAgency()
    {
        if ($this->_error == NULL)
        {
            if ($this->_account != NULL)
            {
               $this->_agency = getAgencyById($this->_account[0]['agency_id']);
               $this->_agency = $this->_agency[0];
            }
            else
                $this->_agency = NULL;
        }
    }
    
    private function initBank()
    {
        if ($this->_error == NULL)
        {
            if ($this->_agency != NULL)
            {
                $this->_bank = getBankById($this->_agency['bank_id']);
            }
            else
                $this->_bank = NULL;
        }
    }
    
    public function selectAccount($accountId)
    {
        // Set the account and check if the user can read into it
        $this->_selectedAccount = getAccountById($accountId);
        if (empty($this->_selectedAccount[0]))
            $this->_error  = "Erreur: Compte " . $accountId ." non trouvé.";
        else if ($this->_selectedAccount[0]['user_id'] != $this->_user['user_id'])
            return ("Erreur: Accès refusé.");
        else
            $this->_selectedAccount = $this->_selectedAccount[0];

        if ($this->_error == NULL)
            $_operations = getOperationByAccountId($this->_selectedAccount['account_id']);
    }
}