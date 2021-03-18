<?php
namespace Model\Core;

class Adapter
{
    private $config = [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'php',
    ];

    private $connect = null;
    public function connection()
    {
        $connect = new \mysqli($this->config['host'], $this->config['username'], $this->config['password'], $this->config['database']);
        $this->setConnect($connect);
        if (!$connect) {
            return false;
        } else {
            return true;
        }
    }

    public function getConnect()
    {
        return $this->connect;
    }
    public function setConnect($connect)
    {
        $this->connect = $connect;
        return $this;
    }

    public function isConnected()
    {
        if (!$this->getConnect()) {
            return false;
        }
        return true;
    }

    public function fetchRow($query = null)
    {

        if (!$this->isConnected()) {
            $this->connection();
        }

        $result = $this->getConnect()->query($query);

        $rows = $result->fetch_assoc();
        if (!$rows) {
            return false;
        }
        return $rows;
    }
    public function fetchAll($query = null)
    {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        if (!$rows) {
            return false;
        }
        return $rows;
    }

    public function insert($query)
    {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        if (!$result) {
            return false;
        }
        return $this->getConnect()->insert_id;
    }
    public function query($query)
    {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        if (!$result) {
            return false;
        }
        return true;
    }

    public function update($query)
    {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);

        if (!$result) {
            return false;
        }

        return true;
    }
    public function fetchPairs($query = null)
    {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);
        $rows = $result->fetch_all();
        if (!$rows) {
            return $rows;
        }
        $columns = array_column($rows, '0');
        $values = array_column($rows, '1');
        return array_combine($columns, $values);
    }
    public function delete($query)
    {
        if (!$this->isConnected()) {
            $this->connection();
        }
        $result = $this->getConnect()->query($query);

        if (!$result) {
            return false;
        }
        return true;
    }
}