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

const getBooks = async (searchQuery) => {
  let response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${searchQuery}&key=${API_KEY}`)
  var data = await response.json();
  let results = data.items;

  for (let i = 0; i < results.length; i++) {
    //check for needed columns 
    let checks = await checker(results[i].volumeInfo)
    //for undefined/null this would return false by default
    if (checks) {
      console.log(results[i].volumeInfo)
      // if (results[i].volumeInfo.imageLinks) {
      //Details Div
      let div = document.createElement('div');
      div.classList.add('details-div');
      // Image container
      let imageContainer = document.createElement('div');
      imageContainer.classList.add('image-div');
      imageContainer.innerHTML =
        `
        <img src='${results[i].volumeInfo.imageLinks.thumbnail.replace(/zoom\=[0-9]\&/, '')}' class='book-image' id='book-image${i}'/>
        `;
      div.appendChild(imageContainer);
      // Book Name
      let bookName = document.createElement('div');
      bookName.classList.add("book-temp-name");
      bookName.innerHTML = results[i].volumeInfo.title;
      div.appendChild(bookName);
      // Book authors
      let authors = document.createElement('div');
      authors.classList.add('book-temp-author');
      authors.innerHTML = results[i].volumeInfo.authors;
      div.appendChild(authors);
      // View All details button
      let moreButton=document.createElement('button');
      moreButton.classList.add('btn', 'btn-primary')
      moreButton.setAttribute('data-bs-toggle',"collapse");
      moreButton.setAttribute('data-bs-target',`#collapseDetails${i}`);
      moreButton.setAttribute('aria-expanded',"false");
      moreButton.setAttribute('aria-controls',`collapseDetails${i}`);
      moreButton.innerText="View all details";
      div.appendChild(moreButton);
      // Collapsed div
      let collapse=document.createElement('div');
      collapse.classList.add('collapse');
      collapse.setAttribute('id',`collapseDetails${i}`);
      
      //ISBN value
      let isbn_value=results[i].volumeInfo.industryIdentifiers.map(
        (values)=>{
          if(values.type=="ISBN_13"){
            return values.identifier
          }
        })
      collapse.innerHTML=
      `
        <form method="post">
          <input type="hidden" value="${results[i].volumeInfo.imageLinks.thumbnail.replace(/zoom\=[0-9]\&/, '')}" name="gen-book-image"/>
          <input type="hidden" value="${results[i].volumeInfo.title}" name="gen-book-title"/>
          <input type="hidden" value="${results[i].volumeInfo.authors}" name="gen-book-authors"/>
          Description:<p name="description" id='description'>${results[i].volumeInfo.description}</p>
          <input type="hidden" value="${results[i].volumeInfo.description}" name="gen-book-description"/>
          ISBN:<span name="isbn" id="isbn">${isbn_value}</span>
          <input type="hidden" value="${isbn_value}" name="gen-book-isbn"/>
          <button onsubmit="newPage()" type="submit" class="btn btn-success" name="gen-book-submit">Choose Book Details</button>
        </form>
        
        
        <!--<p name="book-details" id="book-details"></p>-->
      `;
      // if (results[i].saleInfo.saleability == "FOR_SALE") {
      //   div.innerHTML = "Price: " + results[i].saleInfo.listPrice.amount + "\n";
      //   // console.log(results[i].saleInfo.listPrice.amount);  
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
  //   console.log(result_object.volumeInfo);
  // })
  // .catch(err=>console.log(err))
}
const newPage=()=>{
 //URL parameter
 let url=location.href;
 url=url.split('?')[1].split("=")[1];
 console.log(url)
 location.href=`./${url}`; 
};