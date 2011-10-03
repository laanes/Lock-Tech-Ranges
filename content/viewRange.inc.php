<?php 

if (isset($_GET['catId'])) {

$view_range = new XTemplate ('content'.CC_DS.'viewRange.tpl');
require_once('modules'.CC_DS.'3rdparty'.CC_DS.'lock_tech_ranges'.CC_DS.'classes'.CC_DS.'lock_tech_ranges.class.php');

for($i=0; $i<=$ranges->rangeCount; $i++) {
	
$view_range->assign('DATA', $ranges[$i]);
$view_range->parse('products.product_loop');

}

$view_range->parse('products');

}

else {
	
header('Location: '.$glob['storeURL']);

}

?>