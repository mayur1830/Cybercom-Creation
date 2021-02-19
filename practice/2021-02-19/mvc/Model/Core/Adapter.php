<?php
class Adapter
{
    private $config = [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'php'
    ];

    private $connect = null;
    public function connection()
    {
        $connect = new mysqli($this->config['host'], $this->config['username'], $this->config['password'], $this->config['database']);
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

    public function fetchRow($query)
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
    public function fetchAll($query)
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
// $a = new Adapter();
// date_default_timezone_set("Asia/Calcutta");
// $t = date('Y-m-d H:i');
// $x = $a->insert("INSERT INTO `product` (`sku`, `name`, `price`, `discount`, `quentity`, `description`, `status`, `createdDate`, `updatedDate`) VALUES ('jdj', 'oil', '250', '0.05', '3', 'this is tea','enable', '$t', '$t');");
// echo $x;
//$a->update("UPDATE `product` SET `sku` = '20223kdkkdmm', `name` = 'powder', `price` = '280.8609', `discount` = '0.054', `description` = 'this is tea,', `status` = 'enablemdm', `createdDate` = '2021-02-24 14:47:00', `updatedDate` = '2021-02-03 14:47:00' WHERE `product`.`id` = 9;");
// $x = $a->fetchRow("SELECT * FROM `product` WHERE `id`='11'");
// echo "<pre>";
// print_r($x);