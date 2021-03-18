<?php
namespace Model\Core;

class Session
{

    protected $namespace = null;

    public function __construct()
    {
        $this->start();
        $this->setNamespace('core');
    }
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
        return $this;

    }
    public function getNamespace()
    {
        return $this->namespace;
    }
    public function start()
    {
        if (session_status() == PHP_SESSION_NONE) {

            session_start();
        }
        return $this;
    }
    public function destroy()
    {
        session_destroy();
        return $this;
    }
    public function getId()
    {
        return session_id();
    }
    public function regenrateId()
    {
        return session_regenerate_id();
    }
    public function __set($key, $value = null)
    {
        $_SESSION[$this->getNamespace()][$key] = $value;
        return $this;
    }
    public function __get($key)
    {
        if (!$_SESSION) {
            return null;
        }
        if (!array_key_exists($key, $_SESSION[$this->getNamespace()])) {
            return null;
        }
        return $_SESSION[$this->getNamespace()][$key];
    }
    public function __unset($key)
    {
        if (!array_key_exists($key, $_SESSION[$this->getNamespace()])) {
            return null;
        }
        unset($_SESSION[$this->getNamespace()][$key]);
        return $this;
    }

}