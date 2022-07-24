jQuery("#validationForm").validate({
	rules:{
		name:{
			required:true,
			minlength:5
		},			
		userName:{
			required:true,
			minlength:6,
			maxlength:10
		},
		password:{
			    required:true,
				minlength:6,
			    maxlength:10
		},
			email:{
			    required:true,
			    email:true			
			},
			
			phone:{
				required:true,
				number:true,
				minlength:10,
				maxlength:10
			},
			
			address:{
				required:true,
				minlength:20
		},

	   },
	messages:{
	      name:{
			required:"Name is required",
			minlength:"Name Minimum 5 char"
		},
		userName:{
			required:"User Name is required",
			minlength:"User Name shoud be 6-10 Char",
			maxlength:"User Name shoud be 6-10 Char"
		},
		password:{
			   required:"Password is required",
			   minlength:"Password shoud be 6-10 Char",
			   maxlength:"Password shoud be 6-10 Char"
		},
		email:{
			required:"Email is required",
			emailId:"Enter valid Email"
		},
		phone:{
			required:"Phone is required", 
			number:"Phone No shoud Numbers",
			minlength:"Phone No shoud be 10 Digit",
			maxlength:"Phone No shoud be 10 Digit"
		},
		
        address:{
			required:"Address is required",
			minlength:"Address should be 20 char"
		},
		
		dob:{
			required:"Date of Birth is required"
		},
		
		/*gender:{
			required:"Gender is required"
		},*/
		
	     },
	
	submitHandler:function(form){
	 form.submit();		
	}
	
});