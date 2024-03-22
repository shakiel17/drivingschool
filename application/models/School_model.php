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
        public function save_instructor(){
            $id=$this->input->post('id');
            $fullname=$this->input->post('fullname');
            $check=$this->db->query("SELECT * FROM instructor WHERE fullname='$fullname' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO instructor(fullname,`image`) VALUES('$fullname','')");
                }else{
                    $result=$this->db->query("UPDATE instructor SET fullname='$fullname' WHERE id = '$id'");
                }
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function save_instructor_image(){
            $id=$this->input->post('id');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("UPDATE instructor SET `image`='$imgContent' WHERE id='$id'");            
            }else{
                return false;
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_instructor($id){
            $result=$this->db->query("DELETE FROM instructor WHERE `id`='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function save_car(){
            $id=$this->input->post('id');
            $description=$this->input->post('description');
            $brand=$this->input->post('brand');
            $model=$this->input->post('model');
            $transtype=$this->input->post('transtype');
            $vehicletype=$this->input->post('vehicletype');
            $gastype=$this->input->post('gastype');
            $datearray=date('Y-m-d');
            $timearray=date('H:i:s');
            $check=$this->db->query("SELECT * FROM cars WHERE `description`='$description' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO cars(`description`,brand,model,trans_type,vehicle_type,gas_type,datearray,timearray,`image`) VALUES('$description','$brand','$model','$transtype','$vehicletype','$gastype','$datearray','$timearray','')");
                }else{
                    $result=$this->db->query("UPDATE cars SET `description`='$description',brand='$brand',model='$model',trans_type='$transtype',vehicle_type='$vehicletype',gas_type='$gastype' WHERE id='$id'");
                }
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function save_car_image(){
            $id=$this->input->post('id');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("UPDATE cars SET `image`='$imgContent' WHERE id='$id'");            
            }else{
                return false;
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_car($id){
            $result=$this->db->query("DELETE FROM cars WHERE `id`='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }
?>