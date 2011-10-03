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
		
	$query = "SELECT productId, productCode, description, image, price, sale_price, name, cat_id, stock_level, WSL FROM CubeCart_inventory WHERE range_id = " . $range_id;

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

	$link .= $this->category_name_by_cat_id( $product['cat_id'] );

	endforeach;

	}

	public function category_name_by_cat_id( $cat_id ) {
		
	$query = "SELECT cat_name FROM CubeCart_category WHERE cat_id = $cat_id GROUP BY cat_name";

	$cat_name = $this->select($query);

	return $cat_name;

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

// var_dump($range_products->image_paths);
		