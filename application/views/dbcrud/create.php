<h1> DBCRUD Create </h1>

<a href="<?=base_url()?>DBController/index">Back</a>
<hr/>

<form action="insert" method="post">
	<label for="product">Product</label>
	<input id="product" type="text" name="product" /><br/>
	<label for="price">Price</label>
	<input id="price" type="text" name="price" /><br/>
	<label for="quantity">Quantity</label>
	<input id="quantity" type="text" name="quantity" /><br/>
	<input type="submit" value="Submit"/>
</form>