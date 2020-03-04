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


    <div class="navbar">
        <a href="index.php?navigation=product">Products</a>
        <a href="index.php?navigation=categories">Category</a>
        <a href="index.php?navigation=create">Create</a>
    </div>
	<h1> Update Product </h1>
<form action="pro_update.php?id=<?php echo $id ?>" method="POST">
	<input type="text" name="name" value="<?php echo $result['name'];?>"/>
	<input type="text" name="description" value="<?php echo $result['description']; ?>"/>
	<input type="text" name="price" value="<?php echo $result['price']; ?>"/>
	<select name="category">
	<option value="<?php echo $result['category_id'];?>"><?php echo $result['category_name'];?></option>
		<?php
		foreach($category as $cview){
		?>
			<option value="<?php echo $cview['id']?>"><?php echo $cview['name']?></option>
		<?php
		}
		?>
		</select>
	<input type="submit" name="submit" value="submit"/>

</form>

</html>
