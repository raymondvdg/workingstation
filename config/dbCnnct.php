<?php
class Database{

private $host = '127.0.0.1';
private $dbname = 'db_test';
private $username = 'root';
private $password ='test';  
public $con = '';

function __construct(){
    $this->connect();   

}

function connect(){

    try{

        $this->con = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username, $this->password);
        $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


    }catch(PDOException $e){

        echo 'We\'re sorry but there was an error while trying to connect to the database.';
        file_put_contents('connection.errors.txt', $e->getMessage().PHP_EOL,FILE_APPEND);

    }
    return $this->con; 
}   
}

?>