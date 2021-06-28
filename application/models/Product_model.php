<?php 

class Product_model extends CI_Model{

    public function get_products(){
        $query = $this->db->get('products');
        return $query->result();
    }

    public function get_product($productid){
        $this->db->where('id', $productid);
        $query = $this->db->get('products');
        return $query->row();
    }
}

?>