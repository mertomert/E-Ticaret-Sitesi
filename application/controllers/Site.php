<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
error_reporting(0);
class Site extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('site_model');
	} 

	public function index()
	{
		$data['categories'] = $this->site_model->categories();  
		$data['types'] = $this->site_model->types();
		$data['products'] = $this->site_model->select_table('product');
		$data['brands'] = $this->site_model->select_table('brands');
		$data['content'] = "En çok Satılan Ürünler";
		$this->load->view('site', $data);
		//print_r($data);
	}

	function page($page){
		if($page != 'login' && $_SESSION['user'] && $page !== 'contact' ){
			$data['info'] = $this->site_model->user_info($_SESSION['user']->id); 
			$data['products'] = $this->site_model->select_table('product'); 
			$data['baskets'] = $this->site_model->baskets($_SESSION['user']->id);
			$data['user_info'] = $this->site_model->user_info($_SESSION['user']->id);
			$data['brands'] = $this->site_model->select_table('brands');
			$data['categories'] = $this->site_model->categories();
			$data['brand_items'] = $this->site_model->brand_items();
			$data['category_brands'] = $this->site_model->category_brands();
			$data['types'] = $this->site_model->types();
		}
		else{
			$data['categories'] = $this->site_model->categories();
			$data['brand_items'] = $this->site_model->brand_items();
			$data['brands'] = $this->site_model->select_table('brands');
			$data['category_brands'] = $this->site_model->category_brands();
			$data['types'] = $this->site_model->types();
		}
		if(!$_SESSION['user']){
			if($page =='cart' || $page=='checkout' || $page=='settings'){
				redirect('site/page/login');
			}
			else{
		$this->load->view($page, $data);
		}
			
		}
		else{
		$this->load->view($page, $data);
		}
	}

	function add_order($product_id){
		$user_id = $_SESSION['user']->id;
		$date=new Date();
		$quantity = $this->input->post('quantity');

		$order = array('product_id' => $product_id , 'date'=>$date, 'user_id'=>$user_id,'piece'=>$quantity );
		print_r($order);
	}

	function d(){
		print_r($this->site_model->select_table('brands'));
	}

	function doRegister(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$name = $this->input->post('name');

		$data['result'] = $this->site_model->doRegister($email, $password, $name);
		$this->load->view('login',$data);
	}

	function doLogin(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->site_model->doLogin($email, $password);
		// eğer bu kullanıcı adı şifre varsa
		if($user){ 
			redirect('site');
		}
		else{
			$data['msg']= "Kullanıcı adı veya şifre yanlış!";
		}
	}

	function logout(){
		session_destroy();
		redirect('site');
	}

	function user_update(){
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$surname = $this->input->post('surname');
		$password = $this->input->post('password');
		$password = $this->input->post('password');
		$user = $_SESSION['user']->id;

		$update = $this->site_model->user_update($user,$username,$name,$surname,$password);
		if($update)
			$data['msg'] = "Başarılı";
		else if($update == -1)
			$data['msg'] = "Kullanıcı adı mevcut";
		else
			$data['msg'] = "Hata";
		$this->load->view('settings', $data);
	}

	function add_bill(){
		$address = $this->input->post('address');
		$code = $this->input->post('code');
		$country = $this->input->post('country');
		$state = $this->input->post('state');
		$phone = $this->input->post('phone');
		$detail = $this->input->post('detail');
		$user = $_SESSION['user']->id;

		$update = $this->site_model->add_bill($user,$address,$code,$country,$state, $phone, $detail);
		if($update)
			$data['msg'] = "Başarılı";
		else
			$data['msg'] = "Hata";
		$this->load->view('settings', $data);
	}

	function product_detail($id){
		$data['categories'] = $this->site_model->categories();
		$data['brand_items'] = $this->site_model->brand_items();
		$data['category_brands'] = $this->site_model->category_brands();
		$data['types'] = $this->site_model->types();
		$data['products'] = $this->site_model->select_table('product');
		$data['brands'] = $this->site_model->select_table('brands');
		$data['product'] = $this->site_model->detail('product', $id);
		$data['comments'] = $this->site_model->comments( $id);
		$this->load->view('product-detail', $data);
	} 

	function add_baskets($product_id, $quantity){
		$user_id = $_SESSION['user']->id; 
		$state = $this->site_model->add_cart($user_id, $product_id, $quantity);
		if($state)
			redirect('site/page/cart');
		else
			echo "error";
	}

	function search(){
		$searchkey = $this->input->post('searchkey');
		$data['categories'] = $this->site_model->categories();
		$data['brand_items'] = $this->site_model->brand_items();
		$data['category_brands'] = $this->site_model->category_brands();
		$data['types'] = $this->site_model->types(); 
		$data['products'] = $this->site_model->search($searchkey);
		$this->load->view('search', $data);
	}

	function filter($part, $id){
		$data['categories'] = $this->site_model->categories();
		$data['brand_items'] = $this->site_model->brand_items();
		$data['brands'] = $this->site_model->select_table('brands');
		$data['category_brands'] = $this->site_model->category_brands();
		$data['types'] = $this->site_model->types(); 
		if($part == 'brands'){
			$item_id = 'brand_id';
		}
		else{
			$item_id = 'category_id';
		}
		$data['products'] = $this->db->query("select *from product where $item_id=$id")->result();
		$data['content'] = strtoupper($name);
		
		$this->load->view('search', $data);
	}

	function baskets(){
		$user_id = $_SESSION['user']->id;
		$data['baskets']=$this->site_model->baskets($user_id);
		$this->load->view('cart',$data);
	}

	function add_comment($comment, $product_id){
		$user_id = $_SESSION['user']->id; 
		$add = $this->site_model->add_comment($comment, $user_id, $product_id);
		if($add)
			echo "ok";
		else
			echo "error";
	}

	function del_cart($id){
		$del = $this->site_model->del_cart($id);
		if($del)
			echo "ok";
		else
			echo "error";
	} 

	function pay($order_id){
		$user_id = $_SESSION['user']->id; 
		$order = $_SESSION['order']; 
		$add = $this->site_model->pay($user_id, $order);
		if($add)
			echo "ok";
		else
			echo "error";
	}

}
