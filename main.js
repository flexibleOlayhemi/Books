$(".edit").click(e =>{

	let textvalues = displayData(e);
	let id = $("input[name*='id']");
	let bookname = $("input[name*='name']");
	let publisher = $("input[name*='publisher']");
	let bookprice = $("input[name*='price']");
	
	
	id.val(textvalues[0]);
	bookname.val(textvalues[1]);
	publisher.val(textvalues[2]);
	bookprice.val(textvalues[3]);
});

function displayData(e){
	let id = 0;
	const td = $("#tbody tr td");
	let textvalue = [];

	for (const value of td){
		if(value.dataset.id == e.target.dataset.id){
			textvalue[id++] = value.textContent;
	    }
    }

   return textvalue;
 }