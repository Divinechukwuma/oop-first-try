<?php

class database
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    //Constructor to initialize database connection parameters

    public function __construct($host, $username, $password, $database)
    {
        $this->host = $host;
        $this->username  = $username;
        $this->password = $password;
        $this->database = $database;
    }

    //Method to establish databases connection
    public function connect()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        //Check connection 

        if ($this->connection->connect_error) {
            die("connection failed" . $this->connection->connect_error);
        }

        //echo "connected successfully";
    }

    //Method to close connection
    //and the end of the database 

    public function closeConnection(){
        
        $this->connection->close();

    }

    //method to execute the query using prepared statement 
    public function executePreparedStatement($sql,$params){
        $stmt = $this->connection->prepare($sql);

        //check if statment preparation succeeded 
        if($stmt == false){
            die("Error preparing statement:" . $this->connection->error );
        }

        //Bind params to the prepared statement 
        if(!empty($params)){

            $types = str_repeat('s',count($params)); //asssuming all the parameters are strings
            $stmt->bind_param($types, ...$params);

        }

        $stmt->execute();

        //check for errors during execution

        if($stmt->error){
            die("Error executing statement" . $stmt->error);
        }

        //close statement
        $stmt->close();


    }


}
