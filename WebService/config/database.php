<?php
class Database{
  
    private $host = "";
    private $db_name = "SISTEMA_A";
    private $username = "";
    private $password = "";
    
    public $conn;

    public function connect(){
  
        $this->conn = null;
        
        try{
            $this->conn = new PDO("sqlsrv:server=".$this->host.";database=".$this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8);
            $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
        }
        catch(Exception $e){   
            die( print_r( $e->getMessage() ) );   
        }  
  
        return $this->conn;
    }
}
?>