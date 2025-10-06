<?php

namespace Controllers;

use Config\Database;
use Models\Category;

class CategoryController
{
    private $category_model;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->category_model = new Category($db);
    }

    public function index()
    {
        $stmt = $this->category_model->read();
        $categories = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        require_once('../views/categories/index.php');
    }

    public function create()
    {
        if ($_POST) {
            $this->category_model->name = $_POST['name'];
            if ($this->category_model->create()) {
                header("Location: /categories");
            }
        }
        require_once('../views/categories/create.php');
    }

    public function edit($id)
    {
        $this->category_model->id = $id;
        $this->category_model->readSingle();

        if ($_POST) {
            $this->category_model->name = $_POST['name'];
            if ($this->category_model->update()) {
                header("Location: /categories");
            }
        }
        require_once('../views/categories/edit.php');
    }

    public function delete($id)
    {
        $this->category_model->id = $id;
        $this->category_model->delete();
        header("Location: /categories");
    }
}