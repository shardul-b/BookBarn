<!--<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Books API</title> -->
	<?php
		$link=''; 
		if($rent==true){
			$link='./rentform.php?manual=true';
		}else{
			$link='./sellerform.php?manual=true';
		}
		echo 
		'
			<script src="./API/api-key.js"></script>
			<style>
			.callout {
		  padding: 20px;
		  margin: 20px 0;
		  border: 1px solid #eee;
		  border-left-width: 5px;
		  border-radius: 3px;
		}
		.callout h4 {
		  margin-top: 0;
		  margin-bottom: 5px;
		}
		.callout p:last-child {
		  margin-bottom: 0;
		}
		.callout code {
		  border-radius: 3px;
		}
		.callout + .bs-callout {
		  margin-top: -5px;
		}

		.callout-default {
		  border-left-color: #777;
		}
		.callout-default h4 {
		  color: #777;
		}

		.callout-primary {
		  border-left-color: #428bca;
		}
		.callout-primary h4 {
		  color: #428bca;
		}

		.callout-success {
		  border-left-color: #5cb85c;
		}
		.callout-success h4 {
		  color: #5cb85c;
		}

		.callout-danger {
		  border-left-color: #d9534f;
		}
		.callout-danger h4 {
		  color: #d9534f;
		}

		.callout-warning {
		  border-left-color: #f0ad4e;
		}
		.callout-warning h4 {
		  color: #f0ad4e;
		}

		.callout-info {
		  border-left-color: #5bc0de;
		}
		.callout-info h4 {
		  color: #5bc0de;
		}

		.callout-bdc {
		  border-left-color: #29527a;
		}
		.callout-bdc h4 {
		  color: #29527a;
		}
		.image-div{
			width:6rem;
		}
		img{
			max-width:100%;
		}
			</style>
		<div class="container-fluid">
			<h2>Welcome to our Book Finder</h2>
			<p class="lead">We will help you to fill book details for your book. All you have to do is search for your book below, select a book from results and the details would be filled out for you!</p>
			<div class="callout callout-info">Tip: You could even choose a book here and edit details based on your choice later!</div>
	
				<label>Enter book name </label>
				<input id="book-input" type="text" name="bookname">
				<button onclick="myFunction()"> Find Suggestions </button>
				<!-- Books Found -->
				<div id="book-info">

				</div>
					<!-- Manual Filling Link -->
					<div id="self-input">
						<h3> Didn\'t find your book?</h3>
						
						<a href="'.$link.'"  role="button" class="btn btn-success" id="manual-button">Fill Manually</a>
					</div>
				</div>
<script src="./JS/book-json.js"></script>
		';
	?>
	
<!-- </head> -->

<!-- <body> -->
	
	<!-- 
		Expected working:
		User enters Book Name and clicks on search 
		User would be displayed options and user clicks on one of them..
		Other book details get filled
		User clicks on submit button-> new details entered in Database
	 -->
	
<!-- </body> -->

<!-- </html> -->



<!-- "AIzaSyD5DNrXujbc5pysklXpCWarkryefVsY02Q"

			$formLink=''; 
			if(isset($_GET['trigger'])){
				$formLink=$_GET['trigger'];
			}
		 -->