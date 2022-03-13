const url="http://localhost:3000/books"
const creator=(element)=>document.createElement(element);
const books_ref=document.getElementById('books');
const displayBooks=(book_details)=>{
	for(let i in book_details){

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

		book_details_div.innerHTML=
		`
			<h6 class="card-title">${book_details[i].book_title}</h6>
			<p class="book-author card-text">By ${book_details[i].book_author}</p>
			<p class="card-text">&#8377; 1 </p>
		`;
		book_card.appendChild(book_details_div);
		bookLink.appendChild(book_card);
		book_wrapper.appendChild(bookLink);
		books_ref.appendChild(book_wrapper)
	}

	// book_details=book_details.replace(/\[\]/g,'')
	// console.log(typeof(book_details))
}
const fetchBooks=async ()=>{
	//Fetch contents from url
    const response = await fetch(url);
    //store response
    let data=await response.json();
    console.log(data);
	displayBooks(data);
}

window.onload=fetchBooks();


