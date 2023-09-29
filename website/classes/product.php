<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class product
    {
        private $db;
        private $fm;
        function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_product($data,$files){
            $productname = mysqli_real_escape_string($this->db->link, $data['productname']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $productdesc = mysqli_real_escape_string($this->db->link, $data['productdesc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            //Kiểm tra hình ảnh và lấy hình ảnh cho vao folder upload   
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
            if($productname == "" || $brand == "" || $productdesc == "" || $price == "" || $category == "" || $type == "" || $file_name == ""){
                $alert = "<span class='error'>Fiels must be not empty</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "insert into tbl_product(productname,brandid,catid,productdesc,price,type,image) 
                            values('$productname','$brand','$category','$productdesc','$price','$type','$unique_image')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Insert Product Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Insert Product not Success</span>";
                    return $alert;
                }
            }
        }
        public function show_product(){
            $query = "select * from tbl_product order by productid desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproductbyid($id){
            $query = "select * from tbl_product where productid = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
       
        public function update_product($data,$files,$id){
            $productname = mysqli_real_escape_string($this->db->link, $data['productname']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $productdesc = mysqli_real_escape_string($this->db->link, $data['productdesc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            //Kiểm tra hình ảnh và lấy hình ảnh cho vao folder upload   
            $permited = array('jpg', 'jpeg', 'png', 'gif', 'webp');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
            if($productname== "" || $brand== "" || $productdesc== "" || $price== "" || $category== "" || $type== ""){
                $alert = "<span class='error'>Fiels must be not empty</span>";
                return $alert;
            }else{
                if(!empty($file_name)){
                    if($file_size > 20480){
                        $alert = "<span class='error'>Image Size should be less then 2MB!</span>";
                        return $alert;
                    }elseif(in_array($file_ext,$permited) === false){
                        //echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                        $alert = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                        return $alert;
                    }
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "update tbl_product set 
                    productname = '$productname',
                    brandid = '$brand',
                    catid = '$category',
                    type = '$type',
                    price = '$price',
                    image = '$unique_image',
                    productdesc = '$productdesc'
                     where productid = '$id'";
                }else{
                    $query = "update tbl_product set 
                    productname = '$productname',
                    brandid = '$brand',
                    catid = '$category',
                    type = '$type',
                    price = '$price',
                    productdesc = '$productdesc'
                    where productid = '$id'";
                }
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Update Product Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Update Product not Success</span>";
                    return $alert;
                }
            }
        }
         public function delete_product($id){
            $query = "delete from tbl_product where productid = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Product delete Successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Product delete not Success</span>";
                return $alert;
            }
        }
        public function getproduct_feathered(){
            $query = "select * from tbl_product where type = '0'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproduct_new(){
            $query = "select * from tbl_product order by productid desc LIMIT 3";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_details($id){
            $query = "
                select tbl_product.*, tbl_category.catname, tbl_brand.brandname
                from tbl_product inner join tbl_category on tbl_product.catid = tbl_category.catid
                inner join tbl_brand on tbl_product.brandid = tbl_brand.brandid
                where tbl_product.productid = '$id'
            ";
            $result = $this->db->select($query);
            return $result;
        }
        public function getlastestDell(){
            $query = "select * from tbl_product  order by productid desc LIMIT 3";
            $result = $this->db->select($query);
        }
    }
