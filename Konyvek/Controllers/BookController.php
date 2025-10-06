<?php

namespace Controllers;

use Config\Database;
use Models\Book;
use Models\Author;
use Models\Publisher;
use Models\Category;

class BookController {
    private $book_model;
    private $author_model;
    private $publisher_model;
    private $category_model;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->book_model = new Book($db);
        $this->author_model = new Author($db);
        $this->publisher_model = new Publisher($db);
        $this->category_model = new Category($db);
    }

    public function index() {
        $filter = [];
        if (!empty($_GET['author'])) {
            $filter['author_id'] = $_GET['author'];
        }
        if (!empty($_GET['publisher'])) {
            $filter['publisher_id'] = $_GET['publisher'];
        }
        if (!empty($_GET['category'])) {
            $filter['category_id'] = $_GET['category'];
        }
        $stmt = $this->book_model->read($filter);
        $books = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $authors = $this->author_model->read()->fetchAll(\PDO::FETCH_ASSOC);
        $publishers = $this->publisher_model->read()->fetchAll(\PDO::FETCH_ASSOC);
        $categories = $this->category_model->read()->fetchAll(\PDO::FETCH_ASSOC);

        require_once('../views/books/index.php');
    }

    public function show($id) {
        $this->book_model->id = $id;
        $book = $this->book_model->readSingle();
        require_once('../views/books/show.php');
    }

    public function create() {
        $authors = $this->author_model->read()->fetchAll(\PDO::FETCH_ASSOC);
        $publishers = $this->publisher_model->read()->fetchAll(\PDO::FETCH_ASSOC);
        $categories = $this->category_model->read()->fetchAll(\PDO::FETCH_ASSOC);

        if ($_POST) {
            $this->book_model->title = $_POST['title'];
            $this->book_model->isbn = $_POST['isbn'];
            $this->book_model->price = $_POST['price'];
            $this->book_model->description = $_POST['description'];
            $this->book_model->author_id = $_POST['author_id'];
            $this->book_model->publisher_id = $_POST['publisher_id'];
            $this->book_model->category_id = $_POST['category_id'];
            if ($this->book_model->create()) {
                header("Location: /books");
            }
        }
        require_once('../views/books/create.php');
    }

    public function edit($id) {
        $this->book_model->id = $id;
        $this->book_model->readSingle();

        $authors = $this->author_model->read()->fetchAll(\PDO::FETCH_ASSOC);
        $publishers = $this->publisher_model->read()->fetchAll(\PDO::FETCH_ASSOC);
        $categories = $this->category_model->read()->fetchAll(\PDO::FETCH_ASSOC);

        if ($_POST) {
            $this->book_model->title = $_POST['title'];
            $this->book_model->isbn = $_POST['isbn'];
            $this->book_model->price = $_POST['price'];
            $this->book_model->description = $_POST['description'];
            $this->book_model->author_id = $_POST['author_id'];
            $this->book_model->publisher_id = $_POST['publisher_id'];
            $this->book_model->category_id = $_POST['category_id'];
            if ($this->book_model->update()) {
                header("Location: /books");
            }
        }
        require_once('../views/books/edit.php');
    }

    public function delete($id) {
        $this->book_model->id = $id;
        $this->book_model->delete();
        header("Location: /books");
    }
}