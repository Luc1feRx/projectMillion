<?php
    include '../../../../../../laragon/www/SellLaptops/FrontEnd/lib/database.php';
    include '../../../../../../laragon/www/SellLaptops/FrontEnd/helpers/format.php';
?>


<?php
    class category
    {
        private $db;
        private $format;

        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }

        public function insert_category($cateName, $level){
            $cateName = $this->format->validation($cateName);

            $cateName = mysqli_real_escape_string($this->db->connect, $cateName);
            if(empty($cateName) || empty($level)){
                $alert = "<div class='error'>Category or level must be not empty!!</div>";
                return $alert;
            }else{
                $sql = "insert into category (name, level) values ('$cateName', '$level')";
                $result = $this->db->Insert($sql);
                if($result){
                    $alert = "<div class='success'>Add Successfully!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Failed to add category!!</div>";
                    return $alert;
                }

            }
        }
    }
    
?>