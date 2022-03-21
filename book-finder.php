<!DOCTYPE html>
<html lang="en">
<?php
		session_start();
		require './PHP/common_files.php';
	?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Books API</title>
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
</head>

<body>
	<?php
		require './PHP/header.php';
	?>
	<!-- 
		Expected working:
		User enters Book Name and clicks on search 
		User would be displayed options and user clicks on one of them..
		Other book details get filled
		User clicks on submit button-> new details entered in Database
	 -->
	<div class="container-fluid">
		<h2>Welcome to our Book Finder</h2>
		<p class="lead">We will help you to fill book details for your book. All you have to do is search for your book below, select a book from results and the details would be filled out for you!</p>
		<div class="callout callout-info">Tip: You could even choose a book here and edit details based on your choice later!</div>
	
	<label>Enter book name </label>
	<input id="book-input" type="text" name="bookname">
	<button onclick="myFunction()"> Find Suggestions </button>
	<div id="book-info"></div>
	<div id="self-input">
		<h3> Didn't find your book?</h3>
		<?php
			$formLink=''; 
			if(isset($_GET['trigger'])){
				$formLink=$_GET['trigger'];
			}
		 ?>
		<a href="<?php echo './'.$formLink;?>"  role="button" class="btn btn-success" id="manual-button">Fill Manually</a>
	</div>
</div>
	<script>
		let outputDiv = document.getElementById("book-info");
		const API_KEY = "AIzaSyBaRgj-YxD3Nemg1VRo_ZBDfhf3-susTTY";
		function myFunction() {
			var x = document.getElementById("book-input").value;
			getBooks(x);
			//document.getElementById("book-info").innerHTML = x;
		}

		const checker = (book_object) => {
			/*
				Image
				Author
				Name
				Description
				Genre/Categories
				Price
				ISBN-13	
				published date
			*/
			let flag = 0;
			if (book_object.title && book_object.authors && book_object.imageLinks && book_object.description && book_object.categories && book_object.publisher) {
				// if (book_object.categories) {
				// if (book_object.publisher && book_object.language) {
				book_object.industryIdentifiers.map((values) => {
					if (values.type == "ISBN_13") {
						flag = 1;
					}
				});
			}
			return flag == 1;
		}
		// Update below lines based on parameters you use
		/*document.getElementsById('button_id').addEventListener('click',()=>{
			let book_name=document.getElementsById('input_id').value;
			getBooks(book_name);
		})*/
 
		const getBooks = async (searchQuery) => {
			let response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${searchQuery}&key=${API_KEY}`)
			var data = await response.json();
			let results = data.items;

			for (let i = 0; i < results.length; i++) {
				// console.log(results[i].volumeInfo)
				//for undefined/null this would return false by default
				let checks = await checker(results[i].volumeInfo)
				// console.log(checks)
				if (checks) {
					console.log(results[i].volumeInfo)
					// if (results[i].volumeInfo.imageLinks) {
					//Details Div
					let div = document.createElement('div');
					div.classList.add('details-div');
					let imageContainer = document.createElement('div');
					imageContainer.classList.add('image-div');
					imageContainer.innerHTML =
						`
						<img src='${results[i].volumeInfo.imageLinks.thumbnail.replace(/zoom\=[0-9]\&/, '')}' class='book-image' id='book-image${i}'/>
						`;
					div.appendChild(imageContainer);
					let bookName = document.createElement('div');
					bookName.classList.add("book-temp-name");
					bookName.innerHTML = results[i].volumeInfo.title;
					div.appendChild(bookName);
					let authors = document.createElement('div');
					authors.classList.add('book-temp-author');
					authors.innerHTML = results[i].volumeInfo.authors;
					div.appendChild(authors);
					let moreButton=document.createElement('button');
					moreButton.classList.add('btn', 'btn-primary')
					moreButton.setAttribute('data-bs-toggle',"collapse");
					moreButton.setAttribute('data-bs-target',`#collapseDetails${i}`);
					moreButton.setAttribute('aria-expanded',"false");
					moreButton.setAttribute('aria-controls',`collapseDetails${i}`);
					moreButton.innerText="Read More";
					div.appendChild(moreButton);
					let collapse=document.createElement('div');
					collapse.classList.add('collapse');
					collapse.setAttribute('id',`collapseDetails${i}`);
					collapse.innerHTML=
					`
						<p name="description" id='description'>${results[i].volumeInfo.description}</p>
						ISBN:<span name="isbn" id="isbn">${
							results[i].volumeInfo.industryIdentifiers.map(
							(values)=>{
								if(values.type=="ISBN_13"){
									return values.identifier
								}
							})
						}</span>
						<p name="book-details" id="book-details"></p>
					`;
					// if (results[i].saleInfo.saleability == "FOR_SALE") {
					// 	div.innerHTML = "Price: " + results[i].saleInfo.listPrice.amount + "\n";
					// 	// console.log(results[i].saleInfo.listPrice.amount);	
					// }
						div.appendChild(collapse);
					outputDiv.appendChild(div);
					// }




					// console.log(big_image);

					// let html = document.getElementById("book-info").innerHTML;
					// document.getElementById("book-input").innerHTML = html;

				}

			}
			// results.map((result_object)=>{
			// 	console.log(result_object.volumeInfo);
			// })
			// .catch(err=>console.log(err))
		}

	</script>
</body>

</html>



<!-- "AIzaSyD5DNrXujbc5pysklXpCWarkryefVsY02Q" -->