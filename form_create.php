<?php
	$module = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';
	
	$json = file_get_contents('http://rdapi.herokuapp.com/category/read.php');
	$data = json_decode($json,true);
	$category = $data['records'];
?>
 <link rel="stylesheet" type="text/css" href="css/style.php">

<div class="form">	
	<form action="pro_create.php" method="POST">
	<h1 style="color:#fff;"> Create Product </h1><br>
	<h3>Name</h3>
	<input class="inputs" type="text" name="name" placeholder="Enter name..."/><br><br>
	<h3>Description</h3>
	<input class="inputs" type="text" name="description" placeholder="Enter description.."/><br><br>
	<h3> Price</h3>
	<input class="inputs" type="text" name="price" placeholder="Enter price..."/><br><br>
	<h3> Category</h3>
	<select class="inputs" name="category"><br><br>
	<option value="">--Pick Category--</option>
		<?php
		foreach($category as $cview){
		?>
			<option value="<?php echo $cview['id']?>"><?php echo $cview['name']?></option>
		<?php
		}
		?>
		</select><br><br><br>
	<input class="addbtn" type="submit" name="submit" value="SUBMIT"/>

	</form>
</div>