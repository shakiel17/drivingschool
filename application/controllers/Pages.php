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
                redirect(base_url()."main");
            }
            $this->load->view('pages/'.$page);            
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
            $data['recent_enrollee'] = $this->School_model->getAllCustomers();
            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);            
            $this->load->view('templates/admin/footer');
        }
        //=====================================End of Admin Module==================================
    }
?>