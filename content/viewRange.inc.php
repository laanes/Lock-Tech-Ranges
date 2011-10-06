<?php

if (isset($_GET['rangeId'])) {

$view_range = new XTemplate ('content'.CC_DS.'viewRange.tpl');
require_once('modules'.CC_DS.'3rdparty'.CC_DS.'lock_tech_ranges'.CC_DS.'classes'.CC_DS.'lock_tech_ranges.controller.php');

$range_products = new Lock_Tech_Ranges_Controller($_GET['rangeId']);

$view_range->assign('HOME_HREF',  $glob['storeURL']);
$view_range->assign('RANGE_HREF', $_SERVER['PHP_SELF']);
$view_range->assign('RANGE_NAME', $range_products->range_name);
$view_range->assign('RANGE_ID',   $range_products->range_id);

$view_range->assign("CURRENT_URL", currentPage());


	for($i=0; $i<=$range_products->productCount-1; $i++) { 

			$image_path = $range_products->image_paths[$i];

			$productId  = $range_products->products[$i]['productId'];

			$view_range->assign('NAME', $range_products->products[$i]['name']);

			$view_range->assign('PRICE', $range_products->products[$i]['price']);

			$view_range->assign('STOCK', $range_products->stock_levels[$i]);

			$view_range->assign('ID', $productId);

			$view_range->assign('HREF', $range_products->product_links[$i]);

			$view_range->assign('IMAGE', $image_path);

			$view_range->parse('products.product_loop');

	 }

$view_range->parse('products');

$page_content = $view_range->text('products');

}

else {
	
// header('Location: ' . $glob['storeURL']);

}

?>