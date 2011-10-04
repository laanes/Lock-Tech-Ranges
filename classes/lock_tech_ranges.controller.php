<?php require_once('lock_tech_ranges.class.php');

class Lock_Tech_Ranges_Controller extends Lock_Tech_Ranges {

	public  $image_paths 	= array();
	public  $product_links 	= array();
	public  $stock_levels 	= array(); 
	public  $productCount;
	public 	$range_name;
	public  $range_id;

	public function __construct( $range_id ) {

	$this->range_id = $range_id;

	$this->range_name = $this->range_name_by_id( $this->range_id );

	parent::__construct( $this->range_id );

		if( !empty( $this->products ) ) {

			$this->setup();

		}
		
	}

	public function setup() {
		
	$this->countProds();
	$this->create_properties();
	$this->create_product_links();

	}
	
	private function countProds() {
		
	$this->productCount = count($this->products);

	}

	private function create_properties() {

	global $glob;
		
	foreach($this->products as $key => $value):

		$image_path[] = $glob['storeURL'] . "/images/uploads/productImages/" . str_replace('productImages/', '', $value['image']);;

		$stock_levels[] = ($value['stock_level'] !== 0) ? "In Stock" : false;

		$cat_name[] = $value['cat_name'];

	endforeach;

	$this->image_paths 	= $image_path;

	$this->stock_levels = $stock_levels;

	$this->cat_name = $cat_name;

	}

	private function create_product_links() {

	global $glob;
		
	foreach($this->products as $key => $product):

	$link[] = $glob['storeURL'];

	$father = $this->cat_father_by_id($product['cat_father_id']);

	$grand_father = $this->cat_father_by_id($father[0]['cat_father_id']);

	if($grand_father[0]['cat_name']) {

	$link[] = $grand_father[0]['cat_name'];

	}

	$link[] = $father[0]['cat_name'];

	$link[] = $product['cat_name'];

	$link[] = $product['name'];

	$link[] = "prod_" . $product['productId'] . ".html";

	$link_chain[] = implode('/', $link);

	unset($link);

	endforeach;

	$this->product_links = $link_chain;

	}

}

?>