<?php


class Admin extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $admin_name = $this->session->userdata('admin_name');
        if($admin_name != null){
            redirect('super_admin','refresh');
        }
    }
    
    public function index(){
        $this->load->view('admin/admin_login');
    }
    
    public function admin_login_cheack(){
        $email_address = $this->input->post('email_address',true);
        $admin_password = $this->input->post('admin_password',true);
        $this->load->model('admin_model');
        $result = $this->admin_model->cheack_admin_login_info($email_address,$admin_password);
        $sdata = array();
        if($result){
            $sdata['admin_name'] = $result->admin_name;
            $sdata['admin_password'] = $result->admin_password;
            $this->session->set_userdata($sdata);
            redirect('super_admin');
        }else{
            $sdata['exception'] = 'You Gave an Invalid Username or Password !!';
            $this->session->set_userdata($sdata);
            redirect('admin');
        }
        
    }
}
