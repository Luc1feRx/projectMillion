<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


<?php
    class product
    {
        private $db;
        private $format;

        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }

        public function insert_product($data){
            $productName = mysqli_real_escape_string($this->db->connect, $data['productName']);
            $price = mysqli_real_escape_string($this->db->connect, $data['price']);
            $cate_id = mysqli_real_escape_string($this->db->connect, $data['cate_id']);
            $brand_id = mysqli_real_escape_string($this->db->connect, $data['brand_id']);
            $short_desc = mysqli_real_escape_string($this->db->connect, $data['short_desc']);
            $status = $data['status'];
            $model = mysqli_real_escape_string($this->db->connect, $data['model']);
            $chip = mysqli_real_escape_string($this->db->connect, $data['chip']);
            $ram = mysqli_real_escape_string($this->db->connect, $data['ram']);
            $card = mysqli_real_escape_string($this->db->connect, $data['card']);
            $drive = mysqli_real_escape_string($this->db->connect, $data['drive']);
            $display = mysqli_real_escape_string($this->db->connect, $data['display']);
            $connect = mysqli_real_escape_string($this->db->connect, $data['connect']);
            $vantay = $data['vantay'];
            $operation = mysqli_real_escape_string($this->db->connect, $data['operation']);
            $pin = $data['pin'];
            $weight = $data['weight'];
            $discount = $data['discount'];
            $quantity_product= $data['quantity'];
            $image2 = mysqli_real_escape_string($this->db->connect, $data['file']);
            $content = mysqli_real_escape_string($this->db->connect, $data['content']);
            $title = mysqli_real_escape_string($this->db->connect, $data['title']);
            $permited  = array('jpg', 'jpeg', 'png', 'gif');

            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
    
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            // $file_current = strtolower(current($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
    
            if(empty($productName) || empty($price) || empty($short_desc) || empty($status) || empty($model) || empty($chip) || empty($ram)){
                $alert = "<div class='error'>Fields must be not empty!!</div>";
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
                $sql = "insert into product (name,price,brand_id,cate_id,short_desc,status,model,chip,ram,card,drive,display,connect,vantay,operation,pin,weight,discount, quantity_product, image) VALUES('$productName','$price','$brand_id','$cate_id','$short_desc','$status','$model','$chip','$ram','$card','$drive','$display','$connect','$vantay','$operation'
                ,'$pin','$weight','$discount','$quantity_product','$unique_image')";
                $result = $this->db->Insert($sql);

                $select = "SELECT id FROM product where name = '$productName'";
                $result1 = $this->db->Select($select);
                while($row = $result1->fetch_assoc()){
                    $ID = $row['id'];
                }

                $sql1 = "INSERT INTO product_details (product_id,img, imgTieuDe,content,title) VALUES ('$ID','$unique_image', '$image2','$content','$title')";
                $result2 = $this->db->Insert($sql1);

                if($result){
                    $alert = "<div class='success'>Add Successfully!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Failed to add product!!</div>";
                    return $alert;
                }
                }
            }
        }

        function getProductByFilter($conditions, $sort)
        {
            $sortsql = '';
            if ($conditions == '') $conditions = 1;
            switch ($sort) {
                case 'new':
                    $sortsql = 'time_add DESC';
                    break;
                case 'giam':
                    $sortsql = 'price ASC';
                    break;
                case 'tang':
                    $sortsql = 'price DESC';
                    break;
                case 'dis_max':
                    $sortsql = 'discount DESC';
                    break;
                case 'topsell':
                    $sortsql = 'selled  DESC';
                    break;
    
                default:
                    $sortsql = 'id desc';
                    break;
            }
    
            $query = "SELECT * FROM " . "product" . ' WHERE ' . $conditions . " ORDER BY " . $sortsql;
			$result = $this->db->Select($query);
			return $result;
        }

        public function show_products(){
			$query = "SELECT * FROM product order by id desc";
			$result = $this->db->Select($query);
			return $result;
		}

        public function getProductLimit($offset, $count){
			$query = "SELECT * FROM product LIMIT $offset,$count";
			$result = $this->db->Select($query);
			return $result;
		}

        public function getListProductByCategory($cate_id){
            $sql = "SELECT p.id,p.name,p.price,p.discount, p.image FROM product p INNER JOIN category cp ON cp.id= p.cate_id WHERE cp.id=$cate_id ORDER BY cp.id DESC";
            $result = $this->db->Select($sql);
			return $result;
        }


    public function update_product($data, $file, $id){
        $productName = mysqli_real_escape_string($this->db->connect, $data['productName']);
        $price = mysqli_real_escape_string($this->db->connect, $data['price']);
        $cate_ids = $data['cate_id'];
        $brand_id = mysqli_real_escape_string($this->db->connect, $data['brand_id']);
        $short_desc = mysqli_real_escape_string($this->db->connect, $data['short_desc']);
        $status = mysqli_real_escape_string($this->db->connect, $data['status']);
        $model = mysqli_real_escape_string($this->db->connect, $data['model']);
        $chip = mysqli_real_escape_string($this->db->connect, $data['chip']);
        $ram = mysqli_real_escape_string($this->db->connect, $data['ram']);
        $card = mysqli_real_escape_string($this->db->connect, $data['card']);
        $drive = mysqli_real_escape_string($this->db->connect, $data['drive']);
        $display = mysqli_real_escape_string($this->db->connect, $data['display']);
        $connect = mysqli_real_escape_string($this->db->connect, $data['connect']);
        $vantay = $data['vantay'];
        $operation = mysqli_real_escape_string($this->db->connect, $data['operation']);
        $pin = $data['pin'];
        $weight = $data['weight'];
        $discount = $data['discount'];
        $quantity_product= $data['quantity'];
        $image2 = mysqli_real_escape_string($this->db->connect, $data['file']);
        $content = mysqli_real_escape_string($this->db->connect, $data['content']);
        $title = mysqli_real_escape_string($this->db->connect, $data['title']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');

        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        // $file_current = strtolower(current($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if(empty($productName) || empty($price) || empty($short_desc) || empty($status) || empty($model) || empty($chip) || empty($ram)){
            $alert = "<div class='error'>Fields must be not empty!!</div>";
            return $alert;
        }else{
            if(!empty($file_name)){
                //Nếu người dùng chọn ảnh
                if (in_array($file_ext, $permited) === false) 
                {
                 // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
                $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
                return $alert;
                }
                move_uploaded_file($file_temp,$uploaded_image);

                $sql = "update product set name = '$productName', price = '$price',brand_id = '$brand_id',short_desc='$short_desc',status='$status',model='$model',chip='$chip',ram='$ram',card='$card',drive='$drive',display='$display',connect='$connect',vantay='$vantay',operation='$operation',pin='$pin',weight='$weight',discount='$discount', quantity_product='$quantity_product', image='$unique_image' where id = '$id'";
                $result = $this->db->Update($sql);
    
                $select = "SELECT id FROM product_details where product_id = '$id'";
                $result1 = $this->db->Select($select);
                while($row = $result1->fetch_assoc()){
                    $ID = $row['id'];
                }
    
                $sql1 = "update product_details set img='$unique_image', imgTieuDe='$image2',content='$content',title='$title' where id = '$ID'";
                $result2 = $this->db->Update($sql1);

            if($result){
                $alert = "<div class='success'>Update Successfully!!</div>";
                return $alert;
            }else{
                $alert = "<div class='error'>Failed to Update product!!</div>";
                return $alert;
            }
        }

        }
    }

        public function delete_product($id){
            $query = "DELETE FROM product_details where product_id = '$id'";
            $result1 = $this->db->Delete($query);
            $sql = "DELETE FROM product WHERE id = '$id'";
            $result = $this->db->Delete($sql);
                if($result){
                    $alert = "<div class='success'>Delete Successfully!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Failed to Delete product!!</div>";
                    return $alert;
                }
        }

        public function getCatesByProductId($id){
			$query = "SELECT c.id FROM category c INNER JOIN product p ON c.id= p.cate_id WHERE p.id= '$id'";
			$result = $this->db->Select($query);
			return $result;
		}

        public function getBrandByProductId($id){
			$query = "SELECT brand_id FROM product WHERE id = '$id'";
			$result = $this->db->Select($query);
			return $result;
		}

        public function getContentProducts($id){
			$query = "SELECT * FROM product_details WHERE product_id = '$id'";
			$result = $this->db->Select($query);
			return $result;
		}

        function getproductsbyId($id){
            $query = "SELECT * FROM product WHERE id= '$id' ";
			$result = $this->db->Select($query);
			return $result;
        }

        function getTopSell(){
            $query = "SELECT * FROM product WHERE 1 ORDER BY selled DESC LIMIT 5";
			$result = $this->db->Select($query);
			return $result;
        }

        function getTopNew(){
            $query = "SELECT * FROM product WHERE 1 ORDER BY time_add DESC LIMIT 5";
			$result = $this->db->Select($query);
			return $result;
        }

        function getListBySearch($keyword){
            $query = "SELECT * FROM product WHERE name LIKE '%$keyword%' ORDER BY name";
			$result = $this->db->Select($query);
			return $result;
        }

        function getProductById($id){
            $query = "SELECT * FROM product WHERE id= $id";
			$result = $this->db->Select($query);
			return $result;
        }

        function SearchProductByKeyWord($KeyWord){
            $query = "SELECT * FROM product WHERE name LIKE N'%". $KeyWord . "%'";
            $result = $this->db->Select($query);
			return $result;
        }

 
    }
    
?>