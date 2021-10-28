<?php
    include '../../../../../../../laragon/www/SellLaptops/FrontEnd/lib/database.php';
    include '../../../../../../laragon/www/SellLaptops/FrontEnd/lib/session.php';
    Session::checkLogin();
    include '../../../../../../laragon/www/SellLaptops/FrontEnd/helpers/format.php';
?>


<?php
    class adminlogin
    {
        private $db;
        private $format;

        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }

        public function login_admin($username, $password){
            $username = $this->format->validation($username);
            $password = $this->format->validation($password);

            $username = mysqli_real_escape_string($this->db->connect, $username);
            $password = mysqli_real_escape_string($this->db->connect, $password);

            if(empty($username) || empty($password)){
                $alert = "<div class='error'>Username or password not empty!!</div>";
                return $alert;
            }else{
                $sql = "select * from admin where username='$username' and password='$password' limit 1";
                $result = $this->db->Select($sql);
                if($result != false){
                    $row = $result->fetch_assoc();
                    Session::set('adminlogin', true);
                    Session::set('id', $row['id']);
                    Session::set('username', $row['username']);
                    Session::set('fullname', $row['fullname']);
                    header('location:index.php');
                }else{
                    $alert = "<div class='error'>Username or password not match!!</div>";
                    return $alert;
                }

            }
        }
    }
    
?>