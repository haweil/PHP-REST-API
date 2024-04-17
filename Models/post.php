<?php

class post
{
    // db stuff
    private $conn;
    private $table='posts';
    // post property
    public $title;
    public $body;
    public $category;
    public $author;
    public $id;

    // construct with db_connection
    public function __construct($db)
    {
        $this->conn=$db;
    }

    //getting post from our database
    public function read () {
        // create query
        $query = "SELECT * ,cat_name
                FROM $this->table P
                LEFT JOIN categories C 
                ON p.post_category =C.cat_id ";

        try {
            // prepare statement
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            }
        }
        catch (PDOException $e) {
            echo "Failed {$e->getMessage()}";
        }
    }
    public function readOne ($id) {
        $query = "SELECT * ,cat_name
                FROM $this->table P
                LEFT JOIN categories C 
                ON p.post_category =C.cat_id 
                WHERE p.post_id=?";

        try {
            // prepare statement
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            }
        }
        catch (PDOException $e) {
            echo "Failed {$e->getMessage()}";
        }
    }

    public function create () {
        $query = "INSERT INTO $this->table (post_title, post_body, post_category, author) VALUES (:title, :body, :category, :author)";
        try {
            // prepare statement
            $stmt = $this->conn->prepare($query);
            //  binding of parameters
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':body', $this->body);
            $stmt->bindParam(':category', $this->category);
            $stmt->bindParam(':author', $this->author);
            //execute the query
            return (bool) $stmt->execute(); // To Return Ture If IT Added And Vica Verse
        }
        catch (PDOException $e) {
            echo "Failed {$e->getMessage()}";
        }
    }

    public function update() {
        $query = "UPDATE $this->table SET
                 post_title = :title,
                 post_body  = :body,
                 post_category=:category,
                 author=:author WHERE post_id = :id";
        try {
            // prepare statement
            $stmt = $this->conn->prepare($query);
            //  binding of parameters
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':body', $this->body);
            $stmt->bindParam(':category', $this->category);
            $stmt->bindParam(':author', $this->author);
            $stmt->bindParam(':id', $this->id);

            //execute the query
            return (bool) $stmt->execute(); // To Return Ture If IT Updated And Vica Verse
        }
        catch (PDOException $e) {
            echo "Failed {$e->getMessage()}";
        }
    }
    public function Delete() {
        $query = "DELETE FROM $this->table WHERE posts.post_id=:id";

        try {
            // prepare statement
            $stmt=$this->conn->prepare($query);
            //  binding of parameters
            $stmt->bindParam(':id', $this->id);
            //execute the query
            return (bool) $stmt->execute(); // To Return Ture If IT deleted And Vica Verse
        }
        catch (PDOException $e) {
            echo "Failed {$e->getMessage()}";
        }
    }

}