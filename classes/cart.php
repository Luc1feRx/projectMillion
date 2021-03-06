<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


<?php
    class cart
    {
        private $db;
        private $format;

        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }

		public function add_to_cart($quantity, $id){

			$quantity = $this->format->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->connect, $quantity);
			$id = mysqli_real_escape_string($this->db->connect, $id);
			$sId = session_id();
			$check_cart = "SELECT * FROM cart WHERE productId = '$id' AND sessionID ='$sId'";
			$result_check_cart = $this->db->Select($check_cart);
			if($result_check_cart){
				$msg = "<span class='btn btn-warning'>Sản phẩm này đã được thêm vào từ trước</span>";
				return $msg;
			}else{

				$query = "SELECT * FROM product WHERE id = '$id'";
				$result = $this->db->Select($query)->fetch_assoc();
				
				$image = $result["image"];
				$price = $result["price"];
				$productName = $result["name"];
				$discount = $result["discount"];

				$query_insert = "INSERT INTO cart(productId,quantity,sessionID,image,price,productName, discount) VALUES('$id','$quantity','$sId','$image','$price','$productName', '$discount')";
				$insert_cart = $this->db->Insert($query_insert);
				if($insert_cart){
					$msg = "<span class='btn btn-success'>Thêm sản phẩm thành công</span>";
					return $msg;
					
				}
			}
			
		}

		public function add_cart($quantity, $id){

			$quantity = $this->format->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->connect, $quantity);
			$id = mysqli_real_escape_string($this->db->connect, $id);
			$sId = session_id();
			$check_cart = "SELECT * FROM cart WHERE productId = '$id' AND sessionID ='$sId'";
			$result_check_cart = $this->db->Select($check_cart);
			if($result_check_cart){
				$msg = "<span class='btn btn-warning'>Sản phẩm này đã được thêm vào từ trước</span>";
				return $msg;
			}else{

				$query = "SELECT * FROM product WHERE id = '$id'";
				$result = $this->db->Select($query)->fetch_assoc();
				
				$image = $result["image"];
				$price = $result["price"];
				$productName = $result["name"];
				$discount = $result["discount"];

				$query_insert = "INSERT INTO cart(productId,quantity,sessionID,image,price,productName, discount) VALUES('$id','$quantity','$sId','$image','$price','$productName', '$discount')";
				$insert_cart = $this->db->Insert($query_insert);
				if($insert_cart){
					$msg = "<span class='btn btn-success'>Thêm sản phẩm thành công</span>";
					return $msg;
					
				}
			}
			
		}

        public function update_quantity_cart($quantity, $cartId){
			$quantity = mysqli_real_escape_string($this->db->connect, $quantity);
			$cartId = mysqli_real_escape_string($this->db->connect, $cartId);
			$query = "UPDATE cart SET

					quantity = '$quantity'

					WHERE cartId = '$cartId'";
			$result = $this->db->Update($query);
			if($result){
				$msg = "<span class='btn btn-success'>Update Cart Successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='btn btn-error'>Product Quantity Updated Not Successfully</span>";
				return $msg;
			}
		
		}

        public function del_product_cart($cartid){
			$cartid = mysqli_real_escape_string($this->db->connect, $cartid);
			$query = "DELETE FROM cart WHERE cartId = '$cartid'";
			$result = $this->db->delete($query);
			if($result){
				$msg = "<span class=btn btn-success'>Delete Product Successfully</span>";
				return $msg;
			}else{
                $msg = "<span class=btn btn-error'>Failed to delete Product</span>";
				return $msg;
            }
		}

        public function get_product_cart(){
			$sId = session_id();
			$query = "SELECT * FROM cart WHERE sessionID = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function check_cart(){
			$sId = session_id();
			$query = "SELECT * FROM cart WHERE sessionID = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function del_all_data_cart(){
			$sId = session_id();
			$query = "DELETE FROM cart WHERE sessionID = '$sId'";
			$result = $this->db->delete($query);
		}

		public function shifted($id,$time,$total_money){
			$id = mysqli_real_escape_string($this->db->connect, $id);
			$time = mysqli_real_escape_string($this->db->connect, $time);
			$total_money = mysqli_real_escape_string($this->db->connect, $total_money);
			$query = "UPDATE `order` SET

					status = '1'

					WHERE id = '$id' AND date_order='$time' AND total_money ='$total_money'";
			$result = $this->db->Update($query);
			if($result){
				$msg = "<span class='success'>Update Order Successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Update Order Not Successfully</span>";
				return $msg;
			}
		}

		public function del_shifted($id,$time,$price){
			$id = mysqli_real_escape_string($this->db->connect, $id);
			$time = mysqli_real_escape_string($this->db->connect, $time);
			$price = mysqli_real_escape_string($this->db->connect, $price);
			$query = "DELETE FROM `order` 
					WHERE id = '$id' AND date_order='$time' AND total_money ='$price'";
			$result = $this->db->Delete($query);

			$sql = "DELETE FROM order_detail WHERE order_id = '$id'";
			$result1 = $this->db->Delete($sql);
			if($result){
				$msg = "<span class='success'>Detele Order Successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Delete Order Not Successfully</span>";
				return $msg;
			}
		}
    }
    
?>