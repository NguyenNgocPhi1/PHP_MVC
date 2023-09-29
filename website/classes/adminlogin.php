<?php
    $filepath = realpath(dirname(__FILE__));
    include ($filepath.'/../lib/session.php');
    Session::checklogin();
    
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class adminlogin
    {
        private $db;
        private $fm;
        function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function login_admin($user,$password){
            $user = $this->fm->validation($user);
            $password = $this->fm->validation($password);
            $user = mysqli_real_escape_string($this->db->link, $user);
            $password = mysqli_real_escape_string($this->db->link, $password);

            if(empty($user) || empty($password)){
                $alert = "User and Password must be not empty";
                return $alert;
            }else{
                $query = "select * from tbl_admin where user = '$user' and password = '$password' limit 1";
                $result = $this->db->select($query);

                if($result != false){
                    $value = $result->fetch_assoc();
                    Session::set('login',true);
                    Session::set('id',$value['id']);
                    Session::set('user',$value['user']);
                    Session::set('name',$value['name']);
                    header('Location:index.php');
                }else{
                    $alert = "User and Password not match";
                    return $alert;
                }
            }
        }
    }
?>