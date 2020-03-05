<?php
$module = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';
?>
<html>
<head>
	<title> API Exercise </title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

  <div id="container">
      <?php
      switch ($module) {
        case 'Prod':
          require_once 'product.php';
        break;
        case 'Cat':
          require_once 'categories.php';
        break;
        case 'FCrt':
          require_once 'form_create.php';
        break;
        case 'PDtls':
          require_once 'product-details.php';
        break;     
        }
          ?>
  </div>
