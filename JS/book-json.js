let outputDiv = document.getElementById("book-info");

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
    Price(remove)
    ISBN-13 (remove) 
    published year (remove)
  */
  let flag = 0;
  if (book_object.title && book_object.authors && book_object.imageLinks && book_object.description && book_object.categories && book_object.publisher) {
    // if (book_object.categories) {
    // if (book_object.publisher && book_object.language) {
    // book_object.industryIdentifiers.map((values) => {
      // if (values.type == "ISBN_13") {
    flag = 1;
      // }
    // });
  }
  return flag == 1;
}
const getBooks = async (searchQuery) => {
  outputDiv.innerHTML='';
  let response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${searchQuery}&key=${API_KEY}`)
  var data = await response.json();
  let results = data.items;

  for (let i = 0; i < results.length; i++) {
    //check for needed columns 
    let checks = await checker(results[i].volumeInfo)
    //for undefined/null this would return false by default
    if (checks) {
      // console.log(results[i].volumeInfo)
      // if (results[i].volumeInfo.imageLinks) {
      //Details Div
      let div = document.createElement('div');
      div.classList.add('details-div');
      // Image container
      let imageContainer = document.createElement('div');
      imageContainer.classList.add('image-div','mt-4','mb-2');
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
      authors.innerHTML = `Authors: ${results[i].volumeInfo.authors}`;
      div.appendChild(authors);
      //Book Categories
      let categories = document.createElement('div');
      categories.classList.add('book-temp-category');
      categories.innerHTML = `Categories: ${results[i].volumeInfo.categories}`;
      div.appendChild(categories);
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
      
      // //ISBN value
      // let isbn_value=results[i].volumeInfo.industryIdentifiers.map(
      //   (values)=>{
      //     if(values.type=="ISBN_13"){
      //       return values.identifier
      //     }
      //   })
      //let phpString='<?php $_SESSION["bookName"]="'+results[i].volumeInfo.title+'";?>';
          //$bookImageLink="${results[i].volumeInfo.imageLinks.thumbnail.replace(/zoom\=[0-9]\&/, '')}";
      // bookName=results[i].volumeInfo.title;

          //$bookAuthors="${results[i].volumeInfo.authors}";
          //$bookCategories="${results[i].volumeInfo.categories}";
          //$bookGoogleDescription="${results[i].volumeInfo.description}";
        
        
      collapse.innerHTML=
      `
        Description:<p name="description" id='description'>${results[i].volumeInfo.description}</p>
        <button type="submit" class="btn btn-success" onclick="updateDetails('${results[i].volumeInfo.title}','${results[i].volumeInfo.description}','${results[i].volumeInfo.categories}','${results[i].volumeInfo.authors}')" name="gen-book-submit">Choose Book Details</a>
      `;
      //href="./rentform.php?manual=true&googlebooks=true"
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
/*const newPage=()=>{
 //URL parameter
 let url=location.href;
 url=url.split('?')[1].split("=")[1];
 console.log(url)
 location.href=`./${url}`; 
};*/
const updateDetails=(name,description,categories,authors)=>{
  let urlLink=location.href;
  let returnLink='';
  if(urlLink.includes('rent')){
    returnLink="./rentform.php?manual=true&googlebooks=true";
  }else{
    returnLink="./sellerform.php?manual=true&googlebooks=true";
  }
  bookName=name;
  sessionStorage.setItem('bookName',name);
  sessionStorage.setItem('bookDescription',description);
  sessionStorage.setItem('bookCategory',categories);
  sessionStorage.setItem('bookAuthor',authors);
  location.href=returnLink;
}