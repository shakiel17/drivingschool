<?php
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    date_default_timezone_set('Asia/Manila');
    class Pages extends CI_Controller{
        public function index(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                redirect(base_url()."user_main");
            }
            $this->load->view('pages/'.$page);            
        }
        public function register(){
            $page = "register";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                redirect(base_url()."main");
            }
            $this->load->view('pages/'.$page);            
        }
        public function user_authentication(){
            $auth=$this->School_model->user_authenticate();
            if($auth){
                $userdata=array(
                    'username' => $auth['username'],
                    'fullname' => $auth['fullname'],
                    'user_login' => true
                );
                $this->session->set_userdata($userdata);
                redirect(base_url()."user_main");
            }else{
                echo "<script>alert('Invalid username and password!');window.location='".base_url()."';</script>";
            }
        }
        public function save_registration(){
            $username=$this->input->post('username');
            $save=$this->School_model->save_registration();            
            if($save){
                $fullname=$save['firstname']." ".$save['lastname'];
                $userdata=array(
                    'username' => $username,
                    'fullname' => $fullname,
                    'user_login' => true
                );
                $this->session->set_userdata($userdata);
                redirect(base_url()."user_main");
            }else{
                echo "<script>alert('Unable to create account!');window.location='".base_url()."';</script>";
            }
        }
        public function user_logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('user_login');
            redirect(base_url());
        }
        public function user_main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url());
            }            
            $data['enrollees'] = $this->School_model->getAllEnrollees();
            $data['instructors'] = $this->School_model->getAllInstructors();
            $data['cars'] = $this->School_model->getAllCars();
            $data['customers'] = $this->School_model->getAllCustomers();            
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar');
            $this->load->view('templates/user/navbar');            
            $this->load->view('pages/'.$page,$data);            
            $this->load->view('templates/user/modal');
            $this->load->view('templates/user/footer');
        }
        public function user_enrollment(){
            $page = "user_enrollment";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url());
            }            
            $user=$this->session->username;
            $data['items'] = $this->School_model->getAllEnrollment($user);                       
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar');
            $this->load->view('templates/user/navbar');            
            $this->load->view('pages/'.$page,$data);            
            $this->load->view('templates/user/modal');
            $this->load->view('templates/user/footer');
        }       
        public function save_enrollment(){
            $save=$this->School_model->save_enrollment();
            if($save){
                $this->session->set_flashdata('success','Enrollment details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save enrollment details!');
            }
            redirect(base_url()."user_enrollment");
        } 
        public function user_session($regno){
            $page = "user_session";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url());
            }    
            $data['regno'] = $regno;                    
            $data['items'] = $this->School_model->getAllSession($regno);  
            $data['cars'] = $this->School_model->getAllCars();
            $data['teach'] = $this->School_model->getAllInstructors();
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar');
            $this->load->view('templates/user/navbar');            
            $this->load->view('pages/'.$page,$data);            
            $this->load->view('templates/user/modal',$data);
            $this->load->view('templates/user/footer');
        }

        public function new_session(){
            $page = "new_session";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url());
            }            
            $regno = $this->input->post('regno');
            $trans_type = $this->input->post('trans_type');
            $instructor = $this->input->post('instructor');
            $data['regno'] = $regno;
            $data['trans_type'] = $trans_type;
            $data['instructor'] = $instructor;
            $data['car_id']="";
            $data['items'] = $this->School_model->getAllCarByTransmission($trans_type);    
            $data['car'] = array();  
            $data['datetime'] = "";
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar');
            $this->load->view('templates/user/navbar');            
            $this->load->view('pages/'.$page,$data);            
            $this->load->view('templates/user/modal');
            $this->load->view('templates/user/footer');
        }
        public function select_car_session(){
            $page = "new_session";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url());
            }            
            $regno = $this->input->post('regno');
            $trans_type = $this->input->post('trans_type');
            $instructor = $this->input->post('instructor');
            $car=$this->input->post('car');
            $data['regno'] = $regno;
            $data['trans_type'] = $trans_type;
            $data['instructor'] = $instructor;
            $data['car_id'] = $car;
            $data['datetime'] = "";
            $data['items'] = $this->School_model->getAllCarByTransmission($trans_type);
            $data['car'] = $this->School_model->getSingleCarDetails($car);
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar');
            $this->load->view('templates/user/navbar');            
            $this->load->view('pages/'.$page,$data);            
            $this->load->view('templates/user/modal');
            $this->load->view('templates/user/footer');
        }
        public function select_session_datetime(){
            $page = "new_session";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url());
            }            
            $regno = $this->input->post('regno');
            $trans_type = $this->input->post('trans_type');
            $instructor = $this->input->post('instructor');
            $car=$this->input->post('car');
            $month=$this->input->post('month');
            $year=$this->input->post('year');
            if(isset($_POST['am_session'])){
                $add=$this->School_model->add_session("AM");
                if($add){
                    echo "<script>alert('Session successfully added!');</script>";
                }else{
                    echo "<script>alert('Unable to add session!');</script>";
                }                
            }
            if(isset($_POST['pm_session'])){
                $add=$this->School_model->add_session("PM");
                if($add){
                    echo "<script>alert('Session successfully added!');</script>";
                }else{
                    echo "<script>alert('Unable to add session!');</script>";
                }                
            }
            $data['regno'] = $regno;
            $data['trans_type'] = $trans_type;
            $data['instructor'] = $instructor;
            $data['car_id'] = $car;
            $data['datetime'] = $year."-".$month;
            $data['items'] = $this->School_model->getAllCarByTransmission($trans_type);
            $data['car'] = $this->School_model->getSingleCarDetails($car);
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar');
            $this->load->view('templates/user/navbar');            
            $this->load->view('pages/'.$page,$data);            
            $this->load->view('templates/user/modal');
            $this->load->view('templates/user/footer');
        }
        public function remove_session($id,$regno){
            $remove=$this->School_model->remove_session($id);
            if($remove){
                $this->session->set_flashdata('success','Session successfully removed!');
            }else{
                $this->session->set_flashdata('failed','Unable to remove session details!');
            }
            redirect(base_url()."user_session/$regno");

        }
        public function user_payment($regno){
            $page = "user_payment";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url());
            }    
            $data['regno'] = $regno;                    
            $data['items'] = $this->School_model->getAllPaymentByRegNo($regno);              
            $this->load->view('templates/user/header');
            $this->load->view('templates/user/sidebar');
            $this->load->view('templates/user/navbar');            
            $this->load->view('pages/'.$page,$data);            
            $this->load->view('templates/user/modal',$data);
            $this->load->view('templates/user/footer');
        }
        public function user_payment_save(){
            $regno=$this->input->post('regno');
            $remove=$this->School_model->user_payment_save();
            if($remove){
                $this->session->set_flashdata('success','Payment details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save payment details!');
            }
            redirect(base_url()."user_payment/$regno");
        }
        public function remove_payment($id,$regno){            
            $remove=$this->School_model->remove_payment($id);
            if($remove){
                $this->session->set_flashdata('success','Payment details successfully removed!');
            }else{
                $this->session->set_flashdata('failed','Unable to remove payment details!');
            }
            redirect(base_url()."user_payment/$regno");
        }
        //=====================================Start of Admin Module================================
        public function admin(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                redirect(base_url()."admin_main");
            }
            $this->load->view('pages/admin/'.$page);            
        }
        public function admin_authentication(){
            $auth=$this->School_model->admin_authenticate();
            if($auth){
                $userdata=array(
                    'username' => $auth['username'],
                    'fullname' => $auth['fullname'],
                    'admin_login' => true
                );
                $this->session->set_userdata($userdata);
                redirect(base_url()."admin_main");
            }else{
                echo "<script>alert('Invalid username and password!');window.location='".base_url()."admin';</script>";
            }
        }
        public function admin_logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('admin_login');
            redirect(base_url()."admin");
        }
        public function admin_main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url()."admin");
            }
            $data['enrollees'] = $this->School_model->getAllEnrollees();
            $data['instructors'] = $this->School_model->getAllInstructors();
            $data['cars'] = $this->School_model->getAllCars();
            $data['customers'] = $this->School_model->getAllCustomers();
            $data['recent_enrollee'] = $this->School_model->getRecentEnrollees();
            $datenow=date('Y-m-d');
            $timenow=date('H:i:s');
            $this->School_model->change_session_status($datenow,$timenow);
            $this->School_model->notify_session();
            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);            
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/admin/footer');
        }
        public function manage_instructor(){
            $page = "manage_instructor";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url()."admin");
            }
            
            $data['instructors'] = $this->School_model->getAllInstructors();            
            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);            
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/admin/footer');
        }
        public function save_instructor(){
            $save=$this->School_model->save_instructor();
            echo "<script>";
            if($save){
                echo "alert('Instructor details successfully saved!');";
            }else{
                echo "alert('Unable to save instructor details!');";
            }
                echo "window.location='".base_url()."manage_instructor';</script>";
            echo "</script>";
        }
        public function save_instructor_image(){
            $save=$this->School_model->save_instructor_image();
            echo "<script>";
            if($save){
                echo "alert('Instructor image successfully saved!');";
            }else{
                echo "alert('Unable to save instructor image!');";
            }
                echo "window.location='".base_url()."manage_instructor';</script>";
            echo "</script>";
        }
        public function delete_instructor($id){
            $save=$this->School_model->delete_instructor($id);
            echo "<script>";
            if($save){
                echo "alert('Instructor details successfully deleted!');";
            }else{
                echo "alert('Unable to delete instructor details!');";
            }
                echo "window.location='".base_url()."manage_instructor';</script>";
            echo "</script>";
        }

        public function manage_cars(){
            $page = "manage_cars";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url()."admin");
            }
            
            $data['cars'] = $this->School_model->getAllCars();            
            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);            
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/admin/footer');
        }
        public function save_car(){
            $save=$this->School_model->save_car();
            echo "<script>";
            if($save){
                echo "alert('Car details successfully saved!');";
            }else{
                echo "alert('Unable to save car details!');";
            }
                echo "window.location='".base_url()."manage_cars';</script>";
            echo "</script>";
        }
        public function save_car_image(){
            $save=$this->School_model->save_car_image();
            echo "<script>";
            if($save){
                echo "alert('Car image successfully saved!');";
            }else{
                echo "alert('Unable to save instructor image!');";
            }
                echo "window.location='".base_url()."manage_cars';</script>";
            echo "</script>";
        }
        public function delete_car($id){
            $save=$this->School_model->delete_car($id);
            echo "<script>";
            if($save){
                echo "alert('Car details successfully deleted!');";
            }else{
                echo "alert('Unable to delete car details!');";
            }
                echo "window.location='".base_url()."manage_cars';</script>";
            echo "</script>";
        }
        public function manage_enrollee(){
            $page = "manage_enrollee";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url()."admin");
            }
            
            $data['enrollees'] = $this->School_model->getAllActiveEnrollees();            
            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);            
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/admin/footer');
        }
        public function manage_user_session($regno){
            $page = "manage_user_session";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url()."admin");
            }
            $data['regno'] = $regno;
            $data['sessions'] = $this->School_model->getAllSession($regno);            
            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);            
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/admin/footer');
        }
        public function edit_session($id,$regno){
            $page = "edit_session";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url()."admin");
            }
            $data['regno'] = $regno;
            $data['sid'] = $id;
            $data['session'] = $this->School_model->getSingleSession($id);            
            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);            
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/admin/footer');
        }
        public function update_session(){
            $regno=$this->input->post('regno');            
            $save=$this->School_model->update_session();
            echo "<script>";
            if($save){
                echo "alert('session details successfully updated!');";
            }else{
                echo "alert('Unable to update session details!');";
            }
                echo "window.location='".base_url()."manage_user_session/$regno';</script>";
            echo "</script>";
        }
        public function remove_session_admin($id,$regno){
            $save=$this->School_model->remove_session($id);
            echo "<script>";
            if($save){
                echo "alert('session details successfully removed!');";
            }else{
                echo "alert('Unable to remove session details!');";
            }
                echo "window.location='".base_url()."manage_user_session/$regno';</script>";
            echo "</script>";
        }
        public function update_session_status($id,$regno,$status){
            $save=$this->School_model->update_session_status($id,$status);
            echo "<script>";
            if($save){
                echo "alert('Session status successfully updated!');";
            }else{
                echo "alert('Unable to update session status!');";
            }
                echo "window.location='".base_url()."manage_user_session/$regno';</script>";
            echo "</script>";
        }

        public function manage_user_payment($regno){
            $page = "manage_user_payment";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url()."admin");
            }
            $data['regno'] = $regno;
            $data['sessions'] = $this->School_model->getAllPaymentByRegno($regno);            
            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);            
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/admin/footer');
        }
        public function view_proof_payment($invno){
            $page = "view_image";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url()."admin");
            }            
            $data['item'] = $this->School_model->getAllPaymentByInvoice($invno);            
            $this->load->view('pages/admin/'.$page,$data);                        
        }
        public function update_payment_status($invno,$regno){
            $save=$this->School_model->update_payment_status($invno);
            echo "<script>";
            if($save){
                echo "alert('Payment status successfully updated!');";
            }else{
                echo "alert('Unable to update payment status!');";
            }
                echo "window.location='".base_url()."manage_user_payment/$regno';</script>";
            echo "</script>";
        }
        public function print_invoice($invno){
            $page = "invoice";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }           
            $data['invno'] = $invno;
            $data['item'] = $this->School_model->getAllPaymentByInvoice($invno);                        
            $this->load->view('pages/admin/'.$page,$data);                                    
        }
        public function print_invoice_summary($regno){
            $page = "invoice_summary";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }           
            $data['regno'] = $regno;
            $data['items'] = $this->School_model->getAllPaymentByRegNo($regno);
            $this->load->view('pages/admin/'.$page,$data);                                    
        }
        //=====================================End of Admin Module==================================
    }
?>