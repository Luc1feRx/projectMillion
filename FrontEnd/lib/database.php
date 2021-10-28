<?php
    // $filepath = realpath(dirname(__FILE__));
    include('../../../../../../laragon/www/SellLaptops/FrontEnd/config/config.php');
?>

<?php
    class Database
    {
        public $host   = DB_HOST;
        public $user   = DB_USER;
        public $pass   = DB_PASS;
        public $dbname = DB_NAME;
        public $connect;
        public $error;

        public function __construct(){
            $this->connectDB();
        }

        private function connectDB(){

            $this->connect = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
         
            if(!$this->connect){
              $this->error ="Connection fail".$this->connect->connect_error;
             return false;
            }
             // mysqli_set_charset($this->link,"utf8");
          }
            // Select or Read data
          public function Select($sql){
            $result = mysqli_query($this->connect,$sql) or
            die($this->connect->error.__LINE__);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
          }

          //insert data
          public function Insert($sql){
            $insert = mysqli_query($this->connect, $sql) or
            die($this->connect->error.__LINE__);
            if($insert == true){
                return $insert;
            }else{
                return false;
            }
          }
   
            // Update data
            public function Update($sql){
                $update = mysqli_query($this->connect, $sql) or
                die($this->connect->error.__LINE__);
                if($update == true){
                    return $update;
                }else{
                    return false;
                }
              }

            
            // delete data
            public function Delete($sql){
                $delete = mysqli_query($this->connect, $sql) or
                die($this->connect->error.__LINE__);
                if($delete == true){
                    return $delete;
                }else{
                    return false;
                }
              }
    }
    
?>