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
      <link rel="stylesheet" type="text/css" href="css/css/style.php">
    </head>

	<nav>
<ul class="primary">
		<li>
      <a href="index.php">Home</a>
    </li>
    <li>
      <a href="">Products</a>
      <ul class="sub">
				<li><a href='index.php?mod=Prod'>Product List</a></li>
				<li><a href='index.php?mod=FCrt'>Add Product</a></li>
      </ul>
    </li>
    <li>
      <a href="">Categories</a>
      <ul class="sub">
				<li><a href='index.php?mod=Cat'>Category List</a></li>
      </ul>
    </li>
  </ul>
</nav>
<div class="form">	
	<h1 style="color:#fff;"> Update Product </h1>
<form action="pro_update.php?id=<?php echo $id ?>" method="POST">
	<input class="inputs" type="text" name="name" value="<?php echo $result['name'];?>"/>
	<input class="inputs" type="text" name="description" value="<?php echo $result['description']; ?>"/>
	<input class="inputs" type="text" name="price" value="<?php echo $result['price']; ?>"/>
	<select class="inputs" name="category">
	<option value="<?php echo $result['category_id'];?>"><?php echo $result['category_name'];?></option>
		<?php
		foreach($category as $cview){
		?>
			<option value="<?php echo $cview['id']?>"><?php echo $cview['name']?></option>
		<?php
		}
		?>
		</select>
	<input class="addbtn" type="submit" name="submit" value="submit"/>

</form>

</html>
