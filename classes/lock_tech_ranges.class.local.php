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
		
	$query = "SELECT productId, productCode, description, image, price, sale_price, name, cat_id, stock_level, WSL FROM CubeCart_inventory WHERE range_id = " . $range_id;

	$products = $this->select($query);

	$this->products = $products;
	
	}

	private function countProds() {
		
	$this->productCount = count($this->products);

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

var_dump($range_products->products[0]['name']);