<script>
let long;
let lat;
window.addEventListener('load',()=>{
      
    
});

        // snackbar function
    function myFunction() {
        // Get the snackbar DIV
        let x = document.getElementById("snackbar");

        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
    }


$(document).ready(function(){
        
    // sends product id and adds in cart
	$("body").delegate("#product","click",function(event){
		event.preventDefault();
		let p_id = $(this).attr('pid');
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {addToCart:1, prodId:p_id},
			success: function(data){
                //creating dom to change the snackbar color
                let dom = document.getElementById("snackbar");
                if(data == 'Product Added Successfully'){
                	dom.style="background-color: #27ae60";
                }
                else{
                	dom.style="background-color: #e67e22";
                }

                //
                $("#snackbar").html(data);
                myFunction(data);//function for snackbar
			}

		})
	})
	
})

// gets cart products .. used for cart dropdown
// $("#cart_container").click(function(event){
	$(document).on('click','#cart_container',function(){
		event.preventDefault();
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {get_cart_product:1},
			success: function(data){
				$("#cart_product").html(data);
			}
		})
	})

cart_checkout();
  // returns total sum to cart page
	function cart_checkout(){
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {cart_checkout:1},
			success: function(data){
				$("#cart_checkout").html(data);
				
			}
		})
	}

	// getLocation();
	// $(document).on('click','#checkout',function(){
	// 	checkout();
	// })
	// function checkout(){
	// 	let total = $('#total').attr('data-id');
	// 	if(navigator.geolocation){
    //     navigator.geolocation.getCurrentPosition(position=>{
    //         long = position.coords.longitude;
	// 		lat = position.coords.latitude;
			
	// 	$.ajax({
	// 		url: "action.php",
	// 		method: "POST",
	// 		data: {checkout:1,lat:lat,long:long,total:total},
	// 		success: function(data){
	// 			$("#checkout_div").html(data);
	// 		}
	// 	})
	// 	});
		
	// 	}
	// }

	

// funtion to update total amount by keyup event
$("body").delegate(".qty","keyup",function(){
		let pid = $(this).attr("pid"); // here this represents .qty class which has pid attribute
		let qty = $("#qty-"+pid).val();
		let price = $("#price-"+pid).val();
		let total = qty * price;
		$("#total-"+pid).val(total);

	})

// removing items from cart
$("body").delegate(".remove","click",function(){
		event.preventDefault();
		let pid = $(this).attr('remove_id');
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {removeFromCart: 1,removeId:pid},
			success: function(data){
        //creating dom to change the snackbar color
        let dom = document.getElementById("snackbar");
        dom.style="background-color: #e74c3c";
        $("#snackbar").html(data);
        myFunction(data);
				// $("#cart_msg").html(data);
				cart_checkout();
				cart_count();
			}
		})
	})

  // updating products 
	$("body").delegate(".update","click",function(){
		event.preventDefault();
		let pid = $(this).attr('update_id');
		let qty = $("#qty-"+pid).val(); // these id are given in action.php to items in cart.php
		let price = $("#price-"+pid).val();
		let total = $("#total-"+pid).val();
		$.ajax({
			url: "action.php",
			method: "POST",
			data: {updateProduct:1,updateId:pid,qty:qty,price:price,total:total},
			success: function(data){
        //creating dom to change the snackbar color
        let dom = document.getElementById("snackbar");
        dom.style="background-color: #27ae60";
        $("#snackbar").html(data);
        myFunction(data);
				// $("#cart_msg").html(data);
				cart_checkout();
			}
		})
	})



</script>

