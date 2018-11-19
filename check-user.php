<?php 

session_start();
require_once 'Facebook/autoload.php';
require_once 'connection.php';
$fb = new \Facebook\Facebook([
  'app_id' => '1160202704127286',
  'app_secret' => 'a4451d8de8a3c43b4d2f8f90982649f1',
  'default_graph_version' => 'v2.10',
]);
   $permissions = []; 
   $helper = $fb->getRedirectLoginHelper();
   $accessToken = $_SESSION['fb_access_token'];
   
if (isset($accessToken)) {
		
		$url = "https://graph.facebook.com/v2.6/me?fields=id,name,email,location&access_token={$accessToken}";
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
		 // $user_email = $result['email']; user email is not being fetched at frontend
		 
$user_id = $result['id'];

if(isset($_POST['check-user'])){
$query = mysqli_query($conn, "SELECT * FROM users WHERE user_id='".$user_id."'");

    if (!$query)
    {
        echo "error in query";
    }

if(mysqli_num_rows($query) > 0){

    echo "Yes";

}else{
	echo "No";
}
}

}