<?php 
$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page']: '';
include('google_config/google_read.php');
if($login_button == true){
	include('facebook_config/facebook_read.php');
}
?>
<html> 
    <head>
      <title>Endterm Exam</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>
				<?php
						if($login_button == '')
						{
							switch($page){
								case 'home':
									require_once('home.php');
									break;
								case 'login':
									require_once('login.php');
								break;
								default:
									require_once('home.php');
									break;
							}
						}else{
          		if(isset($facebook_login_url)){
								echo $login_button;	  
	  					}else{
	  					}
        		}
				?>
				<br>
				OR
				<br><br>
				<?php
				if(isset($facebook_login_url)){
							 echo $facebook_login_url;
				}else{
					switch($page){
								case 'home':
									require_once('home.php');
									break;
								case 'login':
									require_once('login.php');
								break;
								default:
									require_once('home.php');
									break;
							}
					}
				?>
			</div>
	    <br><br>
	SIGN IN WITH
	</marquee>
    </body>
	<div id="dropDownSelect1"></div>
	<script src="js/main.js"></script>
</html>
