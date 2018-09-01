<?php
class Category {
    //Db stuff
    private $db;
    private $table = 'categories';

    //Categories Properties
    public $id;
    public $name;
    public $create_at;

    //Constructor with Db
    public function __construct($db) {
        $this->conn = $db;
    }

    //Get Posts
    public function read() {
        //Create query
        $query = 'SELECT
                id,
                name
            FROM
                ' . $this->table . '
            ORDER BY
                create_at DESC';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
    }

    //Get Single Post
    public function read_single() {
        //Create query

        $query = 'SELECT
                id,
                name
            FROM
                ' . $this->table . '
            WHERE
                id = ?
            LIMIT 0,1';


        //Prepare Statenment
        $stmt = $this->conn->prepare($query);

        //Bind id
        $stmt->bindParam(1, $this->id);

        //Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Set properties
        $this->name = $row['name'];
    
    }

    //Create Post
    public function create() {
        //Create query
        $query = 'INSERT INTO ' . 
                $this->table . '
            SET
                name = :name';

        //Prepare statement
        $stmt = $this->conn->prepare($query);
        
        //Clean data
        $this->name = htmlspecialchars(strip_tags($this->name));


        //Bind data
        $stmt->bindParam(':name', $this->name);

        //Execute query
        if($stmt->execute()) {
            return true;
        } 

        //Print error if something goes wrong
        printf("Error: %s. \n", $stmt->error);
     
        return false;
    }


    
      //UPDATE Post
      public function update() {
        //Create query
        $query = 'UPDATE ' . 
                $this->table . '
            SET
                name = :name
            WHERE
                id = :id';

        //Prepare statement
        $stmt = $this->conn->prepare($query);
        
        //Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));


        //Bind data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);

        //Execute query
        if($stmt->execute()) {
            return true;
        } 

        //Print error if something goes wrong
        printf("Error: %s. \n", $stmt->error);
     
        return false;
    }


     //Delete post
    public function delete() {
        //Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

         //Prepare statement
         $stmt = $this->conn->prepare($query);

         //Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        //Bind data
        $stmt->bindParam(':id', $this->id);

        
        //Execute query
        if($stmt->execute()) {
            return true;
        } 

        //Print error if something goes wrong
        printf("Error: %s. \n", $stmt->error);
     
        return false;
    }




}