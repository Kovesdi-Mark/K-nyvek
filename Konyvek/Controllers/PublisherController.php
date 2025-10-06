<?php

namespace Controllers;

use Config\Database;
use Models\Publisher;

class PublisherController
{
    private $publisher_model;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->publisher_model = new Publisher($db);
    }

    public function index()
    {
        $stmt = $this->publisher_model->read();
        $publishers = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        require_once('../views/publishers/index.php');
    }

    public function create()
    {
        if ($_POST) {
            $this->publisher_model->name = $_POST['name'];
            if ($this->publisher_model->create()) {
                header("Location: /publishers");
            }
        }
        require_once('../views/publishers/create.php');
    }

    public function edit($id)
    {
        $this->publisher_model->id = $id;
        $this->publisher_model->readSingle();

        if ($_POST) {
            $this->publisher_model->name = $_POST['name'];
            if ($this->publisher_model->update()) {
                header("Location: /publishers");
            }
        }
        require_once('../views/publishers/edit.php');
    }

    public function delete($id)
    {
        $this->publisher_model->id = $id;
        $this->publisher_model->delete();
        header("Location: /publishers");
    }
}