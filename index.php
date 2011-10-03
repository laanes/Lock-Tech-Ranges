<?php 

require_once('classes/lock_tech_ranges.class.local.php');

$range_products = new Lock_Tech_Ranges(1);

// var_dump($range_products);



?>

<html>

<style type="text/css">

.range_products ul {
     margin: 0pt;
     	 
     


}

.range_products ul li {
     list-style: none outside none;
     padding: 0;
     display: inline;

}

.range_products ul li ul {
     border: 1px solid;
     float: left;
     height: 200px;
     width: 33%;
     margin: 0;
     padding: 0;
     

}

.range_products_price {
	
font-size: 30px;
color: #666;

}

.range_products img {
	
max-height: 180px;


}


</style>

<body>

<div class="range_products">
<ul>
	
	<?php for($i=0; $i<=$range_products->productCount-1; $i++) { ?>

	<?php $image_path = $range_products->image_paths[$i]; ?>

	<li>

		<ul>

			<li><?php echo $range_products->products[$i]['name']; ?></li>
			<li class="range_products_price"><?php echo $range_products->products[$i]['price']; ?></li>
			<li><img src="<?php echo $image_path; ?>" alt="<?php echo $image_path; ?>"></li>

		</ul>

	</li>

	<?php } ?>

</ul>

</div>

</body>

</html>