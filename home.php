<?php
$mod = (isset($_GET['page'])&& $_GET['page'] !='')? $_GET['page'] : '';

include('google_config/google_read.php');
if($login_button == true){
    include('facebook_config/facebook_read.php');
?>


<html>
<head>
	<title> API Exam </title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<nav>
<ul class="primary">
    <li>
      <a href="">Products</a>
      <ul class="sub">
				<li><a href='index.php?mod=Prod'>Product List</a></li>
      </ul>
    </li>
    <li>
      <a href="">Categories</a>
      <ul class="sub">
				<li><a href='index.php?mod=Cat'>Category List</a></li>
      </ul>
    </li>
	<li>
	<a href="google_logout.php" onClick="location.href='facebook_logout.php'">Logout</a>
    </li>
  </ul>
</nav>
	</body>
</html>
