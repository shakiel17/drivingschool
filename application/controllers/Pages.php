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
            $save=$this->School_model->save_registration();            
            if($save){
                $fullname=$save['firstname']." ".$save['lastname'];
                $userdata=array(
                    'username' => $save['username'],
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
        //=====================================End of Admin Module==================================
    }
?>