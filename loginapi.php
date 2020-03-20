<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="410146654780-dfpjcnbrs7vpqkm62hs14l7bhtglj9gc.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=673026740130754&autoLogAppEvents=1">
			</script>
			<?php
			
			$fb = new Facebook\Facebook([
			 'app_id' => '673026740130754',
			 'app_secret' => 'e6a27119004c6d70eed71ac7f59c8b4b',
			 'default_graph_version' => 'v2.10',
			]);
			$helper = $fb->getRedirectLoginHelper();
			$permissions = ['email']; // optional
			
			try {
				
			if (isset($_SESSION['facebook_access_token'])) {
				header('Location: https://apiact.herokuapp.com/index.php');
			
			} else {
			  $accessToken = $helper->getAccessToken();
			  $oAuth2Client = $fb->getOAuth2Client();
			}
			} catch(Facebook\Exceptions\facebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}
			if (isset($accessToken)) {
				header('Location: : https://apiact.herokuapp.com/index.php');
				
			if (isset($_SESSION['facebook_access_token'])) {
				
			$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			} else {
			// getting short-lived access token
			$_SESSION['facebook_access_token'] = (string) $accessToken;
			  // OAuth 2.0 client handler
			$oAuth2Client = $fb->getOAuth2Client();
			// Exchanges a short-lived access token for a long-lived one
			$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
			$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
			// setting default access token to be used in script
			$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			}
			// redirect the user to the profile page if it has "code" GET variable
			if (isset($_GET['code'])) {
			header('Location: https://apiact.herokuapp.com/index.php');
			}
			// getting basic info about user
			try {
			header('Location: https://app-puaenerlan.herokuapp.com/?p=table');
			$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
			$requestPicture = $fb->get('/me/picture?redirect=false&height=200'); //getting user picture
			$picture = $requestPicture->getGraphUser();
			$profile = $profile_request->getGraphUser();
			$fbid = $profile->getProperty('id');           // To Get Facebook ID
			$fbfullname = $profile->getProperty('name');   // To Get Facebook full name
			$fbemail = $profile->getProperty('email');    //  To Get Facebook email
			$fbpic = "<img src='".$picture['url']."' class='img-rounded'/>";
			# save the user nformation in session variable
			$_SESSION['fb_id'] = $fbid.'</br>';
			$_SESSION['fb_name'] = $fbfullname.'</br>';
			$_SESSION['fb_email'] = $fbemail.'</br>';
			$_SESSION['fb_pic'] = $fbpic.'</br>';
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			// redirecting user back to app login page
			header("Location: ./");
			exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
			}
			} else {
			// replace your website URL same as added in the developers.Facebook.com/apps e.g. if you used http instead of https and you used            
			$loginUrl = $helper->getLoginUrl('https://apiact.herokuapp.com/index.php', $permissions);
			echo '<a href="' . $loginUrl . '"><div class="fb-login-button" data-width="" data-size="large" data-button-type="login_with" data-layout="default" data-auto-logout-link="true" data-use-continue-as="true"></div></a>';
			}
			?>
			<br>
			<br>
			<div id="my-signin2" data-onsuccess="onSuccess" data-redirecturi="https://iceinventory.000webhostapp.com/?p=admin"></div>
			<script>
    function onSuccess(googleUser) {
        window.location="https://apiact.herokuapp.com/index.php";
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 230,
        'height': 40,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
  </script>

  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
<script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      }
    </script>
  </body>
</html>
