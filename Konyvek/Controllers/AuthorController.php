<?php

namespace Controllers;

use Config\Database;
use Models\Author;

class AuthorController
{
    private $author_model;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->author_model = new Author($db);
    }

    public function index()
    {
        $stmt = $this->author_model->read();
        $authors = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        require_once('../views/authors/index.php');
    }

    public function show($id)
    {
        $this->author_model->id = $id;
        $this->author_model->readSingle();
        require_once('../views/authors/show.php');
    }

    public function create()
    {
        if ($_POST) {
            $this->author_model->name = $_POST['name'];
            $this->author_model->bio = $_POST['bio'];
            if ($this->author_model->create()) {
                header("Location: /authors");
            }
        }
        require_once('../views/authors/create.php');
    }

    public function edit($id)
    {
        $this->author_model->id = $id;
        $this->author_model->readSingle();

        if ($_POST) {
            $this->author_model->name = $_POST['name'];
            $this->author_model->bio = $_POST['bio'];
            if ($this->author_model->update()) {
                header("Location: /authors");
            }
        }
        require_once('../views/authors/edit.php');
    }

    public function delete($id)
    {
        $this->author_model->id = $id;
        $this->author_model->delete();
        header("Location: /authors");
    }
}