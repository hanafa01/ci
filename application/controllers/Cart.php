<?php 

class Cart extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }

    public function index(){
        $data['main_view'] = "cart/index";

        $data['cartItems'] = $this->cart->contents();

        $this->load->view('layouts/main', $data);
    }

    public function updateItemQty(){
        if(isset($_POST['qty']) && isset($_POST['cartid'])){
            $data = array(
                'rowid' => $_POST['cartid'],
                'qty'   => $_POST['qty']
            );
            $this->cart->update($data);
            echo true;
        }
        echo false;
    }

    public function removeItem($id){
       $this->cart->remove($id);
       redirect('cart');
    }

}

?>