<?php
class SessionStorage implements IStorage
{
    private static $sess;
    private function __construct()
    {
    }
    static function load() {
        if (defined('NOSESS'))
            trigger_error(sprintf("Call to undefined method %s. Please don't define NOSESS",
             __METHOD__), E_USER_ERROR);
        if (!self::$sess) {
            session_start();
            self::$sess = new SessionStorage();
        }
        return self::$sess;
    }
    function getItem($keyName) {
        return $_SESSION[$keyName];
    }
    function setItem($keyName, $keyValue) {
        $_SESSION[$keyName] = $keyValue;
        return true;
    }
    function removeItem($keyName) {
        unset($_SESSION[$keyName]);
        return true;
    }
    function clear() {
        return session_unset();
    }
    function count() {
        return count($_SESSION);
    }
}
?>
