<?php
     $filepath = realpath(dirname(__FILE__));
     include_once ($filepath.'/../lib/database.php');
     include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class category
    {
        private $db;
        private $fm;
        function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_category($catname){
            $catname = $this->fm->validation($catname);
            $catname = mysqli_real_escape_string($this->db->link, $catname);
            if(empty($catname)){
                $alert = "<span class='error'>Category must be not empty</span>";
                return $alert;
            }else{
                $query = "insert into tbl_category(catname) values('$catname')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Insert category Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Insert category not Success</span>";
                    return $alert;
                }
            }
        }
        public function show_category(){
            $query = "select * from tbl_category order by catid desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getcatbyid($id){
            $query = "select * from tbl_category where catid = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function delete_category($id){
            $query = "delete from tbl_category where catid = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Category delete Successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Category delete not Success</span>";
                return $alert;
            }
        }
        public function update_category($catname,$id){
            $catname = $this->fm->validation($catname);
            $catname = mysqli_real_escape_string($this->db->link, $catname);
            $id = mysqli_real_escape_string($this->db->link, $id);
            if(empty($catname)){
                $alert = "<span class='error'>Category must be not empty</span>";
                return $alert;
            }else{
                $query = "update tbl_category set catname = '$catname' where catid = '$id'";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'>Update category Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Update category not Success</span>";
                    return $alert;
                }
            }
        }
    }
?>