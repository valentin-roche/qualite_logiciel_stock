<?php
require_once "User.php";
require_once "../DAO/DAOUser.php";

class UserStub extends User
{
    /**
     * UserStub constructor.
     */
    public function __construct()
    {
        parent::__construct(0, "000000", "0000000", "test", "employe", "employe@sport.fr");
    }
}