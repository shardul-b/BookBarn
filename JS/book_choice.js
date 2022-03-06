const url="http://localhost:3000/random_books"
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
		for(let index=1;index<6;index++){
			//checkbox container
			let rating_checkBox_container=document.createElement('div');
			rating_checkBox_container.classList.add("form-check","form-check-inline")
			//checkboxes
			let rating_checkBox=document.createElement('input');
			rating_checkBox.setAttribute('type',"checkbox");
			rating_checkBox.classList.add("rating_value", "form-check-input");
			rating_checkBox.setAttribute('name', "rating_value[]");
			rating_checkBox.setAttribute('id',`rating_${index}`);
			rating_checkBox.value=`${book_details[i].book_id}:${index}`;
			rating_checkBox_container.appendChild(rating_checkBox);
			let rating_label=document.createElement('label');
			rating_label.classList.add('form-check-label');
			rating_label.setAttribute('for',`rating_${index}`);
			// rating_label.setAttribute('value',`${index}`);
			rating_label.innerHTML=`${index}`;
			rating_checkBox_container.appendChild(rating_label);
			rating_options.appendChild(rating_checkBox_container);	
		}		
		book_wrapper.appendChild(rating_options);
		books_ref.appendChild(book_wrapper);
	}

	// book_details=book_details.replace(/\[\]/g,'')
	// console.log(typeof(book_details))
}
const fetchBooks=async ()=>{
	//Fetch contents from url
    const response = await fetch(url);
    //store response
    let data=await response.json();
    console.log(data)
	displayBooks(JSON.parse(data));
}


window.onload=fetchBooks();


/* Implemented in PHP
	const submitRatingsButton=document.getElementById('submit-ratings');
			let user_ratings_object={};
			//Submit button
			submitRatingsButton.addEventListener('click',()=>{
				const checkBoxRef=document.querySelectorAll('.rating_value');
				//get values of checkboxes that were checked
				checkBoxRef.forEach((checkbox)=>{
					if(checkbox.checked){
						let user_rating_book=checkbox.value.split(':');
						console.log(user_rating_book[0]);
						user_ratings_object[user_rating_book[0]]=user_rating_book[1];
					}	
				})
				console.log(user_ratings_object);
			})		
*/