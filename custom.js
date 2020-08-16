$(document).ready(function () {
	cartNoti();
	showTable();
	$('.addtocartBtn').on('click',function () {
		
		var id=$(this).data('id');
		var name=$(this).data('name');
		var photo=$(this).data('photo');
		var discount=$(this).data('discount');
		var oprice=$(this).data('oprice');
		var codeno=$(this).data('codeno');
		var newprice=$(this).data('newprice');
		var qty=1;

		var mylist={id:id,name:name,photo:photo,
			discount:discount,oprice:oprice,codeno:codeno,
			newprice:newprice,qty:qty};
		var cart= localStorage.getItem('cart');
		var cartArray;


		if(cart==null){
			cartArray=Array();
		}
		else {
			cartArray=JSON.parse(cart);
		}
		var status=false;

		$.each(cartArray,function (i,v) {
			if(id==v.id){
				v.qty++;
				status=true;
			}
		});
		if(!status){
			cartArray.push(mylist);
		}
		var cartData=JSON.stringify(cartArray);
		localStorage.setItem("cart", cartData);
		cartNoti();


		// console.log("ID:"+id+"name:"+name+"photo:"+photo+"discount:"
		// 	+discount+"orpice:"+oprice+"codeno:"+codeno+"newprice:"+newprice);
	})

	function cartNoti() {
		var cart=localStorage.getItem('cart');
		if(cart){
				var cartArray=JSON.parse(cart);
				var total=0;
				var noti=0;
				$.each(cartArray,function (i,v) {
					var unitprice=v.newprice;
					var oldprice=v.orpice;
					var discount=v.discount;

					var qty=v.qty;
					// if(discount>0){
					// 	var price=oldprice-discount;
					// }
					// else{
					// 	var price=oldprice;
					// }
					
					var subtotal=unitprice*qty;

					noti+=qty++;
					total+=subtotal++;
				})
				$('.cartNoti').html(noti);
			$('.cartTotal').html(total+'Ks');
				}
		else{
			$('.cartNoti').html(0);
			$('.cartTotal').html(0+'Ks');
		}
	}
	function showTable() {
		var cart=localStorage.getItem('cart');
		if (cart)
		 {
		 	$('.shoppingcart_div').show();
		 	$('.noneshoppingcart_div').hide();

		 	var cartArray=JSON.parse(cart);
		 	var shoppingcartData='';

		 	if (cartArray.length>0) {
		 		var total=0;
		 		$.each(cartArray,function(i,v) {

		 			var id=v.id;
		 			var name=v.name;
		 			var codeno=v.codeno;
		 			var photo=v.photo;
		 			var price=v.newprice;
		 			var oprice=v.oprice;
		 			var discount=v.discount;
		 			var qty=v.qty;

		 			var subtotal=price*qty;
		 			shoppingcartData+=`	<tr>
							<td>
								<button class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%" data-id="${i}"> 
									<i class="icofont-close-line"></i> 
								</button> 
							</td>
							<td> 
								<img src="${photo}" class="cartImg">						
							</td>
							<td> 
								<p> ${name} </p>
								<p> ${codeno}</p>
							</td>
							<td>
								<button class="btn btn-outline-secondary plus_btn" data-id="${i}"> 
									<i class="icofont-plus"></i> 
								</button>
							</td>
							<td>
								<p> ${qty} </p>
							</td>
							<td>
								<button class="btn btn-outline-secondary minus_btn" data-id="${i}"> 
									<i class="icofont-minus"></i>
								</button>
							</td>
							<td>`;
								if (discount>0) {
								shoppingcartData+=`<p class="text-danger"> 
									${price} Ks
								</p>
								<p class="font-weight-lighter"> 
								<del> ${oprice} Ks </del> </p>`
								}
								else
								{
									shoppingcartData+=`<p class="text-danger"> 
									${price} Ks
								</p>`
								}
							shoppingcartData+=`</td>
							<td>
								${subtotal} Ks
							</td>
						</tr>`
		 			total+=subtotal++;

		 		});
		 		$('#shoppingcart_table').html(shoppingcartData);

		 	}
		 	else
		 	{
		 		$('.shoppingcart_div').hide();
		 		$('.noneshoppingcart_div').show();
		 	}
		 }
		 else
		 {
		 	$('.shoppingcart_div').hide();
		 	$('.noneshoppingcart_div').show();
		 }
	}
	$('#shoppingcart_table').on('click','.plus_btn',function () {
		var id=$(this).data('id');
		
		var itemString=localStorage.getItem('cart');

		var itemArray=JSON.parse(itemString);
		$.each(itemArray,function (i,v) {
			if (i==id) {
				v.qty++;
			}
		})
		cart=JSON.stringify(itemArray);
		localStorage.setItem("cart", cart);
		cartNoti();
		showTable();
	
	})
		$('#shoppingcart_table').on('click','.minus_btn',function () {

		var id=$(this).data('id');
		var itemString=localStorage.getItem('cart');
		// console.log(itemString);
		var itemArray=JSON.parse(itemString);
		$.each(itemArray,function (i,v) {
			// console.log(itemArray);
			if(i==id) {
				v.qty--;
				if(v.qty==0) { 
					//console.log("yes you are");
					itemArray.splice(i,1);
				}

			}
		})
		// console.log(itemArray);
		cart=JSON.stringify(itemArray);
		localStorage.setItem("cart", cart);
		cartNoti();
	showTable();

	})
	$('#shoppingcart_table').on('click','.remove',function () {

		var id=$(this).data('id');

		var itemString=localStorage.getItem('cart');
		// console.log(itemString);
		var itemArray=JSON.parse(itemString);
		$.each(itemArray,function (i,v) {
			// console.log(itemArray);
			if(i==id) {
				
					//console.log("yes you are");
					itemArray.splice(i,1);
				

			}
		})
		// console.log(itemArray);
		cart=JSON.stringify(itemArray);
		localStorage.setItem("cart", cart);
		cartNoti();
		showTable();

	})

	$('.checkoutbtn').on('click',function () {
		var cart=localStorage.getItem('cart');
		var cartArray=JSON.parse(cart);
		var note=$('#notes').val();
		// var total=$(this).data('total');

		$.post('storeorder.php',{cart:cartArray,note:note},
			function (response) {
				localStorage.clear();
				location.href="ordersuccess.php";
			})

	});
})