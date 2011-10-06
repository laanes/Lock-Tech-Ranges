<?php

class Lock_Tech_Ranges {

	public $products = array();
	public static $limit;
	public static $page;
	public $range_id;

	public function __construct( $range_id ) {

	$this->$range_id = $range_id;

	$this->setProducts();
		
	}

	protected function getProducts( $limit=true ) {

	global $db;
		
	$query = "SELECT i.productId, i.productCode, i.description, i.image, i.price, i.sale_price, i.name, i.cat_id, i.stock_level, i.WSL, c.cat_name, c.cat_father_id FROM CubeCart_inventory AS i JOIN CubeCart_category AS c ON i.cat_id = c.cat_id WHERE range_id = " . $this->range_id;

	$products = ($limit==true) ? $db->select($query, self::$limit, self::$page) : $db->select($query);

	return $products;
	
	}

	private function setProducts() {
		
	$this->products = $this->getProducts();

	}


	public function cat_father_by_id( $cat_id ) {

	global $db;
		
	$query = "SELECT cat_father_id, cat_name FROM CubeCart_category WHERE cat_id = $cat_id LIMIT 1";

	$cat_name = $db->select($query);

	return $cat_name;

	}

	public function range_name_by_id( $range_id ) {

	global $db;

	$query = "SELECT range_name FROM lock_tech_ranges WHERE range_id = $range_id LIMIT 1";

	$result = $db->select($query);

	return $result[0]['range_name'];

	}

}		