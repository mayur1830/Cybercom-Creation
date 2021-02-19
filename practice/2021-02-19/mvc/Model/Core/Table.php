<?php
require_once "Adapter.php";

class Model_Table
{
    protected $primaryKey = null;
    protected $tableName = null;
    protected $adapter = Null;
    protected $data = [];

    public function __construct()
    {
    }
    public function setAdapter()
    {
        $this->adapter = new Adapter();
        return $this;
    }
    public function getAdapter()
    {
        if (!$this->adapter) {
            $this->setAdapter();
        }
        return $this->adapter;
    }
    public function setPrimaryKey($p)
    {
        $this->primaryKey = $p;
        return $this;
    }
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }
    public function setTableName($t)
    {
        $this->tableName = $t;
        return $this;
    }
    public function getTableName()
    {
        return $this->tableName;
    }
    public function getPrimaryKeyValue()
    {
        if (!array_key_exists($this->getPrimaryKey(), $this->data)) {
            return null;
        }
        return $this->data[$this->getprimaryKey()];
    }
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }
    public function __get($key)
    {
        if (!array_key_exists($key, $this->data)) {
            return null;
        }
        return $this->data[$key];
    }
    public function setData(array $d)
    {
        $this->data = array_merge($this->data, $d);
        return $this;
    }
    public function getData()
    {
        return $this->data;
    }
    public function save()
    {
        if (!array_key_exists($this->getPrimaryKey(), $this->data)) {

            $keys = "`" . implode('`,`', array_keys($this->data)) . "`";

            $values = "'" . implode("','", $this->data) . "')";

            $query = "INSERT INTO `" . $this->getTableName() . "` (" . $keys . ") VALUES (" . $values;

            return $this->getAdapter()->insert($query);
        }
        $args = [];
        foreach ($this->data as $key => $value) {
            $args[] =   "`$key` = '$value'";
        }
        $query = "UPDATE `" . $this->getTableName() . "` SET " . implode(',', $args) . " " . "WHERE `" . $this->getTableName() . "`.`" . $this->getPrimaryKey() . "` = " . $this->getPrimaryKeyValue();
        return  $this->getAdapter()->update($query);
    }

    public function load($id)
    {
        $value = (int)$id;
        $query = "SELECT * FROM `{$this->getTableName()}`WHERE `{$this->getPrimaryKey()}`={$value}";
        return $this->fetchRow($query);
    }
    public function fetchRow($query)
    {
        $row = $this->getAdapter()->fetchRow($query);
        if (!$row) {
            return null;
        }
        $this->data = $row;
        return $this;
    }
    public function fetchAll()
    {
        $query = "SELECT * FROM  `{$this->getTableName()}`";
        $rows = $this->getAdapter()->fetchAll($query);
        if (!$rows) {
            return null;
        }
        $this->setData($rows);
        return $this->getData();
    }
}