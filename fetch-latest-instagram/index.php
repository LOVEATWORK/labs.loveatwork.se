<?php

	function fetchData($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		$result = curl_exec($ch);
		curl_close($ch); 
		return $result;
	}
    
	function getBackgroundImage() {

		$result = fetchData("https://api.instagram.com/v1/users/145715021/media/recent/?access_token=145715021.ab103e5.c35d09e9bf8c428f822bd9e6f714cad9");
		$result = json_decode($result);
		return $result->data[2]->images->standard_resolution->url;
	}
     
    /*
	foreach ($result->data as $post) {
      
		var_dump($post[0]);
      
	}
	*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>Get instagram image</title>

	<style>

		body {
    		width: 100%;
    		height: 100%;
    		margin: 0;
    		padding: 0;
    		background-repeat: no-repeat;
    		background-size: cover;
    		background-position: top;
		}

		#blur {
			position: absolute;
			height: 100%; width: 100%;
			background:;
			opacity: 0.5;
			webkit-filter: blur(100px);
		}

		
		body:before {
    		content: "";
    		position: fixed;
    		background: url(<?php echo getBackgroundImage() ?>) ;
    		background-size: cover;
    		z-index: -1; /* Keep the background behind the content */
    		margin-top: -20px;
    		margin-left: -20px;
    		margin-right: 0;
    		height: 110%; width: 110%; /* Using Glen Maddern's trick /via @mente */
    		overflow: hidden;

    		/* don't forget to use the prefixes you need */
    		transform: scale(5);
    		transform-origin: top left;
    		-webkit-filter: blur(10px);
		}
		

		h1 {font-size: 50px;}

	</style>

</head>
<body>
<div id="blur">sd</div>

<!-- 
<h1>
Maecenas faucibus mollis interdum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.

Donec sed odio dui. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum.

Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui.

Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Nullam quis risus eget urna mollis ornare vel eu leo. Donec sed odio dui. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Nulla vitae elit libero, a pharetra augue. Maecenas faucibus mollis interdum.
</h1>
-->


</body>
</html>