<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


<?php
    class employee
    {
        private $db;
        private $format;

        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }

        public function insert_employee($data){
            
            $fullname = mysqli_real_escape_string($this->db->connect, $data['fullname']);
            $gioiTinh = $data['gioitinh'];
			$diaChi = mysqli_real_escape_string($this->db->connect, $data['address']);
			$ngaySinh = date('Y-m-d H:i:s', strtotime($data['dob']));
			$phone = mysqli_real_escape_string($this->db->connect, $data['phone']);
			$email = mysqli_real_escape_string($this->db->connect, $data['email']);
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
    
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            // $file_current = strtolower(current($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "emp/".$unique_image;
			if($fullname=="" || $diaChi ==""|| $gioiTinh ==""|| $ngaySinh ==""|| $phone ==""|| $email ==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
                    //Nếu người dùng chọn ảnh
                    if (in_array($file_ext, $permited) === false) 
                    {	
                    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
                    return $alert;
                    }
                    move_uploaded_file($file_temp,$uploaded_image);
                $sql = "INSERT INTO employees (fullname, sex, address, dob, phone, email, image) VALUES ('$fullname', '$gioiTinh', '$diaChi', '$ngaySinh', '$phone', '$email', '$unique_image')";
                $result = $this->db->Insert($sql);
                if($result){
                    $alert = "<div class='success'>Add Successfully!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Failed to add Employee!!</div>";
                    return $alert;
                }
                }

			}
        }

        public function show_list_employees(){
            $sql = "select * from employees order by id desc";
            $result = $this->db->Select($sql);
            return $result;
        }

        public function update_employee($data, $id){
            
            $fullname = mysqli_real_escape_string($this->db->connect, $data['fullname']);
            $gioiTinh = $data['gioitinh'];
			$diaChi = mysqli_real_escape_string($this->db->connect, $data['address']);
			$ngaySinh = date('Y-m-d H:i:s', strtotime($data['dob']));
			$phone = mysqli_real_escape_string($this->db->connect, $data['phone']);
			$email = mysqli_real_escape_string($this->db->connect, $data['email']);
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
    
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            // $file_current = strtolower(current($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "emp/".$unique_image;
			if($fullname=="" || $diaChi ==""|| $gioiTinh ==""|| $ngaySinh ==""|| $phone ==""|| $email ==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
                    //Nếu người dùng chọn ảnh
                    if (in_array($file_ext, $permited) === false) 
                    {	
                    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
                    return $alert;
                    }
                    move_uploaded_file($file_temp,$uploaded_image);
                $sql = "UPDATE employees SET fullname = '$fullname', sex = '$gioiTinh', address = '$diaChi', dob = '$ngaySinh', phone = '$phone', email = '$email', image = '$unique_image' WHERE id = '$id'";
                $result = $this->db->Update($sql);
                if($result){
                    $alert = "<div class='success'>Update Successfully!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Failed to update Employee!!</div>";
                    return $alert;
                }
                }

			}
        }

        public function getEmpLimit($offset, $count){
			$query = "SELECT * FROM employees LIMIT $offset,$count";
			$result = $this->db->Select($query);
			return $result;
		}

        function SearchEmployeesByKeyWord($KeyWord){
            $query = "SELECT * FROM employees WHERE fullname LIKE N'%". $KeyWord . "%'";
            $result = $this->db->Select($query);
			return $result;
        }

		// public function show_slider(){
		// 	$query = "SELECT * FROM slider order by id desc";
		// 	$result = $this->db->select($query);
		// 	return $result;
		// }

        // public function update_slider($data, $id){
            
        //     $sliderName = mysqli_real_escape_string($this->db->connect, $data['sliderName']);
        //     $img = mysqli_real_escape_string($this->db->connect, $data['file']);
		// 	if($sliderName=="" || $img ==""){
		// 		$alert = "<span class='error'>Fields must be not empty</span>";
		// 		return $alert;
		// 	}else{
		// 		$query = "UPDATE slider SET name = '$sliderName', img = '$img' WHERE id = '$id'";
		// 		$result = $this->db->insert($query);
		// 		if($result){
		// 			$alert = "<span class='success'>Update Slider Successfully</span>";
		// 			return $alert;
		// 		}else{
		// 			$alert = "<span class='error'>Update Slider Not Success</span>";
		// 			return $alert;
		// 		}
		// 	}
        // }

        public function delete_employee($id){
            $sql = "DELETE FROM employees WHERE id = '$id'";
                $result = $this->db->Delete($sql);
                if($result){
                    $alert = "<div class='success'>Delete Successfully!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Failed to Delete employees!!</div>";
                    return $alert;
                }
        }

        function getEmployeesbyId($id){
            $query = "SELECT * FROM employees WHERE id= '$id' ";
			$result = $this->db->Select($query);
			return $result;
        }
    }
    
?>