<?php
/**
* 
*/
class Site_model extends ci_model
{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	} 

	function categories(){
		$x_categories =  $this->db->query("select categories.id as id ,count(category_id) as total_brand, categories.name as category_name from brands inner join categories on categories.id = brands.category_id group by brands.category_id")->result();
		$categories = $this->db->get('categories')->result();
		foreach ($categories as $category) {
			$var = 0;
			foreach ($x_categories as $x_category) {
				if($x_category->id == $category->id){
					$var++;
				}
			}
			if(!$var){
				$new = array('id' => $category->id, 'total_brand'=>0, 'category_name'=>$category->name );
				$count = count($x_categories);
				$x_categories[$count]->id = $category->id;
				$x_categories[$count]->total_brand = 0;
				$x_categories[$count]->category_name = $category->name;
			} 
		}
		return $x_categories;

	}

	function brand_items(){
		return $this->db->query("SELECT count(brand_id) AS total, brands.name FROM product inner join brands on brands.id = product.brand_id GROUP BY product.brand_id;")->result();
	}

	function category_brands(){
		return $this->db->query("select brands.id as brand_id,categories.name as category_name, brands.name as brand_name from brands inner join categories on brands.category_id = categories.id")->result();
	}

	function types(){
		return $this->db->query("select * from product group by type limit 10")->result();
	}

	function select_table($table){
		return $this->db->query("select * from $table")->result();
	}

	function doRegister($email, $password, $name){ 

		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('banned', '0');
		$isUser = $this->db->get('users');
		// eğer bu kullanıcı adı şifre varsa
		if($isUser->num_rows() > 0){
			$msg = "Bu kullanıcı mevcut";
		}
		else{
			$user = array('email' => $email , 'password' => $password, 'name' => $name );
			$insert = $this->db->insert('users', $user);
			if($insert)
				$msg="Kayıt başarılı!";
			else
				$msg="Kayıt esnasında hata oluştu!";
		}
		return $msg;
	}

	function doLogin($email, $password){ 
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('banned', '0');
		$isUser = $this->db->get('users');
		// eğer bu kullanıcı adı şifre varsa
		if($isUser->num_rows() > 0){
			$user = $isUser->row();
			$_SESSION['user'] = $user;
			return 1;
		}
		else{
			return 0;
		}
	}

	function detail($table, $id){
		return $this->db->query("select * from $table where id = $id")->row();
	}

	function add_cart($user_id, $product_id, $quantity){
		if(!isset($_SESSION['order'])){ 
			$order = $this->db->query("insert into orders (user_id, total) values($user_id,0)");
			$order = $this->db->insert_id();	
			$_SESSION['order'] = $order;
		}
			$order = $_SESSION['order'];
			return $this->db->query("insert into baskets (product_id,user_id, quantity, state) values ('$product_id', '$user_id', $quantity, $order)");
	}


	function baskets($user_id){
		return $this->db->query("SELECT product.name as product_name, baskets.id as id, baskets.quantity,product.image, product.price as price FROM `baskets` inner join product on product.id = baskets.product_id inner join users on users.id=baskets.user_id where baskets.user_id=$user_id")->result();
	} 

	function comments($id){
		return $this->db->query("select * from comments inner join users on users.id=comments.user_id  where product_id=$id")->result();
	}

	function add_comment($comment, $user_id, $product_id){
		return $this->db->query("insert into comments (user_id,product_id, comment) values ('$user_id','$product_id', '$comment')");
	}

	function user_update($user,$username,$name,$surname,$password){
		$this->db->where('username', $username);
		$isUsername = $this->db->get('users');

		if($isUsername->num_rows() > 0)
			return -1; // username var
		else
			$userUpdate = array('username' => $username, 'name' => $name, 'surname' => $surname, 'password' => $password);
			$this->db->where('id', $user);
			return $this->db->update('users', $userUpdate);
	}

	function add_bill($user,$address,$code,$country,$state, $phone, $detail){
		$this->db->where('user_id', $user);
		$isUser = $this->db->get('bill');

		if($isUser->num_rows() == 1){
			$info = array('address' => $address, 'code' => $code, 'country' => $country, 'state' => $state, 'phone' => $phone,
		 'detail' => $detail);
			$this->db->where('user_id', $user);
			return $this->db->update('bill', $info);
		}
		else{
			$info = array('user_id'=>$user, 'address' => $address, 'code' => $code, 'country' => $country, 'state' => $state, 'phone' => $phone,
		 'detail' => $detail);
			return $this->db->insert('bill', $info);
		}
	}

	function user_info($user_id){
		return $this->db->query("select * from bill inner join users on users.id = bill.user_id where bill.user_id =$user_id")->row();
	}

	function del_cart($id){
		$this->db->where('id', $id);
		return $this->db->query("delete from baskets where id=$id");
	}

	function pay($user_id, $order){
		$total = $this->db->query("select sum(product.price) as total from baskets inner join product on product.id=baskets.product_id where state=$order")->row();
		$order_ = array('total' => $total->total, 'state' => 1 );
		$this->db->where('id', $order);
		$update = $this->db->update('orders', $order_);
		if($update){
			return $this->db->query("delete from baskets where state = $order");
		}
	}
}