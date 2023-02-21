<?php 

class Products extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }

    public function index(){
        $data['main_view'] = "products/index";
// echo $this->cart->total_items();
        $data['products'] = $this->Product_model->get_products();
        $this->load->view('layouts/main', $data);
    }

    public function addToCart($productid){
        $product = $this->Product_model->get_product($productid);
        
        $data = array(
            'id'      => $product->id,
            'qty'     => 1,
            'price'   => $product->price,
            'name'    => $product->name
        );

        $this->cart->insert($data);

        redirect('cart');
    }

}

?>