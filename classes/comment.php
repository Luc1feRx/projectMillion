<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class customer
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_binhluan($data,$id){
			$name = mysqli_real_escape_string($this->db->connect, $data['nameuser']);
			$email = mysqli_real_escape_string($this->db->connect, $data['email']);
			$comment = mysqli_real_escape_string($this->db->connect, $data['comment']);
			$comment_date = date('Y-m-d H:i:s');
			if($name=='' || $email==''|| $comment==''){
				$alert = "<span class='error'>Không để trống các trường</span>";
				return $alert;
			}else{
				$q = "INSERT INTO feedback (nameuser,email,comment,comment_date, product_id) VALUES('".$name."','".$email."','".$comment."','".$comment_date."','".$id."')";
					$result = $this->db->insert($q);
					if($result){
						$alert = "<span class='btn btn-success' style='font-size: 14px ;'>Bình luận đã gửi</span>";
						return $alert;
					}else{
						$alert = "<span class='btn btn-error' style='font-size: 14px ;'>Bình luận không thành công</span>";
						return $alert;
				}
			}
		}
		public function show_comment($id){
			$query = "SELECT * FROM feedback where product_id = '$id' and status = 1 order by id desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function show_list_comment(){
			$query = "SELECT feedback.*, product.name FROM feedback, product where feedback.product_id = product.id order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
		
		public function login_customers($data){
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
			if($email=='' || $password==''){
				$alert = "<span class='error'>Password and Email must be not empty</span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password'";
				$result_check = $this->db->select($check_login);
				if($result_check){

					$value = $result_check->fetch_assoc();
					Session::set('customer_login',true);
					Session::set('customer_id',$value['id']);
					Session::set('customer_name',$value['name']);
					$alert = "<span class='success'>Đăng nhập thành công <a href='payment.php'>Đến trang thanh toán</a></span>";
						return $alert;
				}else{
					$alert = "<span class='error'>Email or Password doesn't match</span>";
					return $alert;
				}
			}
		}
		public function show_customers($id){
			$query = "SELECT * FROM tbl_customer WHERE id='$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_customers($data, $id){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			
			if($name=="" || $zipcode=="" || $email=="" || $address=="" || $phone ==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_customer SET name='$name',zipcode='$zipcode',email='$email',address='$address',phone='$phone' WHERE id ='$id'";
				$result = $this->db->insert($query);
				if($result){
						$alert = "<span class='success'>Customer Updated Successfully</span>";
						return $alert;
				}else{
						$alert = "<span class='error'>Customer Updated Not Successfully</span>";
						return $alert;
				}
				
			}
		}
		
		public function approved($id){
			$id = mysqli_real_escape_string($this->db->connect, $id);
			$query = "UPDATE feedback SET

					status = '1'

					WHERE id = '$id'";
			$result = $this->db->Update($query);
			if($result){
				$msg = "<span class='success'>Update Feedback Successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Update Feedback Not Successfully</span>";
				return $msg;
			}
		}

		public function del_comment($id){
			$id = mysqli_real_escape_string($this->db->connect, $id);
			$query = "DELETE FROM feedback WHERE id = '$id'";
			$result = $this->db->Delete($query);
			if($result){
				$msg = "<span class='success'>Detele Feedback Successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Delete Feedback Not Successfully</span>";
				return $msg;
			}
		}


	}
?>