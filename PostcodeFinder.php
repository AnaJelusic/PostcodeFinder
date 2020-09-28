<!DOCTYPE html>
<html>
	<head> 
		<title>Postcode Finder</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 

		<link href="https://fonts.googleapis.com/css2?family=Lora:wght@500&display=swap" rel="stylesheet">



		<style type="text/css">

			html { 
				height: 100%; margin: 0;
			}

			body { 
				height: 100%; 
				width: 100%; 
				margin: 0; 
				background-image: url("envelope.jpg"); 
				background-position: center;
				background-repeat: no-repeat; 
				-webkit-background-size: cover; 
				-moz-background-size: cover; 
				-o-background-size: cover;
				background-size: cover; 
				font-family: 'Lora', serif;
 
			}

			label, #message { 
				font-size: 1.5em; 
			}
		

			footer a, footer a:hover {
				color: grey;
			}


		</style>
	</head> 

	<body>

		<div class="container-md flex-shrink-2">

			<h1 class="pt-5 text-center">Welcome to Postcode Finder!</h1>

			<div class="row justify-content-center align-items-center"> 
				<div class="col-10 col-md-8 col-lg-6"> 
					<form class="pt-5 text-center" method="post" > 
						<div class="form-group  "> 
							<label for="address"  class="pt-4 pb-4">Enter a partial address to get the postcode:</label>
							<input type="text" id="address" name= "address" class="form-control text-center" placeholder="Address">
					  	</div> 
					 	<button class="btn btn-primary mt-4" id="find-postcode">Submit</button>
					</form>
					<div id="message" class="text-center pt-5"></div>
				</div>
				
			</div>

			
		</div>


		<footer class="page-footer font-small blue fixed-bottom text-right text-muted" style="font-size: 0.7em">
			<span>Photo by <a href="https://unsplash.com/@joannakosinska?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Joanna Kosinska</a> on <a href="https://unsplash.com/s/photos/envelope?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
		</footer>

		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
		integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
		integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

		<script type="text/javascript">

			$("#find-postcode").click(function(e) {

				e.preventDefault();

				$.ajax({
				 	url: "https://maps.googleapis.com/maps/api/geocode/json?address=" + encodeURIComponent($("#address").val()) + "&key=KEY",
				 	type: "GET",
				 	success: function (data) {

				 		console.log(data);

				 		if(data["status"] != "OK") {

				 			$("#message").html('<div class="alert alert-danger" role="alert">Postcode could not be found, please try again.</div>');

				 		} else {
				 			
					 		$.each(data["results"][0]["address_components"], function (key, value) {

					 			if(value["types"][0] == "postal_code") {

					 				$("#message").html('<div class="alert alert-success" role="alert">Postcode found! The postcode is ' + value["long_name"] + '.</div>');
					 			}
					 		})
				 		}
		 			}	
		 		})
	 		})
			
	 		
		</script>

	</body>
	
</html>
