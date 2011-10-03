<?php 

class Lock_Tech_Ranges {

	private $range_id;
	public  $products = array();
	public  $image_paths = array();
	public  $productCount;
	
	public function __construct($range_id) {

	$this->setProducts($range_id);
	$this->countProds();
	$this->create_image_paths();
		
	}

	private function setProducts($range_id) {
		
	$query = "SELECT i.productId, i.productCode, i.description, i.image, i.price, i.sale_price, i.name, i.cat_id, i.stock_level, i.WSL, c.cat_name, c.cat_father_id FROM CubeCart_inventory AS i JOIN CubeCart_category AS c ON i.cat_id = c.cat_id WHERE range_id = " . $range_id;

	$products = $this->select($query);

	$this->products = $products;
	
	}

	private function countProds() {
		
	$this->productCount = count($this->products);

	}

	public function create_image_paths() {
		
	foreach($this->products as $key => $value):

	$image_path[] = "http://lock-tech.co.uk/shop" . "/images/uploads/thumbs/thumb_" . str_replace('productImages/', '', $value['image']); 

	endforeach;

	$this->image_paths = $image_path;

	}

	public function create_product_links() {

	$link = "http://lock-tech.co.uk/shop/";
		
	foreach($this->products as $key => $product):

	$father = $this->cat_father_by_id($product['cat_father_id']);

	if($father['cat_father_id'] !== 0) {

	$grand_father = $this->cat_father_by_id($father['cat_father_id']);
	
	}

	else {
		
	// Carry on from here.

	}

	endforeach;

	return $father['cat_father_id'];


	}

	public function cat_father_by_id( $cat_id ) {
		
	$query = "SELECT cat_father_id, cat_name FROM CubeCart_category WHERE cat_id = $cat_id LIMIT 1";

	$cat_name = $this->select($query);

	foreach($cat_name as $father): endforeach;

	return $father;

	}
		


			private function exec($query) {

		$link = mysql_connect('localhost', 'root', '');

		mysql_select_db('swansea3_lock-tech-shop', $link);

		return mysql_query($query, $link);

		}

		function select($query, $maxRows = 0, $pageNum = 0) {

		$result = $this->exec($query);

		$max = mysql_num_rows($result);

		if ($max > 0) {

		for ($n = 0; $n < $max; ++$n) {

		$row = mysql_fetch_assoc($result);

		$output[$n] = $row;

		}

		return $output;

		} else {

		return false;

		}
		}
		


}

$range_products = new Lock_Tech_Ranges(1);

var_dump($range_products->create_product_links());
		