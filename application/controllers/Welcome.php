<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $data = array();
        $data['all_published_category'] = $this->welcome_model->select_all_published_category();
        $data['recent_blog'] = $this->welcome_model->select_recent_blog();
        $data['populer_blog'] = $this->welcome_model->select_populer_blog();
        $data['all_published_blog'] = $this->welcome_model->select_all_published_blog();
        $data["main_content"] = $this->load->view("pages/home_content", $data, TRUE);
        $data["title"] = "Home";
        $data["slider"] = TRUE;
        $data["tab_content"] = TRUE;
        $this->load->view('master', $data);
    }

    public function sign_up() {
        $blogger_name = $this->session->userdata('blogger_name');
        if ($blogger_name != null) {
            redirect('Welcome', 'refresh');
        } else {
            $data = array();
            $data['all_published_category'] = $this->welcome_model->select_all_published_category();
            $data['recent_blog'] = $this->welcome_model->select_recent_blog();
            $data['populer_blog'] = $this->welcome_model->select_populer_blog();
            $data["main_content"] = $this->load->view('pages/sign_up', '', TRUE);
            $data["title"] = "Sign Up";
            $data["tab_content"] = TRUE;
            $this->load->view('master', $data);
        }
    }

    public function user_sign_up_info_store() {
        $data = array();
        $fdata = array();
        $sdata = array();
        $error = '';
        $data['blogger_name'] = $this->input->post('blogger_name');
        $data['blogger_email_address'] = $this->input->post('blogger_email_address');
        $data['blogger_password'] = md5($this->input->post('blogger_password'));
        /*
         * start image upload
         */

        $config['upload_path'] = './blogger_image/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('blogger_image')) {
            $error = $this->upload->display_errors();
            $sdata['exception'] = $error;
            $this->session->set_userdata($sdata);
            redirect('Welcome/sign_up');
        } else {
            $fdata = $this->upload->data();
            $data['blogger_image'] = $config['upload_path'] . $fdata['file_name'];
        }


        /*
         * end image uploade
         */

        $this->welcome_model->save_blogger_info($data);
        $sdata['message'] = 'You Registered Successfully!!';
        $this->session->set_userdata($sdata);
        redirect('Welcome/sign_up');
    }

    public function login() {
        $blogger_name = $this->session->userdata('blogger_name');
        if ($blogger_name != null) {
            redirect('Welcome', 'refresh');
        } else {
            $data = array();
            $data['all_published_category'] = $this->welcome_model->select_all_published_category();
            $data['recent_blog'] = $this->welcome_model->select_recent_blog();
            $data['populer_blog'] = $this->welcome_model->select_populer_blog();
            $data['main_content'] = $this->load->view('pages/login', '', true);
            //$data["slider"] = TRUE;
            $data["tab_content"] = TRUE;
            $data['title'] = 'User Login';
            $this->load->view('master', $data);
        }
    }

    public function user_login_check() {
        $sdata = array();
        $user_email_address = $this->input->post('blogger_email_address', true);
        $user_password = $this->input->post('blogger_password', true);
        $result = $this->welcome_model->check_user_login_info($user_email_address, $user_password);
        if ($result) {
            $sdata['blogger_name'] = $result->blogger_name;
            $sdata['blogger_image'] = $result->blogger_image;
            $this->session->set_userdata($sdata);
            redirect('Welcome');
        } else {
            $sdata['exception'] = 'Your Email Or Password Invalid !!';
            $this->session->set_userdata($sdata);
            redirect('Welcome/login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('blogger_name');
        $this->session->unset_userdata('blogger_image');
        redirect('Welcome');
    }

    public function about_us() {
        $data = array();
        $data['all_published_category'] = $this->welcome_model->select_all_published_category();
        $data["main_content"] = "<h1>About Us!</h1>";
        $data["title"] = "About Us";
        $this->load->view("master", $data);
    }

    public function contact_us() {
        $data = array();
        $data['all_published_category'] = $this->welcome_model->select_all_published_category();
        $data['recent_blog'] = $this->welcome_model->select_recent_blog();
        $data['populer_blog'] = $this->welcome_model->select_populer_blog();
        $data["main_content"] = $this->load->view('pages/contact_us', '', TRUE);
        $data["title"] = "Contact Us";
        $data["tab_content"] = TRUE;
        $this->load->view('master', $data);
    }

    public function blog_details($blog_id) {
        $data = array();
        $data['all_published_category'] = $this->welcome_model->select_all_published_category();
        $data['blog_info'] = $this->super_admin_model->select_blog_by_id($blog_id);
        $hit_count = $data['blog_info']->hit_count + 1;
        $this->welcome_model->update_hit_count($hit_count, $blog_id);
        $data['recent_blog'] = $this->welcome_model->select_recent_blog();
        $data['populer_blog'] = $this->welcome_model->select_populer_blog();
        $data['main_content'] = $this->load->view('pages/blog_details', $data, true);
        $data["slider"] = TRUE;
        $data["tab_content"] = TRUE;
        $data["title"] = $data['blog_info']->blog_title;
        $this->load->view('master', $data);
    }

    public function category_product($category_id) {
        $data = array();
        $data['all_published_category'] = $this->welcome_model->select_all_published_category();
        $data['recent_blog'] = $this->welcome_model->select_recent_blog();
        $data['populer_blog'] = $this->welcome_model->select_populer_blog();
        $data['category_blog'] = $this->welcome_model->select_all_blog_by_category_id($category_id);
        $data['main_content'] = $this->load->view('pages/category_blog', $data, true);
        $data["slider"] = TRUE;
        $data["tab_content"] = TRUE;
        $result = $this->welcome_model->select_category_name_by_id($category_id);
        $data["title"] = $result->category_name;
        $this->load->view('master', $data);
    }

}
