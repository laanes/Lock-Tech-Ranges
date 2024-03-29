<?php 

class Lock_Tech_Ranges {

	public $products = array();

	public function __construct( $range_id ) {

	$this->setProducts($range_id);
		
	}

	private function setProducts($range_id) {
		
	$query = "SELECT i.productId, i.productCode, i.description, i.image, i.price, i.sale_price, i.name, i.cat_id, i.stock_level, i.WSL, c.cat_name, c.cat_father_id FROM CubeCart_inventory AS i JOIN CubeCart_category AS c ON i.cat_id = c.cat_id WHERE range_id = " . $range_id;

	$products = $this->select($query);

	$this->products = $products;
	
	}


	public function cat_father_by_id( $cat_id ) {
		
	$query = "SELECT cat_father_id, cat_name FROM CubeCart_category WHERE cat_id = $cat_id LIMIT 1";

	$cat_name = $this->select($query);

	return $cat_name;

	}

	public function range_name_by_id( $range_id ) {
		
	$query = "SELECT range_name FROM lock_tech_ranges WHERE range_id = $range_id LIMIT 1";

	$result = $this->select($query);

	return $result[0]['range_name'];

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