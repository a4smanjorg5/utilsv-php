<?php
interface IStorage
{
    function getItem($keyName);
    function setItem($keyName, $keyValue);
    function removeItem($keyName);
    function clear();
    function count();
}

?>
