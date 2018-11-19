<?php 
session_start();
require_once 'Facebook/autoload.php';
$fb = new \Facebook\Facebook([
  'app_id' => '1160202704127286',
  'app_secret' => 'a4451d8de8a3c43b4d2f8f90982649f1',
  'default_graph_version' => 'v3.2',
]);
   $permissions = []; // optional
   $helper = $fb->getRedirectLoginHelper();
   // $accessToken = $helper->getAccessToken();
   $accessToken = $_SESSION['fb_access_token'];
if (isset($accessToken)) {
	
 		// $url = "https://graph.facebook.com/v2.6/me?fields=id,name,gender,email,picture,location,cover&access_token={$accessToken}";
		
		$url = "https://graph.facebook.com/v3.2/me?fields=id,name,email,location&access_token={$accessToken}";
		$headers = array("Content-type: application/json");
		
			 
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		 curl_setopt($ch, CURLOPT_URL, $url);
	         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		 curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');  
		 curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');  
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		 curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3"); 
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		   
		 $st=curl_exec($ch); 
		 $result=json_decode($st,TRUE);

		 header('Location: https://www.mindlogicsinc.com/faceapp/main-form.php');
		 
		
} else {
	$loginUrl = $helper->getLoginUrl('https://www.mindlogicsinc.com/faceapp/validate.php', $permissions);
	// echo '<a href="' . $loginUrl . '">Login with Facebook</a>';
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Wedding Countdown</title>
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

</head>

<body>
	<style type="text/css">
	.main-div{
		background: url(images/intro-bg.png);
		background-repeat: no-repeat;
				width: 530px;
				height: 485px;
		/*margin: 0 auto;*/
		    padding-top: 40px;
    padding-bottom: 40px;

		/*background-position: 0 50%;*/
	}
		.heading-logo h1{
			text-transform: uppercase;
			color: #033649;
			padding-left: 10%;
			font-family: 'Lato', sans-serif;
			    font-weight: 800;
			        letter-spacing: 2px;
			        font-size: 38px;
		}
		.heading-logo h1 img{
			position: relative;
			position: relative;
    left: 8px;
		}
		.inner-texts {
			padding-left: 10%;
			color: #033649;
			padding-left: 10%;
			font-family: 'Lato', sans-serif;
			padding-top: 45px;
		}
		.inner-texts h3{
			margin-bottom: 0px;
			    font-size: 25px;
		}
		.inner-texts p{
			margin-top: 0px;
			font-size: 17px;
			font-weight: bold;
		}
		.inner-texts p:nth-of-type(2){
			padding-top: 45px;
		}
		.button-secure{
			display: block;width: 100%;
			padding-top: 25px;
			padding-bottom: 44px;
		}
		.button-secure .button-main a{
			       background: #033649;
    color: #fff;
    padding: 12px 50px 12px 50px;
    text-decoration: none;
        border-radius: 2px;
		}
		.button-secure .button-main{
			width: 50%;
			float: left;
		}
		.button-secure .secure-main{
			float: right;
    width: 50%;
    margin-top: -25px;
		}
		.button-secure .secure-main img{
			    float: right;
    margin-right: 30px;
		}
	</style>

<div class="main-div">
	<div class="heading-logo">
		<h1>Welcome To <img src="https://www.mindlogicsinc.com/faceapp/images/intro-logo.png">
</h1>	</div>
	<div class="inner-texts">
		<h3>Wedding Countdown</h3>
		<p>Create your own wedding countdown</p>
		<p>Under 1 Minute! No registration needed!<br>
			Already <span class="count">38,957</span> couples tried the app
		</p>
		<div class="button-secure">
			<div class="button-main"><a href="<?php echo $loginUrl; ?>" target="_top"> Try Now</a></div>
			<div class="secure-main"><img src="https://www.mindlogicsinc.com/faceapp/images/intro-icon-text.png"  /> </div>
		</div>
	</div>
</div>

</body>

</html>