<h1> DBCRUD search </h1>

<a href="<?=base_url()?>DBController/index">Back</a>
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