<?php
use Dotenv\Dotenv;
require_once __DIR__ .'/vendor/autoload.php'; // Composer autoloader 
$dotenv = Dotenv::createImmutable((__DIR__));
$dotenv->load();
$servername = $_ENV["HOST"];
$username = $_ENV["USER"];
$password = $_ENV["PASS"];
$db = $_ENV["DB"];
$conn = new conn($servername , $username, $password, $db);

class conn{
    private $conn;

    public function __construct($server, $username, $password, $db) { 
        try {
            $this->conn = new PDO("mysql:host=$server;dbname=$db", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            return $this->conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getConnection(){
        return $this->conn;
    }
}
class CRUD{
    protected $conn;
    protected $table;
    protected $data;

    // Insert
    public function insert($conn, $table, $data) {
        $conn = $conn->getConnection();
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $conn->prepare($sql); 

        $result = $stmt->execute(array_values($data));

        if ($result) {
            echo "Record inserted successfully!";
            print_r($data);
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error inserting record: " . implode(", ", $errorInfo);
        }
    }

    // Delete
    public function delete($conn,$table,$id){
        $conn = $conn->getConnection();
        $sql = "DELETE FROM $table WHERE player_id = ". $id;
        if ($conn->exec($sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: ";
        }
    }

    public function show($conn, $table) {
        $conn = $conn->getConnection();
        

        // Prepare the SQL statement
        $sql = "Select * FROM $table";
        $stmt = $conn->prepare($sql);  // Use $conn->prepare() for PDO

        // Execute the prepared statement
        $result = $stmt->execute();

        if ($result) {
            echo "Record inserted successfully!";
            $AllResults = $stmt->fetchAll();
            echo "<ul>";
            foreach($AllResults as $key => $value) {
            echo "  <li>
                        <br><strong>ID : #</strong>".$value['player_id']."
                        <br><strong>Player Name: </strong>".$value['p_name']."
                        <br><strong>Position : </strong>".$value['position']."
                        <br><strong>Rating : </strong>".$value['rating']."
                        <br><strong>Nation : </strong>".$value['nation']."
                        <br><strong>Club : </strong>".$value['club']."
                    </li>
                    <br/>";
            }
        echo "</ul>";
            return $this->data;
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error inserting record: " . implode(", ", $errorInfo);
        }
    }
    
    public function update($conn,$table,$data,$id){
        $conns = $conn->getConnection();
        foreach ($data as $key => $value) {
            $args[] = "$key = '$value'";
        }
        // $sql = "UPDATE $table SET " . implode(',', $args) . " WHERE id = 6";
        $sql = "UPDATE $table SET ".implode(", ", $args)." WHERE player_id = $id";

        $stmt = $conns->prepare($sql); 

        $result = $stmt->execute();

        if (!$stmt) {
            die("Error in prepared statement: " );
        }

        


        $result = $stmt->execute();
        if ($result) {
            echo "Record Updated successfully!";
            print_r($data);
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error Updating record: " . implode(", ", $errorInfo);
        }

        return $result;
    }
}

$data = [
    "p_name" => "Jawad Boulmal Testss",
    "position" => "GK",
    "rating" => 55,
    "nation" => "morocco",
    "club" => "barsca"
];

$dataUpdated = [
    "p_name" => "Aymen Benhima",
    "position" => "ST",
    "rating" => 10000000,
    "nation" => "morocco",
    "club" => "Real Madrid"
];

$crud = new CRUD();
$crud->insert($conn,"players",$data);
$crud->delete($conn,"players",1);
$crud->show($conn,"players");
$crud->update($conn,"players",$dataUpdated,4);
