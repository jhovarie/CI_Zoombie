<h1> DBCRUD index </h1>

<form action="<?=base_url()?>DBController/search" method="post">
	<input type="text" name="keyword" />
	<input type="submit" value="Search"/>
</form>

<a href="<?=base_url()?>/DBController/create">Add New Product</a>
<hr/>

<?php
foreach ($products as $row){
	echo '<a href="'.base_url().'/DBController/edit/'.$row->id.'">Update </a>';
	echo $row->id.' '.$row->product.' '.$row->price.' '.$row->quantity;
	echo '<a href="'.base_url().'/DBController/delete/'.$row->id.'"> DELETE </a>';
	echo '<br/>';
}
echo "<br/>";
echo $this->pagination->create_links();

?>