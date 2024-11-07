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
        public function user_authenticate(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $result=$this->db->query("SELECT * FROM `user` WHERE username='$username' AND password='$password'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function save_registration(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $lastname=$this->input->post('lastname');
            $firstname=$this->input->post('firstname');
            $middlename=$this->input->post('middlename');
            $gender=$this->input->post('gender');            
            $birthdate=$this->input->post('birthdate');
            $address=$this->input->post('address');
            $email=$this->input->post('email');
            $contactno=$this->input->post('contactno');
            $customer_no=date('YmdHis');
            $datearray=date('Y-m-d');
            $timearray=date('H:i:s');
            $fullname=$firstname." ".$lastname;
            $check=$this->db->query("SELECT * FROM user WHERE username='$username'");
            if($check->num_rows()>0){
                return false;
            }else{
                $check=$this->db->query("SELECT * FROM customer WHERE email='$email' OR contactno='$contactno'");
                if($check->num_rows()>0){
                    return false;
                }else{
                    $result=$this->db->query("INSERT INTO customer(customer_no,lastname,firstname,middlename,gender,birthdate,`address`,email,contactno,datearray,timearray) VALUES('$customer_no','$lastname','$firstname','$middlename','$gender','$birthdate','$address','$email','$contactno','$datearray','$timearray')");
                    if($result){
                        $result=$this->db->query("INSERT INTO user(username,`password`,fullname,datearray,timearray,customer_no) VALUES('$username','$password','$fullname','$datearray','$timearray','$customer_no')");
                        if($result){
                            return true;
                        }else{
                            $this->db->query("DELETE FROM customer WHERE customer_no='$customer_no'");
                            return false;
                        }
                    }else{
                        return false;
                    }
                }
            }
        }
        public function getAllEnrollment($user){
            $result=$this->db->query("SELECT e.* FROM enrollee e INNER JOIN user u ON u.customer_no=e.customer_no WHERE u.username='$user'");
            return $result->result_array();
        }
        public function save_enrollment(){
            $user=$this->session->username;
            $query=$this->db->query("SELECT * FROM user WHERE username='$user'");
            $res=$query->row_array();
            $customer_no=$res['customer_no'];
            $regno=date('YmdHis');
            $payment_type=$this->input->post('payment_type');
            $amount=6000;
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $result=$this->db->query("INSERT INTO enrollee(regno,customer_no,payment_type,amount,datearray,timearray) VALUES('$regno','$customer_no','$payment_type','$amount','$date','$time')");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getPayment($regno){
            $result=$this->db->query("SELECT * FROM payment WHERE regno='$regno'");
            return $result->result_array();
        }
        public function getAllSession($regno){
            $result=$this->db->query("SELECT * FROM schedule WHERE regno='$regno' ORDER BY datearray ASC");
            return $result->result_array();
        }
        public function getSingleCarDetails($id){
            $result=$this->db->query("SELECT * FROM cars WHERE id='$id'");
            return $result->row_array();
        }
        public function getSingleInstructorDetails($id){
            $result=$this->db->query("SELECT * FROM instructor WHERE id='$id'");
            return $result->row_array();
        }
        public function getAllCarByTransmission($type){
            $result=$this->db->query("SELECT * FROM cars WHERE trans_type='$type'");
            return $result->result_array();
        }
        public function add_session($session){
            $regno = $this->input->post('regno');            
            $instructor = $this->input->post('instructor');
            $car=$this->input->post('car');
            $datearray=$this->input->post('datearray');            
            if($session=="AM"){
                $check=$this->db->query("SELECT * FROM schedule WHERE regno='$regno' AND car_id='$car' AND instructor_id='$instructor' AND datearray='$datearray' AND starttime='08:00:00'");
                if($check->num_rows()>0){

                }else{
                    $result=$this->db->query("INSERT INTO schedule(car_id,instructor_id,regno,datearray,starttime,endtime,`status`) VALUES('$car','$instructor','$regno','$datearray','08:00:00','09:30:00','pending')");
                }                
            }
            if($session=="PM"){
                $check=$this->db->query("SELECT * FROM schedule WHERE regno='$regno' AND car_id='$car' AND instructor_id='$instructor' AND datearray='$datearray' AND starttime='14:00:00'");
                if($check->num_rows()>0){

                }else{
                    $result=$this->db->query("INSERT INTO schedule(car_id,instructor_id,regno,datearray,starttime,endtime,`status`) VALUES('$car','$instructor','$regno','$datearray','14:00:00','15:30:00','pending')");
                }
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function remove_session($id){
            $result=$this->db->query("DELETE FROM schedule WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllPaymentByRegNo($regno){
            $result=$this->db->query("SELECT * FROM payment WHERE regno='$regno' ORDER BY datearray ASC");
            return $result->result_array();
        }
        public function user_payment_save(){
            $regno=$this->input->post('regno');
            $invno=$this->input->post('invno');
            $amount=$this->input->post('amount');
            $remarks=$this->input->post('remarks');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("INSERT INTO payment(invno,regno,amount,remarks,datearray,timearray,img) VALUES('$invno','$regno','$amount','$remarks','$date','$time','$imgContent')");
            }else{
                return false;
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function remove_payment($id){
            $result=$this->db->query("DELETE FROM payment WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllActiveEnrollees(){
            $result=$this->db->query("SELECT e.*,c.lastname,c.firstname FROM enrollee e INNER JOIN customer c ON c.customer_no=e.customer_no WHERE e.status <> 'completed' AND e.status <> 'cancel' GROUP BY customer_no ORDER BY e.datearray DESC");
            return $result->result_array();
        }
        public function getSingleSession($id){
            $result=$this->db->query("SELECT * FROM schedule WHERE id='$id'");
            return $result->row_array();
        }
        public function update_session(){
            $id=$this->input->post('sid');
            $regno=$this->input->post('regno');
            $car_id=$this->input->post('car');
            $instructor=$this->input->post('instructor');
            $datearray=$this->input->post('datearray');
            $starttime=$this->input->post('starttime');
            $endtime=$this->input->post('endtime');
            $result=$this->db->query("UPDATE schedule SET car_id='$car_id',instructor_id='$instructor',datearray='$datearray',starttime='$starttime',endtime='$endtime',notify='0' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }

        }
        public function update_session_status($id,$status){
            $result=$this->db->query("UPDATE schedule SET `status`='$status' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllPaymentByInvoice($invno){
            $result=$this->db->query("SELECT * FROM payment WHERE invno='$invno'");
            return $result->row_array();
        }

        public function update_payment_status($invno){
            $result=$this->db->query("UPDATE payment SET `status`='paid' WHERE invno='$invno'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function change_session_status($date,$time){
            $query=$this->db->query("SELECT * FROM schedule WHERE datearray='$date' AND `status`='pending'");
            if($query->num_rows()>0){
                $items=$query->result_array();
                foreach($items as $item){
                    $id=$item['id'];
                    $starttime=$item['starttime'];
                    $endtime=$item['endtime'];
                    if($time >= $starttime){
                        $this->db->query("UPDATE schedule SET `status`='ongoing' WHERE id='$id'");
                    }                   
                }
            }
        }
        public function notify_session(){
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'easykill.aboy@gmail.com',
                'smtp_pass' => 'ngfpdqyrfvoffhur',
                'mailtype' => 'text',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $datenow=date('Y-m-d');
            $datetomorrow=date('Y-m-d',strtotime('1 day',strtotime($datenow)));
            $query=$this->db->query("SELECT * FROM schedule WHERE datearray='$datetomorrow' AND notify='0'");
            if($query->num_rows() > 0){
                $row=$query->result_array();
                foreach($row as $item){
                    $id=$item['id'];
                    $regno=$item['regno'];
                    $qry=$this->db->query("SELECT c.email,c.lastname,c.firstname FROM customer c INNER JOIN enrollee e ON e.customer_no=c.customer_no WHERE e.regno='$regno'");
                    $res=$qry->row_array();
                    $email=$res['email'];
                    $name=$res['firstname']." ".$res['lastname'];
                    $subject="Driving Tutorial Session Update";
                    $from="Flores 1 on 1 Driving School";
                    $message="Hello $name!, We are please to inform you that your driving session tomorrow ".date('F d, Y',strtotime($datetomorrow)).", ".date('h:i A',strtotime($item['starttime']))." to ".date('h:i A',strtotime($item['starttime']))." will commence and end respectively.";
                    $this->load->library('email',$config);
                    $this->email->set_newline("\r\n");
                    $this->email->from($from);
                    $this->email->to($email);
                    $this->email->subject($subject);
                    $this->email->message($message);
                    if($this->email->send()){
                        $this->db->query("UPDATE schedule SET notify='1' WHERE id='$id'");
                    }
                }
            }
        }
        public function update_profile(){
            $customer_no=$this->input->post('customer_no');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $lastname=$this->input->post('lastname');
            $firstname=$this->input->post('firstname');
            $middlename=$this->input->post('middlename');
            $gender=$this->input->post('gender');            
            $birthdate=$this->input->post('birthdate');
            $address=$this->input->post('address');
            $email=$this->input->post('email');
            $contactno=$this->input->post('contactno');
            $fullname=$firstname." ".$lastname;
            $check=$this->db->query("SELECT * FROM user WHERE username='$username' AND customer_no <> '$customer_no'");
            if($check->num_rows()>0){
                return false;
            }else{
                $result=$this->db->query("UPDATE customer SET lastname='$lastname',firstname='$firstname',middlename='$middlename',gender='$gender',birthdate='$birthdate',`address`='$address',email='$email',contactno='$contactno' WHERE customer_no='$customer_no'");
                if($result){
                    $this->db->query("UPDATE user SET username='$username',`password`='$password',fullname='$fullname' WHERE customer_no='$customer_no'");
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function getAllUserChat(){
            $username=$this->session->username;
            $result=$this->db->query("SELECT * FROM chat WHERE sender='$username' OR receiver='$username' ORDER BY datearray ASC,timearray ASC");
            return $result->result_array();
        }
        public function getAllAdminChat(){            
            $result=$this->db->query("SELECT * FROM chat WHERE sender='admin' OR receiver='admin' ORDER BY datearray ASC,timearray ASC");
            return $result->result_array();
        }
        public function save_chat(){
            $sender=$this->session->username;
            $receiver="admin";
            $message=$this->input->post('message');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $this->db->query("INSERT INTO chat(`message`,sender,receiver,datearray,timearray) VALUES('$message','$sender','$receiver','$date','$time')");
            return true;
        }
        public function save_chat_admin(){
            $sender="admin";
            $receiver=$this->input->post('receiver');;
            $message=$this->input->post('message');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $this->db->query("INSERT INTO chat(`message`,sender,receiver,datearray,timearray) VALUES('$message','$sender','$receiver','$date','$time')");
            return true;
        }
        public function getAllMessages(){
            $result=$this->db->query("SELECT * FROM chat WHERE receiver='admin' GROUP BY sender ORDER BY datearray DESC");
            return $result->result_array();
        }     
        public function update_chat_status($sender){
            $this->db->query("UPDATE chat SET `status`='seen' WHERE sender='$sender'");
        }
    }
?>