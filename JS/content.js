const url="http://localhost:3000/books"
const creator=(element)=>document.createElement(element);
const books_ref=document.getElementById('books');
const displayBooks=(book_details)=>{
	console.log(book_details)
	if(book_details.error){
		books_ref.innerHTML=`<p>${book_details.error}</p>`;
		return false;
	}
	for(let i in book_details){
		// console.log(book_details[i].title)
		let book_wrapper=creator('div');
		book_wrapper.classList.add('book-wrapper','col-lg-2', 'd-inline-block', 'ms-2');
		//a tag
		let bookLink=creator('a');
		bookLink.setAttribute('href',`book_desc.php?id=${book_details[i].book_id}`);
		bookLink.setAttribute('target','_blank');
		bookLink.classList.add('text-decoration-none', 'link-dark');
		
		//card div
		let book_card=creator('div');
		book_card.classList.add('card');

		let image_wrapper=creator('div');
		image_wrapper.classList.add('ratio', 'ratio-4x3', 'image-wrapper');
		let book_img=creator('img');
		let book_details_div=creator('div');
		book_details_div.classList.add('card-body');
		book_img.setAttribute('src',book_details[i].book_image);
		book_img.classList.add('card-img-top','py-2');
		image_wrapper.appendChild(book_img);
		book_card.appendChild(image_wrapper);
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
			<h6 class="card-title">${book_details[i].book_title}</h6>
			<div class="rating">
			   ${rating}
			</div>
			<p class="card-text">&#8377; ${book_details[i].cost} </p>
		`;
		book_card.appendChild(book_details_div);
		bookLink.appendChild(book_card);
		book_wrapper.appendChild(bookLink);
		books_ref.appendChild(book_wrapper)
	}

	// book_details=book_details.replace(/\[\]/g,'')
	// console.log(typeof(book_details))
}
const fetchBooks=async (bookTitle)=>{
	// console.log(bookTitle)
	//Fetch contents from url
	let titleObj={'title':`${bookTitle}`};
	titleObj=JSON.stringify(titleObj);
    const response = await fetch(url,{
    	method: 'POST',
	  	headers: {
	    	'Content-Type': 'application/json',
	  	},
    	body:titleObj,
    });
    //store response
    let data=await response.json();
    // console.log(JSON.parse(data));
	document.getElementById('spinner').style.display='none';
	displayBooks(JSON.parse(data));

}

// window.onload=fetchBooks(bookTitle);



// {
//   "inbox_id": "11549",
//   "name":"New contact",
//   "phone_number": "+912323234"
// }