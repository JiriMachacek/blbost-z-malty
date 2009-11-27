<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author jmachacek
 */
class user {
    private static $instance;
    private $userID;

    private function __construct()
    {}

    public static function getInstance()
    {
        if (self::$instance === NULL) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    final public function __clone()
    {
        throw new Exception('Clone is not allowed');
    }

    final public function __wakeup()
    {
        throw new Exception('Unserialization is not allowed');
    }

    public function setUserID($id)
    {
        $this->userID = (int) $id;
    }

    public function getUserID()
    {
        return ($this->userID <> 0) ? $this->userID : false;
    }

    public function isLogged()
    {
        return ($this->userID <> 0) ? true : false;
    }
}
?>
