<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Wedding Countdown</title>
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
<!-- <link href="https://fonts.googleapis.com/css?family=Marck+Script" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script src="https://www.mindlogicsinc.com/faceapp/js/jquery.countdown.js"></script>
<script>
// plugin used for countdown
	// http://hilios.github.io/jQuery.countdown/
	$(document).ready(function(){
	var user_fid;	
$.ajax({
   url : 'wedding-date.php', // your php file
   type : 'GET', // type of the HTTP request
   success : function(data){
      var obj = jQuery.parseJSON(data);
      var user_data = obj[0];
      console.log(user_data);
      var count_final_date = user_data['wedding-year']+"/"+user_data['wedding-month']+"/"+user_data['wedding-date']+" "+ user_data['wedding-hour'] +":"+user_data['wedding-minute'];
      // console.log(count_final_date);
    
    
     $('#countdown-div').countdown(count_final_date, function(event) {
  var years = $('#years').html(event.strftime('%Y'));
  var total_months = event.strftime('%m');
  var months = (total_months % 12); // months were comming as and years were also comming
  months = months < 9 ? '0'+ months : months; // to use 0 before on digit months
  // console.log(months);
  // console.log(event.strftime('%n'));

  $('#months').html(months);
  $('#days').html(event.strftime('%n'));
   $('#hours').html(event.strftime('%H'));
    $('#mins').html(event.strftime('%M'));
     $('#secs').html(event.strftime('%S'));


     // to set href of main person image in canvas of heart
       user_fid = user_data['user-id']; //this is fetching through above ajax request
       $("#person-img").attr("href","https://graph.facebook.com/v2.2/"+user_fid+"/picture?width=500&height=500");
});

// to show the username in the span 
user_name = user_data['user-name'];
$("#person-name").text(user_name);

	      // var wedding_date = obj.id + obj.wed_month + obj.wed_date + obj.wed_year;
	      // console.log(wedding_date);
   }
});

//to load background image on page load
$.ajax({
   url : 'https://www.mindlogicsinc.com/faceapp/wedding-date.php', // your php file
   type : 'POST',
   data : {'proposal-path': 'path'},  
        success: function(data) {  
            // console.log(data);
        }  
	});

	//to load ring image on page load
$.ajax({
   url : 'https://www.mindlogicsinc.com/faceapp/wedding-date.php', // your php file
   type : 'POST',
   data : {'ring-path': 'path'},  
        success: function(data) {  
           // console.log(data);
        }  
	});
});
</script>
</head>

<body>
	<style type="text/css">

	.shared-main-div{
		background: url(images/shared-page-bg.png);
		background-repeat: no-repeat;
				width: 498px;
				height: 564px;
			    /*opacity: 0.7;*/
		     


		
	}
	.shared-inner{
		   padding-top: 15px;
    padding-left: 25px;
    background: rgba(255,255,255, 0.4);
	}
	.shared-main-div .shared-names h2{
		margin-bottom: 0px;
		font-size: 28px;
		color: #033649;
		/*font-family: 'Marck Script', cursive;*/
		font-family: 'Homemade Apple', cursive;
	}
	.shared-main-div .shared-names h3{
		    margin-top: -8px;
    font-size: 22px;
    font-weight: bold;
    color: #033649;
    letter-spacing: 1px;
	}
	.shared-images{
		    display: inline-block;
    width: 72%;
    float: left;
    position: relative;
    min-height: 126px;
	}
	.shared-images div.image{
		max-width: 80px;
		float: left;
		margin-right: 25px;
	}
	.shared-images div.image img{
		max-width: 100%;
		max-height: 80px
	}
	/*.shared-images div.image:first-child{
		background: url("images/shared-page-heart.png");
	}
	.shared-images div.image:nth-of-type(2){
		background: url("images/shared-page-heart2.png");
	}*/
	.save-date{
		float: left;
		width: 100%;
		padding-top: 20px;
	}
	.save-date p{
		text-transform: uppercase;
		font-weight: normal;
		font-family: 'Lato';
		width: 44%;
    text-align: center;
        font-size: 22px;
            color: #033649db;
	}
	.counter-div{
		margin-left: -25px;
		padding-left: 25PX;
		 display: inline-block;
        width: 100%;
    background-color: #ffffff85;
        padding-top: 26px;
    padding-bottom: 21px;
    margin-top: 0px;
 /*   margin-top: 28px;*/
	}
	.counter-div .counter-left{
		float: left;
		width: 72%;
	}
	.counter-div ul{
		padding: 0;
		margin: 0;
		    margin-top: 8px;
	}
	.counter-div ul li{
		list-style: none;
		display: inline-block;
		    width: 13%;
	}
	.counter-div .counter-left p{
		text-transform: uppercase;
    font-weight: 800;
    font-family: 'Lato';
    font-size: 16px;
    color: #033649db;
	}
	.counter-div ul li span{
		   background: #0d4458;
    padding: 10px 0px;
    color: #fff;
    font-size: 20px;
    font-family: 'Lato';
    width: 45px;
    display: block;
    text-align: center;
    float: left;
	}
	.counter-div ul li p{
		font-size: 12px!important;
		font-weight: 800!important;
		text-align: center;
		margin-top: 10px;
		display: inline-block;
		width: 100%;
	}
	.counter-right{
		width: 28%;
		float: right;
		padding-top: 8px;
		text-align: center;

	}
	.counter-right p{
		font-size: 13px;
    font-weight: 800;
    font-family: 'Lato';
    color: #033649;
	}
	#heart-1{
  
  
  transform: rotate(-5deg);
    stroke: #FE4365;
    stroke-width: 2px;
    fill: red;
 
  
}
.heart-1{
	position: absolute;
    left: -21px;
    top: -22px;
}
#heart-2{
   
    position: absolute;
    right: 0;
        fill: red;
    transform: rotate(25deg);
   
  
  
}
	</style>

