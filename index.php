<?php 
$module = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod']: '';

  include('google/google-confirm.php');
  if($login_button == true){
    include('facebook/facebook-confirm.php');
  }
?>


<html> 
    <head> 
      <title>API Endterm Exam</title>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Fira+Sans|Mukta&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      
    </head> 
    <body> 
    
<nav>
  <ul class="primary">
		<li>
      <a href="index.php">Home</a>
    </li>
    <li>
    <a href="index.php?mod=product">Products</a>
    </li>
    <li>
    <a href="index.php?mod=categories">Category</a>
    </li>
  </ul>
</nav>


        <?php 
        if($login_button == ''){
          switch($module){
            case 'product':
              require_once 'product.php';
              break;
            case 'categories':
              require_once 'categories.php';
              break;
            case 'create':
              require_once 'form_create.php';
              break;
            case 'details':
              require_once 'product_details.php';
              break;
            case 'update':
              require_once 'form_update.php';
              break;
            default:
              require_once 'home.php';
              break;
          }
        }else{
          echo '<div align="center">'.$login_button . '</div>';
        }

        ?>
        <br>
        <?php //facebook
            if(isset($facebook_login_url)){
            echo '<div align="center">' .$facebook_login_url. '</div>';
            }else{
              switch($navigation){
                case 'product':
                  require_once 'product.php';
                  break;
                case 'categories':
                  require_once 'categories.php';
                  break;
                case 'create':
                  require_once 'form_create.php';
                  break;
                case 'details':
                  require_once 'product_details.php';
                  break;
                case 'update':
                  require_once 'form_update.php';
                  break;
                default:
                  require_once 'home.php';
                  break;
              }
            }
          
        ?>
    </body>
</html>
