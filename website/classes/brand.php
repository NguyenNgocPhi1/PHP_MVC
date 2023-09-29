<?php
     $filepath = realpath(dirname(__FILE__));
     include_once ($filepath.'/../lib/database.php');
     include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class brand
    {
        private $db;
        private $fm;
        function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_brand($brandname){ 
            $brandname = $this->fm->validation($brandname);
            $brandname = mysqli_real_escape_string($this->db->link, $brandname);
            if(empty($brandname)){
                $alert = "<span class='error'>brand must be not empty</span>";
                return $alert;
            }else{
                $query = "insert into tbl_brand(brandname) values('$brandname')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Insert brand Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Insert brand not Success</span>";
                    return $alert;
                }
            }
        }
        public function show_brand(){
            $query = "select * from tbl_brand order by brandid desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getbrandbyid($id){
            $query = "select * from tbl_brand where brandid = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function delete_brand($id){
            $query = "delete from tbl_brand where brandid = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>brand delete Successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>brand delete not Success</span>";
                return $alert;
            }
        }
        public function update_brand($brandname,$id){
            $brandname = $this->fm->validation($brandname);
            $brandname = mysqli_real_escape_string($this->db->link, $brandname);
            $id = mysqli_real_escape_string($this->db->link, $id);
            if(empty($brandname)){
                $alert = "<span class='error'>brand must be not empty</span>";
                return $alert;
            }else{
                $query = "update tbl_brand set brandname = '$brandname' where brandid = '$id'";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Update brand Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Update brand not Success</span>";
                    return $alert;
                }
            }
        }
    }
?>