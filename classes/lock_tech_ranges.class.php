<?php 

class Lock_Tech_Ranges {

	private $range_id;
	public  $products = array();
	public  $productCount;
	
	public function __construct($range_id) {

	$this->setProducts($range_id);
	$this->countProds();
		
	}

	private function setProducts($range_id) {

	global $db;
		
	$query = "SELECT productId, productCode, description, image, price, sale_price, name, cat_id, stock_level, WSL FROM CubeCart_inventory WHERE range_id = " . $range_id;

	$products = $db->select($query);

	$this->products = $products;
	
	}

	private function countProds() {
		
	$this->productCount = count($this->products);

	}

	private function create_image_paths() {
		
	foreach($this->products as $key => $value):

	$image_path[] = "http://lock-tech.co.uk/shop" . "images/uploads/thumbs/thumb_" . str_replace('productImages/', '', $value['image']); 

	endforeach;

	return $image_path;

	}
		

}

$range_products = new Lock_Tech_Ranges(1);

var_dump($range_products->create_image_paths());


?>