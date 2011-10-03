<?php 

if (isset($_GET['rangeId'])) {

$view_range = new XTemplate ('content'.CC_DS.'viewRange.tpl');
require_once('modules'.CC_DS.'3rdparty'.CC_DS.'lock_tech_ranges'.CC_DS.'classes'.CC_DS.'lock_tech_ranges.class.php');

for($i=0; $i<=$range_products->productCount-1; $i++) {
	
$view_range->assign('DATA', $range_products->products[$i]);
$view_range->parse('products.product_loop');

}

$view_range->parse('products');

$page_content = $view_range->text('products');

}

else {
	
header('Location: '.$glob['storeURL']);

}

?>