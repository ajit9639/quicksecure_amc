//Adding a submit function to the form 
$('#update-cutomer').submit(function(e){
	
	//Preventing the default behavior of the form 
	//Because of this line the form will do nothing i.e will not refresh or redirect the page 
	e.preventDefault();
	
	//Creating an ajax method
	$.ajax({
		
		//Getting the url of the uploadphp from action attr of form 
		//this means currently selected element which is our form 
		url: $(this).attr('action'),
		
		//For file upload we use post request
		type: "POST",
		
		//Creating data from form 
		data: new FormData(this),
		
		//Setting these to false because we are sending a multipart request
		contentType: false,
		cache: false,
		processData: false,
		success: function(data){
			//If the request is successfull we will get the scripts output in data variable 
			//Showing the result in our html element 
			$('#msg2').fadeIn().html(data);
                           
                          setTimeout(function(){  
                               $('#msg2').fadeOut("Slow");  
                          }, 10000);			
		},
		error: function(){}
	});
});