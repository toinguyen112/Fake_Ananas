<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


<?php
    class address{
        private $db;
        private $fm;

        public function __construct(){
            $this->db  = new Database();
            $this->fm = new Format();
        }

        public function add_address($mskh,$dc){
            if($dc==""){
                $alert = "<span style='color:red;font-size:20px;font-weight:600;'>Vui lòng nhập địa chỉ giao hàng.</span>";
                return $alert;
            }
            else{
                $query = "INSERT INTO diachikh(MSKH,DiaChi) VALUE('$mskh','$dc')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span style='color: var(--primary-color);font-size:20px;font-weight:600;'>
                    Đặt hàng thành công.
                    </span>";
                    return $alert;
                }
            }
        }

        public function getAddress(){
            $query = "SELECT *FROM diachikh";
            $result = $this->db->select($query);
            return $result;
        }
        
    }
?>