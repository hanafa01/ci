<?php 

class Products extends CI_Controller{

    public function index(){
        $data['main_view'] = "products/index";

        $data['products'] = $this->Product_model->get_products();
        $this->load->view('layouts/main', $data);
    }

}

?>