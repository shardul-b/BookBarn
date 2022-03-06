const url="http://localhost:3000/books"
const creator=(element)=>document.createElement(element);
const books_ref=document.getElementById('books');
const displayBooks=(book_details)=>{
	for(let i in book_details){

		let book_wrapper=creator('div');
		book_wrapper.classList.add('book-wrapper')
		let image_wrapper=creator('div');
		let book_img=creator('img');
		let book_details_div=creator('div');
		//Rating
		let rating_options=creator('div');

		book_img.setAttribute('src',book_details[i].book_image);
		image_wrapper.appendChild(book_img);
		book_wrapper.appendChild(image_wrapper);
		book_details_div.innerHTML=
		`
			<p class="book-name">${book_details[i].book_title}</p>
			<p class="book-author">By ${book_details[i].book_author}</p>
		`;
		book_wrapper.appendChild(book_details_div);
		// ratings_options.innerHTML=
		// `
		// 	<input type="radio" name="rating" id="rating_1" class="rating_value" value="1" />
		// 	<label for="rating_1">1</label>
		// 	<input type="radio" name="rating" id="rating_2" class="rating_value" value="2" />

		// 	<!--<button>I haven't seen this book</button>-->
		// `;
		// book_wrapper.appendChild(rating_options);
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