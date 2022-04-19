const url="http://localhost:3000/books-collab"
const creator=(element)=>document.createElement(element);
const books_ref=document.getElementById('books');
const displayBooks=(book_details)=>{
	document.getElementById('spinner').style.display='none';
	for(let i in book_details){
		let bookName,bookImage,bookCost,bookRating;
		// let book_detailsSQL=
		// `
		// 	<?php
		// 		$bookSQL="SELECT image_url,original_title,cost,average_rating from books WHERE book_id=${book_details[i].book_id}";
		// 		$bookResult = mysqli_query($connection, $bookSQL));
		// 		$bookRow = mysqli_fetch_array($bookResult, MYSQLI_ASSOC);
		// 		echo "<script>
		// 		bookName=".$bookRow['original_title'].";
		// 		bookImage=".$bookRow['image_url'].";
		// 		bookCost=".$bookRow['cost'].";
		// 		bookRating=".$bookRow['average_rating'].";
		// 		</script>";
		// 	 ?>
		// `;

		let book_wrapper=creator('div');
		book_wrapper.classList.add('book-wrapper','col-lg-4', 'd-inline-block', 'my-2');
		//a tag
		let bookLink=creator('a');
		bookLink.setAttribute('href',`book_desc.php?id=${book_details[i].book_id}`);
		bookLink.setAttribute('target','_blank');
		bookLink.classList.add('text-decoration-none', 'link-dark');

		let book_card=creator('div');
		book_card.classList.add('card');
		let image_wrapper=creator('div');
		image_wrapper.classList.add('ratio', 'ratio-4x3');
		let book_img=creator('img');
		book_img.setAttribute('src',book_details[i].book_image);
		book_img.classList.add('card-img-top','py-2');
		image_wrapper.appendChild(book_img);
		book_card.appendChild(image_wrapper);
		
		let book_details_div=creator('div');
		book_details_div.classList.add('card-body');
		let rating='';
		switch (parseInt(book_details[i].book_rating)){
		    case 1:
		        rating=`
		        <i class="fas fa-star" style="color: #ffcc33;"></i>
		        <i class="far fa-star" style="color: #ffcc33;"></i>
		        <i class="far fa-star" style="color: #ffcc33;"></i>
		        <i class="far fa-star" style="color: #ffcc33;"></i>
		        <i class="far fa-star" style="color: #ffcc33;"></i>`;
		        break;
		    case 2:
		        rating=`
		        <i class="fas fa-star" style="color: #ffcc33;"></i>
		        <i class="fas fa-star" style="color: #ffcc33;"></i>
		        <i class="far fa-star" style="color: #ffcc33;"></i>
		        <i class="far fa-star" style="color: #ffcc33;"></i>
		        <i class="far fa-star" style="color: #ffcc33;"></i>`;
		        break;
		    case 3:
		        rating=`
		        <i class="fas fa-star" style="color: #ffcc33;"></i>
		        <i class="fas fa-star" style="color: #ffcc33;"></i>
		        <i class="fas fa-star" style="color: #ffcc33;"></i>
		        <i class="far fa-star" style="color: #ffcc33;"></i>
		        <i class="far fa-star" style="color: #ffcc33;"></i>`;
		        break;
		    case 4:
		        rating=`
		        <i class="fas fa-star" style="color: #ffcc33;"></i>
		        <i class="fas fa-star" style="color: #ffcc33;"></i>
		        <i class="fas fa-star" style="color: #ffcc33;"></i>
		        <i class="fas fa-star" style="color: #ffcc33;"></i>
		        <i class="far fa-star" style="color: #ffcc33;"></i>`;
		        break;
		    case 5:
		        rating=`
		        <i class="fas fa-star" style="color: #ffcc33;"></i>
		        <i class="fas fa-star" style="color: #ffcc33;"></i>
		        <i class="fas fa-star" style="color: #ffcc33;"></i>
		        <i class="fas fa-star" style="color: #ffcc33;"></i>
		        <i class="fas fa-star" style="color: #ffcc33;"></i>`;
		        break;
		    default:
		        rating=`
		        <i class="far fa-star" style="color: #ffcc33;"></i>
		        <i class="far fa-star" style="color: #ffcc33;"></i>
		        <i class="far fa-star" style="color: #ffcc33;"></i>
		        <i class="far fa-star" style="color: #ffcc33;"></i>
		        <i class="far fa-star" style="color: #ffcc33;"></i>`;
		        break;
		}
		book_details_div.innerHTML=
		`
			<h5 class="card-title">${book_details[i].book_title}</h5>
			<div class="rating">
			   ${rating}
			</div>
			<p class="card-text">&#8377; ${book_details[i].cost} </p>
			<a href="index.php?id=${book_details[i].book_id}"  class="btn btn-primary d-block">Add To Cart</a> 
		`;
		book_card.appendChild(book_details_div);
		bookLink.appendChild(book_card);
		book_wrapper.appendChild(bookLink);
		books_ref.appendChild(book_wrapper);
	}
}

	// book_details=book_details.replace(/\[\]/g,'')
	// console.log(typeof(book_details))
const fetchBooks=async (user_id,ratings_object)=>{
	//Fetch contents from url
    ratings_object=JSON.parse(ratings_object)
    for(let i in ratings_object){
    	ratings_object[i].user_id=user_id;
		console.log(ratings_object[i])    	
    }
    let value={
    	"user_id":user_id,
    	"ratings":ratings_object
    		// "values":[
			   //  {"user_id": 847, "book_id": 33, "rating": 1}, 
			   //  {"user_id": 847, "book_id": 91, "rating": 3}, 
			   //  {"user_id": 847, "book_id": 64, "rating": 4}
  	  	// 	]
		};
	value=JSON.stringify(value)
    const response = await fetch(url,{
    	method: 'POST',
	  	headers: {
	    	'Content-Type': 'application/json',
	  	},
    	body:value, 
    });
    //store response
    let data=await response.json();
    
    // console.log();
    // let json_string=data.split("$")[1]
    console.log(data)

	displayBooks(JSON.parse(data));
}


/*
Existing Object
[
"{"user_id":"8","book_id":"7","rating":"3"}",
"{"user_id":"8","book_id":"80","rating":"4"}",
"{"user_id":"8","book_id":"31","rating":"2"}",
"{"user_id":"8","book_id":"52","rating":"5"}",
"{"user_id":"8","book_id":"45","rating":"2"}",
"{"user_id":"8","book_id":"48","rating":"4"}",
"{"user_id":"8","book_id":"38","rating":"2"}"
]
*/

/*
Updated Object
["
{"book_id":"23","rating":"4"}",
"{"book_id":"113","rating":"3"}",
"{"book_id":"9","rating":"5"}",
"{"book_id":"86","rating":"3"}",
"{"book_id":"55","rating":"4"}",
"{"book_id":"98","rating":"5"}",
"{"book_id":"45","rating":"5"}",
"{"book_id":"19","rating":"3"}
"]
*/

/*
[
{"book_id":"65","rating":"3"},
{"book_id":"3","rating":"4"},
{"book_id":"37","rating":"5"},
{"book_id":"37","rating":"3"},
{"book_id":"2","rating":"4"},
{"book_id":"45","rating":"5"},
{"book_id":"65","rating":"3"},
{"book_id":"16","rating":"3"}
]

*/