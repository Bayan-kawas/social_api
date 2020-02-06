<?php
class User {
private $conn;
private $table_name = "users";

//object properties 
public $id;
public $first_name;
public $last_name;
public $password;
public $email;
public $phone_number;

//constractor with $db as database connection 

public function  __construct($db){
$this -> conn = $db;
}

function read(){
    // select all query
    $query = "SELECT `id`, `first_name`, `last_name`, `password`, `email`, `phone_number` FROM `users` WHERE 1";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
    return $stmt;
    
 
}
function insert(){
$query = "INSERT INTO `users`(`id`, `first_name`, `last_name`, `password`, `email`, `phone_number`)
 VALUES ($this->id,'$this->first_name,'$this->last_name','$this->password','$this->email','$this->phone_number')";
 $stmt = $this->conn->prepare($query);
 // execute query
 if($stmt->execute()){
    return true;
}

return false;

}

}

?>