<?php

/**
 * Class AccessDB
 *
 * @author   Mario Henmanuel Vargas Ugalde <hemma.hvu@gmail.com>
 */
class AccessDB extends db
{
    protected $host;
    protected $user;
    protected $password;
    protected $db;
    protected $auth;

    /**
     * INPUT constructor.
     */
    function __construct()
    {

    }

    public function db($host, $user, $password, $db)
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->db = 'loop';

        $this->auth = new db($host, $user, $password, $db);
    }
}