<?php

require_once './Model/Core/Adapter.php';
require_once './Controller/Core/Admin.php';

class Category extends Admin
{
    protected $category = [];

    public function gridAction()
    {
        $query = "select * from category";
        $adapter = new Adapter();
        $category = $adapter->fetchAll($query);
        $this->setCategory($category);
        require_once './View/category/grid.php';
    }
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }
    public function getCategory()
    {
        return $this->category;
    }

    public function categoryinsertAction()
    {

        require_once './View/category/categoryinsert.php';
    }
    public function categoryupdateAction()
    {

        $id = $_GET['id'];
        $query = "select * from category where `id`=$id";
        $adapter = new Adapter();
        $row = $adapter->fetchRow($query);
        require_once './View/category/categoryupdate.php';
    }
    public function saveAction()
    {
        $adapter = new Adapter();
        $name = $_POST['name'];
        $status = $_POST['status'];
        $description = $_POST['description'];
        $adapter->insert("INSERT INTO `category` (`name`, `status`, `description`) VALUES ('$name', '$status',
'$description');");
        $this->redirect('grid', 'Category');
    }
    public function updateAction()
    {
        $adapter = new Adapter();
        print_r($_POST);
        $id = $_POST['id'];
        $name = $_POST['name'];
        $status = $_POST['status'];
        $description = $_POST['description'];
        $adapter->update("UPDATE `category` SET `name` = '$name', `status` = '$status', `description` = '$description' WHERE
`category`.`id` = $id;");
        $this->redirect('grid', 'Category');
    }
    public function categorydeleteAction()
    {
        $id = $_GET['id'];
        $adapter = new Adapter();
        $adapter->delete("DELETE FROM `category` where `id`=$id");
        $this->redirect('grid', 'Category');
    }
}