<?php

// Custom-Klassen müssen vor dem Starten der Session eingebunden werden, ansonsten werden diese in __PHP_Incomplete_Class übersetzt
require_once("Dbconnector.php");
class CustomSession
{

/**
 * Eigene Implementation der Session, damit diese von der Logik getrennt ist.
 */

    private static $instance;
    public $db_link;
    /**
     * SessionHandler constructor.
     */
    private function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $this->db_link = Dbconnector::getInstance();
        }
    }
    public static function getInstance(): CustomSession
    {
        if (!isset(self::$instance)) { // If no instance then create one
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function destroySession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
    }

    // Current User
    public function setCurrentUser($user)
    {
        $_SESSION['CurrentUser'] = $user;
    }
    public function getCurrentUser()//TODO PHP7.1 : ?User
    {
        return isset($_SESSION['CurrentUser']) ? $_SESSION['CurrentUser'] : null;
    }

}