<?php

class Super_Admin_Model extends CI_Model {
    //put your code here
    public function save_category_info($data){
        $this->db->insert('tbl_category',$data);
    }
    
    public function select_all_category(){
        $this->db->select('*');
        $this->db->from('tbl_category');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function unpublished_category_by_id($category_id){
        $this->db->set('publication_status',0);
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category');
    }
    
    public function published_category_by_id($category_id){
        $this->db->set('publication_status',1);
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category');
    }
    
    public function select_category_by_id($category_id){
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id',$category_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_catergory_by_id($data,$category_id){
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category',$data);
    } 

    public function delete_category_by_id($category_id){
        $this->db->where('category_id',$category_id);
        $this->db->delete('tbl_category');
    }
    
    public function save_blog_info($data) {
        $this->db->insert('tbl_blog',$data);
    }
    
    public function select_all_blog_info() {
        $sql = 'SELECT b.*,c.category_name FROM tbl_blog as b,tbl_category as c WHERE '
                . 'b.category_id = c.category_id';
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
//        $this->db->select('*');
//        $this->db->from('tbl_blog');
//        $query_result = $this->db->get();
//        $result = $query_result->result();
        return $result;
    }
    
    public function published_blog_by_id($blog_id) {
        $this->db->set('publication_status',1);
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_blog');
    }
    
    public function unpublished_blog_by_id($blog_id) {
        $this->db->set('publication_status',0);
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_blog');
    }
    
    public function delete_blog_by_blog_id($blog_id) {
        $this->db->where('blog_id',$blog_id);
        $this->db->delete('tbl_blog');
    }
    
    public function select_blog_by_id($blog_id) {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('blog_id',$blog_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function update_blog_by_id($data,$blog_id) {
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_blog',$data);
    }
}
