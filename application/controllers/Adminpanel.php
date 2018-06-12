<?php
session_start();
error_reporting(0);
date_default_timezone_set('Europe/Istanbul');
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPanel extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
	} 
	function index()
	{
		if($_SESSION["admin"] == null){
			redirect('adminpanel/login');
		}
		else{
			$this->load->view('panel/panel');
		}
	}
	function login(){
		if($_SESSION["admin"] == null){
			$this->load->view('panel/login');
		}
		else{
			redirect('adminpanel');
		}
	} 
	 
	function page($folder, $file){ 
		$data['admins'] = $this->db->get('admin')->result();
		$data['customers'] = $this->db->get('users')->result();
		$data['products'] = $this->db->query("select product.id as id,detail,product.name as name, product.price as price, brands.name as brand,categories.name as category from product inner join brands on product.brand_id=brands.id inner join categories on categories.id=product.category_id")->result();
		$data['orders'] = $this->db->query("select users.name, total,orders.state as state from orders inner join users on users.id =orders.user_id")->result();
		$data['categories'] = $this->db->get('categories')->result();
		$data['comments'] = $this->db->get('comments')->result();
		$data['brands'] = $this->db->get('brands')->result();
		$this->load->view('panel/'.$folder.'/'.$file, $data);
	}

	function update($folder, $id){
		if($folder == 'user'){
			$table ='admin';
		}
		else if($folder=='customer'){
			$table="users";
		}
		else if($folder=='product'){
			$table="product";
		}
		else if($folder=='category'){
			$table="categories";
		}
		else if($folder=='brand'){
			$table="brands";
		}
		$this->db->where('id', $id);
		$data['data'] = $this->db->get($table)->row();
		$data['categories'] = $this->db->get('categories')->result(); 
		$data['brands'] = $this->db->get('brands')->result();
		$this->load->view('panel/'.$folder.'/update',$data);
	}

	/**
	Admin güncelleme
	*/
	function update_user($id){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$this->db->where('id', $id); 
		$isUser = $this->db->get('admin');

		if($isUser->num_rows()==1){
			$admin = array('username' => $username , 'password' => $password, 'level' => $level );
			$this->db->where('id',$id);
			$update=$this->db->update('admin',$admin);
			if($update)
				redirect('adminpanel/page/user/list');
			else
				echo "hata";
		}
	}

	/**
	Müşteri güncelleme
	*/
	function update_customer($id){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$name = $this->input->post('name');
		$surname = $this->input->post('surname');
		$email = $this->input->post('email');
		$banned = $this->input->post('banned');

		$this->db->where('id', $id); 
		$isUser = $this->db->get('users');

		if($isUser->num_rows()==1){
			$user = array('username' => $username , 'password' => $password, 'name' => $name, 'surname'=>$surname,'email'=>$email,'banned' => $banned );
			$this->db->where('id',$id);
			$update=$this->db->update('users',$user);
			if($update)
				redirect('adminpanel/page/customer/list');
			else
				echo "hata";
		}
	}

	/**
	Ürün güncelleme
	*/
	function update_product($id){
		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$price = $this->input->post('price'); 
		$category_id = $this->input->post('category_id'); 
		$brand_id = $this->input->post('brand_id'); 
		$detail = $this->input->post('detail');  
		$image = $this->input->post('image');  

		if($image != ''){
			if($_FILES['file']['error'] > 0) { echo 'Error during uploading, try again'; }
				$extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );
				$extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;
				if (in_array($extUpload, $extsAllowed) ) { 
					$image = "{$_FILES['file']['name']}";
					$result = move_uploaded_file($_FILES['file']['tmp_name'], "images/".$image);
					if($result){
						$item = array('type' => $type , 'price' => $price, 'name' => $name, 'category_id'=>$category_id,'brand_id'=>$brand_id,'detail'=>$detail,'image'=>$image );
					}
				} 
				else { 
					echo 'File is not valid. Please try again';
				}
		}
		else{
			$item = array('type' => $type , 'price' => $price, 'name' => $name, 'category_id'=>$category_id,'brand_id'=>$brand_id,'detail'=>$detail );
		}

		 
		$this->db->where('id', $id); 
		$isItem = $this->db->get('product');

		if($isItem->num_rows()==1){ 
			$this->db->where('id',$id);
			$update=$this->db->update('product',$item);
			if($update)
				redirect('adminpanel/page/product/list');
			else
				echo "hata";
		}
	}

	/**
	Kategori güncelleme
	*/
	function update_category($id){
		$name = $this->input->post('name');
		$input = array('name' => $name );
		$this->db->where('id',$id);
		$this->db->update('categories',$input);
		redirect('adminpanel/page/category/list');
	}

	function signup(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$isUser = $this->db->get('users');
		// eğer bu kullanıcı adı şifre varsa
		if($isUser->num_rows() > 0){
			$msg = "Bu kullanıcı mevcut";
		}
		else{
			$user = array('username' => $username , 'password' => $password );
			$insert = $this->db->insert('users', $user);
			if($insert)
				$msg="Kayıt başarılı!";
			else
				$msg="Kayıt esnasında hata oluştu!";
		}
		echo $msg;
	}

	function doLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$isUser = $this->db->get('admin');
		// eğer bu kullanıcı adı şifre varsa
		if($isUser->num_rows() > 0){
			$admin = $isUser->row();
			$_SESSION['admin'] = $admin;
			redirect('adminpanel');
		}
		else{
			echo "Kullanıcı adı veya şifre yanlış!";
		}
	}

	function logout(){
		session_destroy();
		redirect('adminpanel/login');
	}

	function liste($table){
		print_r($this->db->get($table)->result());
	}

	function createAdmin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level'); 

		$admin = array('username' => $username , 'password' => $password, 'level' => $level);
		$insert = $this->db->insert('admin', $admin);
		if($insert)
			echo "ok";
		else
			echo "error";
	}
	function createOrder(){	
		$product_id = $this->input->post('product_id');
		$user_id = $this->input->post('user_id');
		$date = $this->input->post('date');
		$piece = $this->input->post('piece');

		$order = array('product_id' => $product_id , 'user_id' => $user_id, 'date' => $date, 'piece' => $piece);
		$insert = $this->db->insert('orders', $order);
		if($insert)
			echo "ok";
		else
			echo "error";
	}

	function create_product(){
		$name = $this->input->post('name');
		$price = $this->input->post('price');
		$type = $this->input->post('type');
		$category_id = $this->input->post('category_id');
		$brand_id = $this->input->post('brand_id');
		$detail = $this->input->post('detail');

		if($_FILES['file']['error'] > 0) { echo 'Error during uploading, try again'; }
		$extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );
		$extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;
		if (in_array($extUpload, $extsAllowed) ) { 
			$image = "{$_FILES['file']['name']}";
			$result = move_uploaded_file($_FILES['file']['tmp_name'], "images/".$image);
			if($result){
				$product = array('name' => $name , 'price' => $price, 'image' => $image, 'brand_id' => $brand_id, 'category_id'=>$category_id,'detail'=>$detail);
				$insert = $this->db->insert('product', $product);
				if($insert)
					redirect('adminpanel/page/product/list');
				else
					echo "error";
			}
		} 
		else { 
			echo 'File is not valid. Please try again';
		}
	}

	function add_category(){
		$array = array('name' => $this->input->post('name') );
		$add=$this->db->insert('categories',$array);
		if($add)
			redirect('adminpanel/page/category/list');
	}

	function add_brand(){
		$array = array('name' => $this->input->post('name'),'category_id' => $this->input->post('category_id') );
		$add=$this->db->insert('brands',$array);
		if($add)
			redirect('adminpanel/page/brand/list');
	}

	function update_brand($id){
		$array = array('name' => $this->input->post('name'),'category_id' => $this->input->post('category_id') );
		$this->db->where('id',$id);
		$add=$this->db->update('brands',$array);
		if($add)
			redirect('adminpanel/page/brand/list');
	}

	function create_customer(){
		$username=$this->input->post('username');
		$name=$this->input->post('name');
		$surname=$this->input->post('surname');
		$password=$this->input->post('password');
		$email=$this->input->post('email');
		$user = array('username' => $username , 'surname'=>$surname,'name'=>$name,'password'=>$password,'email'=>$email );
		$add = $this->db->insert('users',$user);
		if($add)
			$data['msg']="Başarılı";
		else
			$data['msg']="Hatalı";
		redirect('adminpanel/page/customer/list');
	}

	function stok(){
		$product_id = $this->input->post('product_id');
		$piece = $this->input->post('piece'); 
	}

	function add_user(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$admin = array('username' => $username , 'password' => $password, 'level' => $level );
		if($this->db->insert('admin',$admin))
			redirect('adminpanel/page/user/list');
		else
			echo "ok";
	}

	function del($table,$id){
		$del=$this->db->query("delete from $table where id=$id");
		if($del)
			echo "ok";
		else
			echo "error";
	}

}
