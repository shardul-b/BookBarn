let genres=[
	{
		fiction:{
			name:'Fiction',
			image:'./assets/img/booklogo.png'
		},
		juvenile_fiction:{
			name:'Juvenile Fiction',
			image:''
		},
		novel:{
			name:'Novels',
			image:''
		}
	},
	{
		literary_criticism:{
			name:'Literary Criticism',
			image:''
		}
	}
];
let categories_ref=document.getElementsByClassName("categories")[0];
for(let i of genres){
	//Create row
	let row=document.createElement("div");
	row.classList.add('row');
	for(let j of Object.values(i)){
		//column  
		let col=document.createElement("div");
		col.classList.add("col");
		//card
		let card=document.createElement("div");
		card.classList.add("card");
		card.style.width="16rem";
		//card head
		let card_head=document.createElement("div");
		card_head.classList.add("ratio","ratio-4x3");
		card_head.style.objectFit="contain";
		card_head.innerHTML='<img src='+j["image"]+' class="card-img-top py-2" style="object-fit: contain;" alt="Book image">';
        card.appendChild(card_head);
        let card_body=document.createElement("div");
        card_body.classList.add("card-body");
        card_body.innerHTML=
        `<a href="./search.php?value=${j["name"]}">
        	<h5 class="card-title">${j["name"]}</h5>
        </a>`;                
        card.appendChild(card_body);
		//append card
		col.appendChild(card);
		row.appendChild(col);
	}
	categories_ref.appendChild(row);
}
