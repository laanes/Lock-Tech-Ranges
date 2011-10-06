<?php 
require_once('classes/lock_tech_ranges.controller.local.php');


// var_dump($range_products);



?>

<html>

<style type="text/css">

.range_products ul {
     margin: 0pt;
}

.range_products ul li {
     display: inline;
     list-style: none outside none;
     padding: 0pt;
}

.range_products ul li ul {
     float: left;
     height: 200px;
     margin: 0 2% 2% 2%;
     padding: 0pt;
     position: relative;
     width: 27%;
}

.range_products img {
     left: 0pt;
     max-height: 85%;
     max-width: 100%;
     position: absolute;
     top: 14%;
}

.range_products_name {
     font-size: 10px;
     left: 2%;
     position: absolute;
     top: -2%;
}

.leftBox {
     float: left;
     height: 100%;
     width: 234px;
}

.rightBox {
     float: right;
     height: 100%;
     width: 234px;
}

.range_products_price, .range_products_stock_level, .range_products_category, .range_products_add_to_basket {
     background: none repeat scroll 0% 0% #FFFFFF;
     height: 20px;
     padding: 0pt 4px;
     position: absolute;
     right: 4%;
     top: 5%;
     z-index: 1;
}

.range_products_stock_level {
     top: 18%;
}

.range_products_category {
     top: 30%;
}

.range_products_stock_level {
     top: 18%;
}

.range_products_add_to_basket {
     background: none repeat scroll 0% 0% #F2F2F2;
     color: #666666;
     padding: 2%;
     top: 78%;
}


.breadcrumb a {
     color: #4183C4;
     font-size: 20px;
}

.forward_slash {
     font-size: 16px;
     padding: 8px;
     font-family: verdana;
} 	


</style>

<body>

<div class="breadcrumb">
<h1><a href="http://lock-tech.co.uk/shop">HOME</a><span class="forward_slash"><strong>/</strong></span><a href="<?php echo $_SERVER['PHP_SELF']; ?>"><?php echo $range_products->range_name; ?></a><h1>
</div>

<div class="leftBox"></div>

<div> 



</div>

<div class="range_products">
<ul>
	
	<?php for($i=0; $i<=$range_products->productCount-1; $i++) { ?>

	<?php 

	$image_path = $range_products->image_paths[$i];
	$productId = $range_products->products[$i]['productId'];

	?>

	<li>

		<ul>

			<li>

			<li>
			<a href="<?php echo $range_products->product_links[$i]; ?>"
			class="range_products_link"><p class="range_products_name">
			<?php echo $range_products->products[$i]['name']; ?>
			</p>
			</a>
			</li>


			<li><p class="range_products_price">Price: 
			<?php echo $range_products->products[$i]['price']; ?>
			</p></li>

			<li><p class="range_products_stock_level"> 
			<?php echo $range_products->stock_levels[$i]; ?>
			</p></li>
<!-- 
			<li><p class="range_products_category">Category: 
			<?php $range_products->cat_name[$i]; ?>
			</p></li> -->

			<li><a class="range_products_add_to_basket" target="_self" href="javascript:submitDoc('prod<?php echo $productId; ?>');">Add to basket</a></li>

<form name="prod3985919" method="post" action="/shop/index.php?_a=viewCat&amp;catId=2118208">
<input type="hidden" value="3985919" name="add">
<input type="hidden" value="1" name="quan"><a class="txtButton" target="_self" href="javascript:submitDoc('prod3985919');">Add to basket</a>


			</li>

			<li>
			<a 
			href="<?php echo $range_products->product_links[$i]; ?>" 
			class="range_products_link">
			<img 
			src="<?php echo $image_path; ?>" 
			alt="<?php echo $image_path; ?>">
			</a>
			</li>


		</ul>

	</li>

	<?php } ?>

</ul>

</div>

<div class="rightBox"></div>

</body>

</html>