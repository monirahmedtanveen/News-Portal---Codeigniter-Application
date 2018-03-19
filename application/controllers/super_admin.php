<?php

class Super_Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $admin_name = $this->session->userdata('admin_name');
//        $this->load->model('super_admin_model');
        if ($admin_name == null) {
            redirect('admin', 'refresh');
        }
    }

    public function index() {
        $data = array();
        $data["admin_main_content"] = $this->load->view('admin/pages/dashboard', '', TRUE);
        $data["title"] = "Dashboard";
        $this->load->view('admin/admin_master', $data);
    }

    public function logout() {
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_password');
        $sdata = array();
        $sdata['message'] = 'You are Successfully Logout !!';
        $this->session->set_userdata($sdata);
        redirect('admin');
    }

    public function add_category() {
        $data = array();
        $data['admin_main_content'] = $this->load->view('admin/pages/add_category', '', TRUE);
        $data['title'] = "Add Category";
        $this->load->view('admin/admin_master', $data);
    }

    public function save_category() {
        $data = array();
        $data['category_name'] = $this->input->post('category_name', true);
        $data['category_description'] = $this->input->post('category_description', true);
        $data['publication_status'] = $this->input->post('publication_status', true);
//        $this->load->model('super_admin_model');
        $this->super_admin_model->save_category_info($data);
        $sdata = array();
        $sdata['message'] = 'Save Category Information Successfully!!';
        $this->session->set_userdata($sdata);
        redirect('super_admin/add_category');
    }

    public function manage_category() {
        $data = array();
        $data['all_category'] = $this->super_admin_model->select_all_category();
        $data['admin_main_content'] = $this->load->view('admin/pages/manage_category', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function unpublished_category($category_id) {
        $this->super_admin_model->unpublished_category_by_id($category_id);
        redirect('super_admin/manage_category');
    }

    public function published_category($category_id) {
        $this->super_admin_model->published_category_by_id($category_id);
        redirect('super_admin/manage_category');
    }

    public function edit_category($category_id) {
        $data = array();
        $data['category_info'] = $this->super_admin_model->select_category_by_id($category_id);
        $data['admin_main_content'] = $this->load->view('admin/pages/edit_category', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_category() {
        $data = array();
        $data['category_name'] = $this->input->post('category_name');
        $data['category_description'] = $this->input->post('category_description');
        $data['publication_status'] = $this->input->post('publication_status');
        $category_id = $this->input->post('category_id');
        $this->super_admin_model->update_catergory_by_id($data, $category_id);
        redirect('super_admin/manage_category');
    }

    public function delete_category($category_id) {

        $this->super_admin_model->delete_category_by_id($category_id);
        redirect('super_admin/manage_category');
    }

    public function add_blog() {
        $data = array();
        $data['all_published_category'] = $this->welcome_model->select_all_published_category();
        $data['admin_main_content'] = $this->load->view('admin/pages/add_blog', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function save_blog() {
        $data = array();
        $fdata = array();
        $error = '';
        $sdata = array();
        $data['blog_title'] = $this->input->post('blog_title', true);
        $data['category_id'] = $this->input->post('category_id', true);
        $data['blog_short_description'] = $this->input->post('blog_short_description', true);
        $data['blog_long_description'] = $this->input->post('blog_long_description', true);
        $data['author_name'] = $this->session->userdata('admin_name');
        $data['publication_status'] = $this->input->post('publication_status', true);
        /*
         * Start Image Upload
         */
        $config['upload_path'] = './blog_image/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('blog_image')) {
            $error = $this->upload->display_errors();
            $sdata['exception'] = $error;
            $this->session->set_userdata($sdata);
            redirect('super_admin/add_blog');
        } else {
            $fdata = $this->upload->data();
            $data['blog_image'] = $config['upload_path'] . $fdata['file_name'];
        }


        /*
         * End Image Upload
         */

        $this->super_admin_model->save_blog_info($data);
        $sdata = array();
        $sdata['message'] = 'Save Blog Successfully!!';
        $this->session->set_userdata($sdata);
        redirect('super_admin/add_blog');
    }

    public function manage_blog() {
        $data = array();
        $data['all_blog_info'] = $this->super_admin_model->select_all_blog_info();
        $data['admin_main_content'] = $this->load->view('admin/pages/manage_blog', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function published_blog($blog_id) {
        $this->super_admin_model->published_blog_by_id($blog_id);
        redirect('super_admin/manage_blog');
    }

    public function unpublished_blog($blog_id) {
        $this->super_admin_model->unpublished_blog_by_id($blog_id);
        redirect('super_admin/manage_blog');
    }

    public function edit_blog($blog_id) {
        $data = array();
        $data['all_published_category'] = $this->welcome_model->select_all_published_category();
        $data['blog_info'] = $this->super_admin_model->select_blog_by_id($blog_id);
        $data['admin_main_content'] = $this->load->view('admin/pages/edit_blog', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_blog() {
        $data = array();
        $data['blog_title'] = $this->input->post('blog_title', true);
        $data['category_id'] = $this->input->post('category_id', true);
        $data['blog_short_description'] = $this->input->post('blog_short_description', true);
        $data['blog_long_description'] = $this->input->post('blog_long_description', true);
        $data['publication_status'] = $this->input->post('publication_status', true);
        $blog_id = $this->input->post('blog_id', true);
        $this->super_admin_model->update_blog_by_id($data, $blog_id);
        redirect('super_admin/manage_blog');
    }

    public function delete_blog($blog_id) {
        $this->super_admin_model->delete_blog_by_blog_id($blog_id);
        redirect('super_admin/manage_blog');
    }

}
