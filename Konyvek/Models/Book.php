<?php

namespace Models;

class Book
{
    private $conn;
    private $table_name = "books";

    public $id;
    public $title;
    public $isbn;
    public $price;
    public $description;
    public $author_id;
    public $publisher_id;
    public $category_id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET title=:title, isbn=:isbn, price=:price, description=:description, author_id=:author_id, publisher_id=:publisher_id, category_id=:category_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":isbn", $this->isbn);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":author_id", $this->author_id);
        $stmt->bindParam(":publisher_id", $this->publisher_id);
        $stmt->bindParam(":category_id", $this->category_id);
        return $stmt->execute();
    }

    public function read($filter = null)
    {
        $query = "SELECT b.id, b.title, b.isbn, b.price, b.description, a.name as author, p.name as publisher, c.name as category 
                  FROM " . $this->table_name . " b 
                  LEFT JOIN authors a ON b.author_id = a.id 
                  LEFT JOIN publishers p ON b.publisher_id = p.id 
                  LEFT JOIN categories c ON b.category_id = c.id";
        if ($filter) {
            if (isset($filter['author_id'])) {
                $query .= " WHERE b.author_id = :author_id";
            } elseif (isset($filter['publisher_id'])) {
                $query .= " WHERE b.publisher_id = :publisher_id";
            } elseif (isset($filter['category_id'])) {
                $query .= " WHERE b.category_id = :category_id";
            }
        }
        $stmt = $this->conn->prepare($query);
        if ($filter) {
            if (isset($filter['author_id'])) {
                $stmt->bindParam(":author_id", $filter['author_id']);
            } elseif (isset($filter['publisher_id'])) {
                $stmt->bindParam(":publisher_id", $filter['publisher_id']);
            } elseif (isset($filter['category_id'])) {
                $stmt->bindParam(":category_id", $filter['category_id']);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function readSingle()
    {
        $query = "SELECT b.id, b.title, b.isbn, b.price, b.description, a.name as author, a.bio as author_bio, p.name as publisher, c.name as category 
                  FROM " . $this->table_name . " b 
                  LEFT JOIN authors a ON b.author_id = a.id 
                  LEFT JOIN publishers p ON b.publisher_id = p.id 
                  LEFT JOIN categories c ON b.category_id = c.id 
                  WHERE b.id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            $this->title = $row['title'];
            $this->isbn = $row['isbn'];
            $this->price = $row['price'];
            $this->description = $row['description'];
            $this->author_id = $row['author']; // name actually
            $this->publisher_id = $row['publisher'];
            $this->category_id = $row['category'];
            // For author bio in show
        }
        return $row; // Return row for bio
    }

    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET title = :title, isbn = :isbn, price = :price, description = :description, author_id = :author_id, publisher_id = :publisher_id, category_id = :category_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':isbn', $this->isbn);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':author_id', $this->author_id);
        $stmt->bindParam(':publisher_id', $this->publisher_id);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        return $stmt->execute();
    }
}