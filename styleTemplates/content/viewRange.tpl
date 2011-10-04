BEGIN: products -->

<div class="breadcrumb">
<h1><a href="{HOME_HREF}">HOME</a><span class="forward_slash"><strong>/</strong></span><a href="{RANGE_HREF}">{RANGE_NAME}</a><h1></div>

<div class="range_products">
<ul>
	<!-- BEGIN: product_loop -->
<li>

		<ul>

			<li>

			<li><a href="{HREF}"
			class="range_products_link"><p class="range_products_name">{NAME}</p>
			</a></li>

			<li><p class="range_products_price">Price: {PRICE}</p></li>

			<li><p class="range_products_stock_level">{STOCK}</p></li>
<!-- 
			<li><p class="range_products_category">Category: 
			<?php $range_products->cat_name[$i]; ?>
			</p></li> -->

<!-- 			<li><a class="range_products_add_to_basket" target="_self" href="javascript:submitDoc('prod{ID}');">Add to basket</a></li> -->

			<form name="prod{ID}" method="post" action="{RANGE_HREF}">
			<input type="hidden" value="{ID}" name="add">
			<input type="hidden" value="1" name="quan">
			<a class="range_products_add_to_basket" target="_self" href="javascript:submitDoc('prod{ID}');">
			Add to basket
			</a>


			</li>

			<li>
			<a href="{HREF}" class="range_products_link"><img src="{IMAGE}" alt="{IMAGE}"></a>
			</li>


		</ul>

	</li>
	<!-- END: product_loop -->
<ul>
</div>
<!-- END: products