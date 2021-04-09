<?php
namespace Model\Core;

class Table
{
    protected $primaryKey = null;
    protected $tableName = null;
    protected $adapter = null;
    public $data = [];

    public function __construct()
    {
    }
    public function setAdapter()
    {
        $this->adapter = \Mage::getModel('Model\Core\Adapter');
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
            $values = "'" . implode("','", $this->data) . "'";
            $query = "INSERT INTO `{$this->getTableName()}` ({$keys}) VALUES ({$values})";
            $id = $this->getAdapter()->insert($query);
        } else {

            $id = array_shift($this->data);
            $args = [];
            foreach ($this->data as $key => $value) {
                $args[] = "`$key` = '$value'";
            }
            $values = implode(',', $args);
            $query = "UPDATE `{$this->getTableName()}` SET {$values} WHERE `{$this->getPrimaryKey()}`= {$id}";
            $this->getAdapter()->update($query);
        }

        $this->load($id);
        return $this;
    }
    public function load($value, $key = null)
    {
        if (!$key) {
            $query = "select *  from  `{$this->getTableName()}` where `{$this->getPrimaryKey()}` = '{$value}'";
        } else {
            $query = "select *  from  `{$this->getTableName()}` where `{$key}` = '{$value}'";
        }

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
    public function fetchAll($query = null)
    {

        if ($query) {
            $rows = $this->getAdapter()->fetchAll($query);
        } else {
            $query = "SELECT * FROM  `{$this->getTableName()}`";
            $rows = $this->getAdapter()->fetchAll($query);
        }

        if (!$rows) {
            return null;
        }

        foreach ($rows as $key => &$value) {
            $row = new $this();
            $value = $row->setData($value);
        }
        $collecttionClassName = get_class($this) . '\Collection';
        $collection = \Mage::getModel($collecttionClassName);
        $collection->setData($rows);
        unset($rows);
        return $collection;
    }
    public function delete($id = null)
    {

        $query = "DELETE FROM `{$this->getTableName()}` where `{$this->getPrimaryKey()}`={$id}";
        return $this->getAdapter()->delete($query);

    }

}