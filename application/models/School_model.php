 <?php   
    date_default_timezone_set('Asia/Manila');
    class School_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        public function admin_authenticate(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $result=$this->db->query("SELECT * FROM `admin` WHERE username='$username' AND password='$password'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function getAllEnrollees(){
            $result=$this->db->query("SELECT * FROM enrollee ORDER BY datearray DESC");
            return $result->result_array();
        }
        public function getAllInstructors(){
            $result=$this->db->query("SELECT * FROM instructor ORDER BY id ASC");
            return $result->result_array();
        }
        public function getAllCars(){
            $result=$this->db->query("SELECT * FROM cars ORDER BY model ASC");
            return $result->result_array();
        }
        public function getAllCustomers(){
            $result=$this->db->query("SELECT * FROM customer ORDER BY lastname ASC");
            return $result->result_array();
        }
        public function getRecentEnrollees(){
            $result=$this->db->query("SELECT e.*,c.lastname,c.firstname FROM enrollee e INNER JOIN customer c ON c.customer_no=e.customer_no GROUP BY customer_no ORDER BY e.datearray DESC LIMIT 5");
            return $result->result_array();
        }
    }
?>