<?php

require_once './Model/Core/Adapter.php';
require_once './Controller/Core/Admin.php';

class Customer extends Admin
{
    protected $customer = [];

    public function gridAction()
    {
        $query = "select * from customer";
        $adapter = new Adapter();
        $customer = $adapter->fetchAll($query);
        $this->setCustomer($customer);
        require_once './View/customer/grid.php';
    }
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }
    public function getCustomer()
    {
        return $this->customer;
    }

    public function customerinsertAction()
    {
        require_once './View/customer/customerinsert.php';
    }
    public function customerupdateAction()
    {
        $id = $_GET['id'];
        $query = "select * from customer where `id`=$id";
        $adapter = new Adapter();
        $row = $adapter->fetchRow($query);
        require_once './View/customer/customerupdate.php';
    }
    public function saveAction()
    {
        $adapter = new Adapter();
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $status = $_POST['status'];
        date_default_timezone_set("Asia/Calcutta");
        $t = date('Y-m-d H:i');
        $adapter->insert("INSERT INTO `customer` (`firstname`, `lastname`, `email`, `mobile`, `password`, `status`, `createdDate`, `updatedDate`) VALUES ('$firstname', '$lastname', '$email', '$mobile', '$password', '$status', '$t', '$t');");
        header("location:customerview.php");
        $this->redirect('grid', 'Customer');
    }
    public function updateAction()
    {
        $adapter = new Adapter();
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $status = $_POST['status'];
        date_default_timezone_set("Asia/Calcutta");
        $t = date('Y-m-d H:i');
        $adapter->update("UPDATE `customer` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', `mobile` = '$mobile', `password` = '$password', `status` = '$status' , `updatedDate`='$t' WHERE `customer`.`id` = $id;");
        $this->redirect('grid', 'Customer');
    }
    public function customerdeleteAction()
    {
        $id = $_GET['id'];
        $adapter = new Adapter();
        $adapter->delete("DELETE FROM `customer` where `id`=$id");
        $this->redirect('grid', 'Customer');
    }
}