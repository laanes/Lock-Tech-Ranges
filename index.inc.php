<?php
/*
+--------------------------------------------------------------------------
|   CubeCart 4
|   ========================================
|	CubeCart is a registered trade mark of Devellion Limited
|   Copyright Devellion Limited 2010. All rights reserved.
|   Devellion Limited,
|   13 Ducketts Wharf,
|   South Street,
|   Bishops Stortford,
|   HERTFORDSHIRE.
|   CM23 3AR
|   UNITED KINGDOM
|   http://www.devellion.com
|	UK Private Limited Company No. 5323904
|   ========================================
|   Web: http://www.cubecart.com
|   Email: info (at) cubecart (dot) com
|	License Type: CubeCart is NOT Open Source Software and Limitations Apply
|   Licence Info: http://www.cubecart.com/v4-software-license
+--------------------------------------------------------------------------
|	index.inc.php
|   ========================================
|	The Homepage
+--------------------------------------------------------------------------
*/

if (!defined('CC_INI_SET')) die("Access Denied");

## Include lang file
$lang = getLang('includes'.CC_DS.'content'.CC_DS.'index.inc.php');
$langLP = getLang("includes".CC_DS."content".CC_DS."viewCat.inc.php"); 

$index = new XTemplate('content'.CC_DS.'index.tpl');
$home = getLang('home.inc.php');

$langFolder	= (defined('LANG_FOLDER') && constant('LANG_FOLDER') && $home['enabled']) ? LANG_FOLDER :  $config['defaultLang'];

$homesql	= sprintf('SELECT langArray FROM %sCubeCart_lang WHERE `identifier` = %s', $glob['dbprefix'], $db->mySQLsafe(CC_DS.preg_replace('/[^a-zA-Z0-9_\-\+]/', '', $langFolder).CC_DS.'home.inc.php'));
$result		= $db->select($homesql);

if ($result) {
	$home	= unserialize($result[0]['langArray']);
} else {
	require 'language'.CC_DS. $config['defaultLang'].CC_DS.'home.inc.php';
}

if (!empty($home['title']) || !empty($home['copy'])) {
	if ($config['seftags']) {
		$meta['sefSiteTitle']		= $home['doc_metatitle'];
		$meta['sefSiteDesc']		= $home['doc_metadesc'];
		$meta['sefSiteKeywords']	= $home['doc_metakeywords'];
	}
	$index->assign('HOME_TITLE', validHTML(stripslashes($home['title'])));
	$index->assign('HOME_CONTENT', stripslashes($home['copy']));
	$index->parse('index.welcome_note');
}


/*$cache = new cache('content.LatestProds');
$latestProducts = $cache->readCache();

if (!$cache->cacheStatus) {
	$latestProducts = $db->select("SELECT I.productId, I.description, I.image, I.price, I.name, I.sale_price FROM ".$glob['dbprefix']."CubeCart_inventory AS I, ".$glob['dbprefix']."CubeCart_category AS C WHERE C.cat_id = I.cat_id AND I.disabled != '1' AND I.showFeatured = '1' AND I.cat_id > 0 AND C.hide != '1' ORDER BY I.productId DESC LIMIT ".$config['noLatestProds']);
	$cache->writeCache($latestProducts);
}
*/

// Start Randomizing the latest products 

// AND I.stock_level > 0 has been added to the query to keep out of stock products away from the latest products

$index->parse('index.table');

    $latestProducts = $db->select("SELECT I.productId, I.productCode, I.useStockLevel, I.stock_level, I.description, I.image, I.price, I.name, I.sale_price, I.WSL FROM ".$glob['dbprefix']."CubeCart_inventory AS I, ".$glob['dbprefix']."CubeCart_category AS C WHERE C.cat_id = I.cat_id AND I.disabled != '1' AND I.showFeatured = '1' AND I.cat_id > 0 AND C.hide != '1' AND I.stock_level > 0 ORDER BY RAND(".$seed.") DESC LIMIT ".$config['noLatestProds']);

// End Randomizing the latest products


