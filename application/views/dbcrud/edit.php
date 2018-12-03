<h1> DBCRUD Edit </h1>

<a href="<?=base_url()?>DBController/index">Back</a>
<hr/>

<form action="/ci_zoombie/index.php/DBController/update" method="post">
	<input type="hidden" name="id" value="<?=$products['id']?>"/>
	<label for="product">Product</label>
	<input id="productname" type="text" name="product" value="<?=$products['product']?>"/><br/>
	<label for="price">Price</label>
	<input id="price" type="text" name="price" value="<?=$products['price']?>"/><br/>
	<label for="quantity">Quantity</label>
	<input id="quantity" type="text" name="quantity" value="<?=$products['quantity']?>"/><br/>
	<input type="submit" value="Update"/>
</form>