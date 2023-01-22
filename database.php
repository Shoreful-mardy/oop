<?php
// databse
class Database{
        public $host = 'localhost' ;
        public $user = 'root' ;
        public $pass = '' ;
        public $database = 'online-php' ;

        public $connection;
        public $error;

        public function __construct()
        {
            $this->connect();
        }
// connectiion to database s
        private function Connect()
        {
            $this->connection = new mysqli($this->host,$this->user,$this->pass,$this->database);

            if(!$this->connection)
            {
                $this->error = "Connection failed" . $this->connection->connect_error;
                return false;
            }
        }
// connectiion to database s
// insert method start
        public function insert($data)
        {
            $insert_data = $this->connection->query($data);
            if($insert_data){
                return $insert_data;
            }else{
                return false;
            }
        }
// insert method end
 // select method start

        public function select($data)
        {
            $select_data = $this->connection->query($data);
            if(!empty($select_data) && $select_data-> num_rows > 0){
                return $select_data;
            }else{
                return false;
            }
        }
// select method end
// delete method start
        public function update($data)
        {
            $update_data = $this->connection->query($data);
            if($update_data){
                return $update_data;
            }else{
                return false;
            }
        }

// delete method start
        public function delete($id,$table)
        {
            $sql_delete = "DELETE FROM $table WHERE id = $id";
            $data = $this->connection->query($sql_delete);
            if($data){
                return true;
            }else{
                echo 'Error : Cannot Delete ' . $id . 'Form table' . $table;
                return false;
            }
        }
// delete method end
// data validation start
        function verify_data($data)
        {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
// data validation start




}
?>