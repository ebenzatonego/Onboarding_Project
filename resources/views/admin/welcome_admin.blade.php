@extends('layouts.theme_admin')

@section('content')

<style>
.box{
  	width:90%;
  	margin: 0 auto;
  	padding: 2px;
  	background-color: #eaab00; /* gold */
  	/* Single pixel data uri image http://jsfiddle.net/LPxrT/ 
  	/* background-image: gold, gold, white */
  	background-image: url('data:image/gif;base64,R0lGODlhAQABAPAAAOqrAP///yH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=='),  url('data:image/gif;base64,R0lGODlhAQABAPAAAOqrAP///yH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=='),
	url('data:image/gif;base64,R0lGODlhAQABAPAAAP///////yH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==');
  	background-repeat: no-repeat;
  	background-size: 0 2px, 0 100%, 0% 2px;
  	background-position: top center, top center, bottom center;
  	-webkit-animation: drawBorderFromCenter 4s;
}

/* Chrome, Safari, Opera */
@-webkit-keyframes drawBorderFromCenter {
    0% {
      background-size: 0 2px, 0 0, 100% 100%;
    }
    20% {
      background-size: 100% 2px, 100% 0, 100% 100%;
    }
    66%
    {
      background-size: 100% 2px, 100% 98%, 100% 100%;
    }
    99%
    {
      background-size: 100% 2px, 100% 98%, 0 2px;
    }
}

.content{
  	background: white;
  	padding: 2em;
  	text-align: center;
  	/* text-transform: uppercase; */
}
</style>

<center>
<div class="box" style="font-family: 'Prompt', sans-serif;border-radius: 25px;">
	<div class="content" style="font-family: 'Prompt', sans-serif;border-radius: 25px;">
	    <div class="row">
	            <div class="card-body col-md-6 col-12" style="hight: 450px">
	                <div class="text-center">
		                <svg xmlns="http://www.w3.org/2000/svg" width="515" height="479" viewBox="0 0 130 121" fill="none">
		                    <path d="M128.444 101.75L121.673 89.1863H115.033H108.328H52.0818C49.9987 89.1863 48.1108 88.0796 47.0692 86.3219C46.0276 84.5642 45.9625 82.3508 46.939 80.528L57.8757 60.3472H37.4996H30.7943H24.1542L1.82506 101.75C-0.323223 105.722 -0.193024 110.344 2.08546 114.184C4.55924 118.286 8.986 120.759 13.9336 120.759H116.335C121.283 120.759 125.709 118.286 128.183 114.184C130.462 110.344 130.527 105.722 128.444 101.75Z" fill="#243286"></path>
		                    <path d="M77.2092 7.03074C74.8656 2.66908 70.2435 0 65.1007 0C59.9578 0 55.3358 2.66908 52.9922 7.03074L30.4678 48.6944H37.1079H43.7481H67.6396C69.7227 48.6944 71.6106 49.8011 72.6522 51.5588C73.6938 53.3165 73.7589 55.5298 72.7824 57.3526L61.8457 77.5335H101.882H108.522H115.162L77.2092 7.03074Z" fill="#243286"></path>
		                </svg>
		                <p style="font-size: 32px;font-weight: bolder;margin: 10px 0 0 0;">Allianz Journey</p>
		                <p style="font-size: 10px;font-weight: bold;margin: 0;">ALLIANZ ON-BOARDING WEB</p>
		            </div>
	            </div>
	            <div class="card-body col-md-6 col-12 d-flex align-items-center justify-content-center">
	                <div class="col-md-12">
	                    <h1 style="font-family: 'Prompt', sans-serif;text-shadow: 2px 2px 2px rgba(150, 150, 150, 1);margin-top:25px;">
	                    	<b><span style="color: #243286;font-size: 60px;">CMS</span> Allianz Journey</b>
	                    </h1>
	                    <h3 style="font-family: 'Prompt', sans-serif;text-shadow: 2px 2px 2px rgba(150, 150, 150, 1);margin-top:25px;">
	                    	<b>ALLIANZ ON-BOARDING WEB</b>
	                    </h3>
	                    <h5 style="font-family: 'Prompt', sans-serif;text-shadow: 1px 1px 1px rgba(150, 150, 150, 1);margin-top:25px;">
	                    	<b style="color: #949393;">For Admin</b>
	                    </h5>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>      
</center>

@endsection