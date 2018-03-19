<?php

class Welcome_Model extends CI_Model {
    
    public function select_all_published_category(){
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('publication_status',1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_published_blog() {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('publication_status',1);
        $this->db->order_by('blog_id','desc');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_blog_by_category_id($category_id) {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('publication_status',1);
        $this->db->where('category_id',$category_id);
        $this->db->order_by('blog_id','desc');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_category_name_by_id($category_id) {
        $this->db->select('category_name');
        $this->db->from('tbl_category');
        $this->db->where('category_id',$category_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function select_recent_blog() {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('publication_status',1);
        $this->db->order_by('blog_id','desc');
        $this->db->limit(4);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_populer_blog() {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('publication_status',1);
        $this->db->order_by('hit_count','desc');
        $this->db->limit(4);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function update_hit_count($hit_count,$blog_id) {
        $this->db->set('hit_count',$hit_count);
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_blog');
    }
    
    public function save_blogger_info($data) {
        $this->db->insert('tbl_blogger',$data);
    }
    
    public function check_user_login_info($user_email_address,$user_password) {
        $this->db->select('*');
        $this->db->from('tbl_blogger');
        $this->db->where('blogger_email_address',$user_email_address);
        $this->db->where('blogger_password',md5($user_password));
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
}
