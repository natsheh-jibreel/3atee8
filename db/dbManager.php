<?php 
class dbManager { 
    private $host = null; 
    private $username = null; 
    private $password = null; 
    private $database = null; 

    protected $link = null;


    public function __construct($host = 'localhost', $username = 'root', $password = '123', $database = '3ateeq') {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
    }

    protected function connect() {
        $this->link = mysql_connect($this->host, $this->username, $this->password, $this->database) or die('Could not connect: ' . mysql_error());
    }

    public function executeSelectQuery($query) {
        $rows = array();
        $result = mysql_query($sql, $this->link);

        if (!$result) {
            echo "DB Error, could not query the database\n";
            echo 'MySQL Error: ' . mysql_error();
            exit;
        }

        return $result;
    }

    protected function commit(){
        return mysql_query("COMMIT", $this->link);
    }
     
    protected function rollback(){
        return mysql_query("ROLLBACK", $this->link);
    }
  
    public function executeQuery($query) {
        $result = mysql_query($query, $this->link);
        if(mysql_affected_rows() == 0){ $retval = 0; }
        if($retval == 0){
            $this->rollback();
            return false;
        }else{
            $this->commit();
            return true;
        }
    }
    
    function __destruct() {
        mysql_close($this->link);
    }
} 
?> 