if ($config['showLatestProds'] && $latestProducts) {
	for ($i = 0, $maxi = count($latestProducts); $i < $maxi; ++$i) {
	
		if (($val = prodAltLang($latestProducts[$i]['productId'])) !== false) {
			$latestProducts[$i]['name'] = $val['name'];
		}
		$thumbRootPath	= imgPath($latestProducts[$i]['image'], true, 'root');
		$thumbRelPath	= imgPath($latestProducts[$i]['image'], true, 'rel');
	
		if (file_exists($thumbRootPath) && !empty($latestProducts[$i]['image'])) {
			$index->assign('VAL_IMG_SRC', $thumbRelPath);
		} else {
			$index->assign('VAL_IMG_SRC',$GLOBALS['rootRel'].'skins/'. SKIN_FOLDER . '/styleImages/thumb_nophoto.gif');
		}

		if (!salePrice($latestProducts[$i]['price'], $latestProducts[$i]['sale_price']) || !$config['saleMode']) {
			$index->assign('TXT_PRICE', priceFormat($latestProducts[$i]['price'], true));
		} else {
			$index->assign('TXT_PRICE', "<span class='txtOldPrice'>".priceFormat($latestProducts[$i]['price'], true)."</span>");
		}

		$salePrice = salePrice($latestProducts[$i]['price'], $latestProducts[$i]['sale_price']);

		$index->assign('TXT_SALE_PRICE', priceFormat($salePrice, true));

		$index->assign('VAL_PRODUCT_ID', $latestProducts[$i]['productId']);
		$index->assign('VAL_PRODUCT_NAME', validHTML($latestProducts[$i]['name']));
		$index->assign('VAL_PRODUCT_CODE', validHTML($latestProducts[$i]['productCode']));
		// MOD to add LATEST PRODUCTS descriptions - BEGIN
		if (strlen($latestProducts[$i]['description']) > $config['productPrecis']) {
		$index->assign("TXT_DESC", substr($latestProducts[$i]['description'], 0, $config['productPrecis'])."&hellip;");
		} else {
		$index->assign("TXT_DESC", $latestProducts[$i]['description']);
		}
		// MOD to add LATEST PRODUCTS descriptions - END
		
		
		if ($latestProducts[$i]['useStockLevel'] == 2) {

		$index->assign('BTN_BUY_CLASS', 'add_button_display_none');
		$index->parse("index.latest_prods.repeat_prods.buy_btn");
		
		}
		
		else {
		
		if ($config['outofstockPurchase'] == true) {
		$index->assign('BTN_BUY_CLASS', 'add_button');
		$index->assign("BTN_BUY", $langLP['viewCat']['buy']);
		$index->assign("VAL_PRODUCT_ID", $latestProducts[$i]['productId']);
		$index->parse("index.latest_prods.repeat_prods.buy_btn");

		} 
		
		else if ($latestProducts[$i]['useStockLevel'] == true && $latestProducts[$i]['stock_level']>0) {
		$index->assign("BTN_BUY", $langLP['viewCat']['buy']);
		$index->assign('BTN_BUY_CLASS', 'add_button');
		$index->assign("VAL_PRODUCT_ID", $latestProducts[$i]['productId']);
		$index->parse("index.latest_prods.repeat_prods.buy_btn");

		} 
		
		else if ($latestProducts[$i]['useStockLevel'] == false) {
		$index->assign('BTN_BUY_CLASS', 'add_button');
		$index->assign("BTN_BUY", $langLP['viewCat']['buy']);
		$index->assign("VAL_PRODUCT_ID", $latestProducts[$i]['productId']);	
		$index->parse("index.latest_prods.repeat_prods.buy_btn");
		
		}
	}
	
		$index->assign("BTN_MORE", $langLP['viewCat']['more']);
		
		$index->parse('index.latest_prods.repeat_prods');
	
	}
	$index->assign('LANG_LATEST_PRODUCTS',$lang['index']['latest_products']);
	$index->parse('index.latest_prods');
	

}		

$index->parse('index');
$page_content = $index->text('index');

?>