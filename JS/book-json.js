let ISBN="9780753555194";
const url="https://openlibrary.org/api/books?bibkeys=ISBN:"+ISBN+"&jscmd=details&format=json";
async function getapi(url) {
    
    // Storing response
    const response = await fetch(url);
    
    // Storing data in form of JSON
    var data = await response.json();
    
    let val=data["ISBN:"+ISBN];
    console.log(data)
    //document.getElementById('a').innerHTML+=" : "+val["details"]+"<br/>";
    // for(let i of Object.keys(val.details)){
    	// document.getElementById('a').innerHTML+=i+" : "+val.details[i]+"<br/>";	
    // }
}
window.onload=getapi(url);
