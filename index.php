<?php
include 'config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Auto refresh div content using ajax and jquery</title>
  </head>
  <body>
<div class="container" style="margin-top: 10%;" >
	<div style="margin-left: 24%;" class="row">
		<div  class="col-md-8 card">
		<!-- BOOTSTRAP FORM START -->
		    <form name="add_tweet" id="add_tweet" enctype="multipart/form-data" data-remote="true" method="post"  > 
			  <div class="form-group row">
			    <label for="tweet" class="col-sm-2 col-form-label">Tweet</label>
			    <div class="col-sm-10">
			      <input type="text"  class="form-control" id="tweet" name="tweet" value="">
			      <!-- <textarea type="text"  class="form-control" id="tweet" name="tweet" value=""></textarea> -->
			    </div>
			  </div>
			  <div class="form-group row">
			  	<div class="col-sm-10">
				    <button align="right" class="btn btn-success text-right" name="btn_tweet" id="btn_tweet" type="submit">
				    	submit tweet
				    </button>
				</div>
			  </div>
			</form>
		<!-- BOOTSTRAP FORM END  -->
		</div>

		<div class="clearfix" ></div>
		<div id="load_tweets" ></div><!-- refreshes this div every second -->
		<!-- For refreshing the div content every second we use setInterval() -->

	</div>
</div>

    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#btn_tweet").click(function () {
		// e.preventDefault();
		// console.log("clicked")
		var tweet_txt = 'tweet='+$("#tweet").val();
		var dataString = 'tweet=' + $("#tweet").val();
		if (tweet_txt='') {
	    			// $("#display").html("Please Enter your email address")
	    		}
	    		else{
	    			 $.ajax({
	    			 	type:"POST",
	    			 	url: "insert.php",
	    			 	data: dataString,
	    			 	// cache:false	,
	    			 	success: function (result) {
	    			 		$("#tweet").val("")
							$("#load_tweets").html(result)	    			 	
						}
	    			 	});
	    		}
	    		return false;
	})
	setInterval(function () {

		$("#load_tweets").load("fetch.php").fadeIn("slow")
	},1000)
})
</script>

  </body>
</html>