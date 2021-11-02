let search_btn=document.getElementById('search-button');
search_btn.addEventListener('click',()=>{
   let search_value=document.getElementById('search-value');
   location.href=`./search.php?value=${search_value.value}`;
});