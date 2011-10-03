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
		
	$query = "SELECT i.productId, i.productCode, i.description, i.image, i.price, i.sale_price, i.name, i.cat_id, i.stock_level, i.WSL, c.cat_name, c.cat_father_id FROM CubeCart_inventory AS i JOIN CubeCart_category AS c ON i.cat_id = c.cat_id WHERE range_id = " . $range_id;

	$products = $db->select($query);

	$this->products = $products;
	
	}

	private function countProds() {
		
	$this->productCount = count($this->products);

	}




?>