<div class="shared-main-div">
	<div class="shared-inner">
	<div class="shared-names">
		<h2><span id="person-name">Mike </span> and <span> Jenni</span></h2>
		<h3><i>We're getting married</i></h3>
		<div class="shared-images">
			<!-- <div class="image"> -->
			<div class="heart-1">
<svg viewBox="0 0 535 535" width="60%" >
<g>
       <clipPath  id="hexagonal-mask">
<path id="heart-1" d="M340.8,98.4c50.7,0,91.9,41.3,91.9,92.3c0,26.2-10.9,49.8-28.3,66.6L256,407.1L105,254.6c-15.8-16.6-25.6-39.1-25.6-63.9
	c0-51,41.1-92.3,91.9-92.3c38.2,0,70.9,23.4,84.8,56.8C269.8,121.9,302.6,98.4,340.8,98.4 M340.8,83C307,83,276,98.8,256" />
 </clipPath>
    </g>
 <!-- waseel fid 1981136815299954-->
     <image clip-path="url(#hexagonal-mask)" id="share-person-img"  
     href="" style=" transform:rotate(-5deg); " />
 </svg>
</div>
				<!-- <img src="images/man1.jpg" /> -->
				<!-- <img src="images/shared-page-heart.png" /> -->
			<!-- </div> -->
			<!-- <div class="image"> -->
				<div id="heart-2">
<svg viewBox="0 0 535 535" width="60%" >
<g >
       <clipPath  id="hexagonal-mask">
<path  class="heart" d="M340.8,98.4c50.7,0,91.9,41.3,91.9,92.3c0,26.2-10.9,49.8-28.3,66.6L256,407.1L105,254.6c-15.8-16.6-25.6-39.1-25.6-63.9
	c0-51,41.1-92.3,91.9-92.3c38.2,0,70.9,23.4,84.8,56.8C269.8,121.9,302.6,98.4,340.8,98.4 M340.8,83C307,83,276,98.8,256" />
 </clipPath>
    </g>
 
     <image clip-path="url(#hexagonal-mask)" id="person-img" href="" style=" transform:rotate(-5deg); " />
 </svg>
</div>
				<!-- <img src="images/woman1.jpg" /> -->
				<!-- <img src="images/shared-page-heart2.png" /> -->
			<!-- </div> -->
			
		</div>
		<div class="save-date">
				<p>Save the date<br>december 21,2019</p>
			</div>

	
	</div>
		<div class="counter-div">
			<div class="counter-left" id="countdown-div">
				<p>Our Wedding Countdown</p>
			<!-- 	<div id="wrapper">
  <div id="clock-a"></div>
  <div id="clock-b"></div>
  <div id="clock-c"></div>
</div> -->
				<!-- <div id="defaultCountdown"></div> -->
				 <ul>
					<li>
						<span id="years"></span>
						<p>Years</p>
					</li>
					<li>
						<span id="months"></span>
						<p>Months</p>
					</li>
					<li>
						<span id="days"></span>
						<p>Days</p>
					</li>
					 <li>
						<span id="hours"></span>
						<p>Hours</p>
					</li>
					<li>
						<span id="mins"></span>
						<p>Mins</p>
					</li> 
					<li>
						<span id="secs"></span>
						<p>Seconds</p>
					</li>  
				</ul> 
			</div>
			<div class="counter-right">
				<img src="https://www.mindlogicsinc.com/faceapp/images/shared-page-ring-box.png"  />
				<p>Check out the ring</p>
			</div>
		</div>
	</div>
</div>


</body>

</html>