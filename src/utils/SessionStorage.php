<?php

/**
 * This file is part of the utilsv package.
 *
 * (c) a4smanjorg5
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace a4smanjorg5\Utils;

class SessionStorage implements \IStorage
{
    private static $sess;
    private static $started;
    private $cb;
    private function __construct()
    {
    }
    static function load($callback) {
        if (defined('NOSESS'))
            trigger_error(sprintf("Call to undefined method %s. Please don't define NOSESS",
             __METHOD__), E_USER_ERROR);
        assert(is_callable($callback), 'enqueue callback');
        if (!self::$sess)
            self::$sess = new SessionStorage();
        $me = self::$sess;
        if (is_callable($callback)) {
            $cb = $me -> cb;
            $cb[] = $callback;
            $me -> cb = $callback;
        }
        return $me;
    }
    function getItem($keyName) {
        if (self::start())
            return $_SESSION[$keyName];
    }
    function setItem($keyName, $keyValue) {
        if (self::start()) {
            $_SESSION[$keyName] = $keyValue;
            return true;
        }
        return false;
    }
    function removeItem($keyName) {
        if (self::start()) {
            unset($_SESSION[$keyName]);
            return true;
        }
        return false;
    }
    function clear() {
        if (self::start())
            return session_unset();
    }
    function count() {
        if (self::start())
            return count($_SESSION);
    }
    private static function start() {
        if (self::$started)
            return self::$started;
        self::$started = session_start();
        if (!assert(self::$started, 'starting session'))
            return false;
        foreach ($this -> cb as $cb)
            $cb($this);
        return true;
    }
}
?>
