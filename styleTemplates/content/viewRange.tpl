<!-- BEGIN: products -->

<div class="breadcrumb">
<h1><a href="{HOME_HREF}">HOME</a><span class="forward_slash"><strong>/</strong></span><a href="{CURRENT_URL}">{RANGE_NAME}</a><h1></div>

<div class="range_products">

{PAGINATION}

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

			<form name="prod{ID}" method="post" action="{CURRENT_URL}">
			<input type="hidden" value="{ID}" name="add"/>
			<input type="hidden" value="1" name="quan"/>
			<input type="hidden" value="{RANGE_ID}" name="rangeId"/>
			
			<a class="range_products_add_to_basket" target="_self" href="javascript:submitDoc('prod{ID}');">
			Add to basket
			</a>

			</form>


			</li>

			<li>
			<a href="{HREF}" class="range_products_link"><img src="{IMAGE}" alt="{IMAGE}"></a>
			</li>


		</ul>

	</li>
	<!-- END: product_loop -->

<ul>

{PAGINATION}

</div>
<!-- END: products -->