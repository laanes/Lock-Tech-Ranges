	<!-- BEGIN: body -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Content-Type" content="text/html; charset={VAL_ISO}" />
<title>{META_TITLE}</title>
<meta name="description" content="{META_DESC}" />
<meta name="keywords" content="{META_KEYWORDS}" />

<link href="skins/{VAL_SKIN}/styleSheets/layout.css" rel="stylesheet" type="text/css" />
<link href="modules/3rdparty/STP_Slideshow/css/flexslider.css" rel="stylesheet" type="text/css" />
<!-- start Advanced DHTML Menu by convict (c)2007-2008 http://cubecart-mods-skins.com -->
<!--[if gte IE 8]><link rel="stylesheet" type="text/css" href="skins/{VAL_SKIN}/styleSheets/ie8-and-up.css" /><![endif]-->
<!--[if IE 7]><link href="skins/{VAL_SKIN}/styleSheets/IE7.css" rel="stylesheet" type="text/css" /><![endif]-->
<!--[if IE 6]><link href="skins/{VAL_SKIN}/styleSheets/IE6.css" rel="stylesheet" type="text/css" /><![endif]-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
{RESOLUTION_CHECK}
<script type="text/javascript" src="js/jQuery/jquery.url.js"></script>
<script type="text/javascript" src="js/jQuery/basketEffect.js"></script>
<script type="text/javascript" src="js/jQuery/jQueryEffects.js"></script>
<script type="text/javascript" src="modules/3rdparty/Advanced_Product_Filtering/js/advanced_filtering/jquery_advanced_filtering.js"></script>

<script type="text/javascript" src="modules/3rdparty/Homepage_Categories/js/homepage_categories_interaction.js"></script>
<script type="text/javascript" src="js/jQuery/jQueryRotate.2.1.js"></script>
<script type="text/javascript">
$.noConflict();
</script>

<script type="text/javascript" src="js/jslibrary.js"></script>
<script type="text/javascript" src="js/lightbox.js"></script>

<script type="text/javascript" src="js/prototype.js,jslibrary.js,.free_standard_delivery_info.js,effects.js,builder.js"></script>
<script type="text/javascript"> var RecaptchaOptions = { theme : 'white' }; </script>

<link rel="alternate" type="application/rss+xml" title="Swansea Timber RSS feed" href="http://www.swanseatimber.co.uk/shop/rss2.php?sale&random=1" /> 
<link rel="alternate" type="application/rss+xml" title="Swansea Timber 40 latest Sale Items" href="http://www.swanseatimber.co.uk/shop/rss2.php?sale&limit=40&random=1" /> 
<link rel="alternate" type="application/rss+xml" title="Swansea Timber 1000 latest Sale Items" href="http://www.swanseatimber.co.uk/shop/rss2.php?sale&limit=1000&random=1" />

<link rel="alternate" type="application/rss+xml" title="Swansea Timber Popular Products" href="http://www.swanseatimber.co.uk/shop/rss2.php?popular&limit=50" /> 


<!-- {SLIDES_JS} -->

</head>

<body>
<div class="preloader"><p>Please wait..</p></div>
	
<div class="topHeaderWrapper">
	
	<div id="topHeader" onclick="location.href='http://www.lock-tech.co.uk/shop';" style="cursor:pointer;"></div>
	
	{SESSION2}
	
	<div class="topNavigation">
		<form class="searchform" align="center "method="get" action="http://www.lock-tech.co.uk/shop/index.php">
		<input class="searchfield" value="" onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}" type="text" name="searchStr">
		<input type="hidden" value="viewCat" name="_a">
		<input class="searchbutton" type="submit" value="Search" class="searchBtn" name="Submit">
		</form>

	</div>

</div>
	
<div id="pageSurround">
  <div>
<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td width="190" valign="top">
  <div class="colLeft">
  	{INFO_LINKS}
	{FILTER_BOX}
	{RANGES}
<!-- 	{CATEGORIES} -->
<!-- 	{PRODUCT_BRANDS} -->
<!-- 	{MENU1} -->
<!-- 	{MENU2} -->
<!-- 	{MENU3} -->
<!-- 	{MENU4} -->
<!-- 	{MENU5} -->
<!-- 	{MENU6} -->

<!-- {RANDOM_PROD} -->
<!--     {POPULAR_PRODUCTS}  -->
<!-- {LANGUAGE} -->
		</div>
  		</td>
		<td valign="top">

  <div class="colMid">
  	{ADDED_ITEMS}
	{HOMEPAGE_CATEGORIES}
	{PAGE_CONTENT}  


	</div>
		</td>
		<td width="190" valign="top">
  <div class="colRight">
  <div class="boxContentRight">

		{SHOPPING_CART}
		{DELIVERY_INFO_BOX}

 </div>
 </div>

  		</td>
	</tr>
</table>
</div>

<br clear="all" />

<!-- {SKIN} -->

</div>
<!-- {DEBUG_INFO} -->

<!-- {FACEBOOK} -->
{MAIL_LIST}
{SITE_DOCS}


</div>
</body>
</html>
<!-- END: body -->