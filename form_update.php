<?php
    $module = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';

	$id = $_GET['id'];
	$json = file_get_contents('http://rdapi.herokuapp.com/product/read_one.php?id='.$id);
	$data = json_decode($json,true);
	$details = array('records' => $data);
	$result = $details['records'];
	//category
	$json2 = file_get_contents('http://rdapi.herokuapp.com/category/read.php');
	$data2 = json_decode($json2,true);
	$category = $data2['records'];
?>
<html> 
    <head>  
      <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
<div class="form">	
	<h1 style="color:#fff;"> Update Product </h1><br>
<form action="pro_update.php?id=<?php echo $id ?>" method="POST">
	<h3>Name</h3>
	<input class="inputs" type="text" name="name" value="<?php echo $result['name'];?>"/><br><br>
	<h3>Description</h3>
	<input class="inputs" type="text" name="description" value="<?php echo $result['description']; ?>"/><br><br>
	<h3>Price</h3>
	<input class="inputs" type="text" name="price" value="<?php echo $result['price']; ?>"/><br><br>
	<h3>Category</h3>
	<select class="inputs" name="category"><br><br>
	<option value="<?php echo $result['category_id'];?>"><?php echo $result['category_name'];?></option>
		<?php
		foreach($category as $cview){
		?>
			<option value="<?php echo $cview['id']?>"><?php echo $cview['name']?></option>
		<?php
		}
		?>
		</select><br><br>
	<input class="addbtn" type="submit" name="submit" value="submit"/>

</form>

</html>
