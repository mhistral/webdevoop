$(document).ready(function(){

	//save with validation
	$("#reg_form").on('submit', function(){
		var regForm = $(this).serializeArray(); //getting the value inside the form
		console.log(regForm);
		// console.log(JSON.parse(JSON.stringify(form)));
		// x = JSON.parse(form);

		$.ajax({
			url: "php/addcustomer.php",
			type: "post",
			data: regForm,
			success: function(data){
					// location.reload();
					alert("added!");
					x = JSON.parse(data);
					// console.log(x);
					// console.log(data);

				//changes the border color for validation
				if (x.passResult.passvalidate == "mismatch"){
					$("#upass").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#repass").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#passNotif").html("Mismatch Password");
				}
				else if(x.passResult.passvalidate == "match"){
					$("#upass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#repass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#passNotif").html("");
				}
				else if(x.passResult.passvalidate == "empty"){
					$("#upass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#repass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#passNotif").html("");
				}

				if (x.emailResult.emailvalidate == "existing email"){
					$("#email").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#emailNotif").html("Existing Email");
				}
				else if(x.emailResult.emailvalidate == "available email"){
					$("#email").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#emailNotif").html("");
				}
				else if(x.emailResult.emailvalidate == "empty"){
					$("#email").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#emailNotif").html("");
				}

				if (x.userResult.unamevalidate == "existing Username"){
					$("#usern").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#userNotif").html("Existing user");
				}
				else if (x.userResult.unamevalidate == "user available"){
					$("#usern").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#userNotif").html("");
				}
				else if(x.userResult.unamevalidate == "empty"){
					$("#email").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#emailNotif").html("");
				}
			}
		});
		return false;
	});

	//action edit and delete
	$('body').on('click', '.btn-action', function(){
		
		var action = $(this).data('action');
		var customerID = $(this).data('client-id');

		var currentRow = $(this).closest("tr");
		var col2 = currentRow.find("td:eq(5)").text(); // get current row 2nd TD
		
		if (action == "edit"){

			//resetting the color of the border
			$("#usern").css('box-shadow', '0px 0px 0px #bd21218c');
			$("#userNotif").html("");
			$("#email").css('box-shadow', '0px 0px 0px #bd21218c');
			$("#emailNotif").html("");
			$("#upass").css('box-shadow', '0px 0px 0px #bd21218c');
			$("#repass").css('box-shadow', '0px 0px 0px #bd21218c');
			$("#passNotif").html("");

			$.ajax({
				url: "php/client_action.php",
				type: "post",
				data: {action:action,customerID:customerID},
				success: function(data){
					$("#myModal").modal();

					var actionClientJSON = JSON.parse(data);
					// console.log(data);
					console.log(actionClientJSON);

					//show data in form
					$("[name='id']").val(actionClientJSON.customer_id);
					$("[name='fname']").val(actionClientJSON.first_name);
					$("[name='lname']").val(actionClientJSON.last_name);
					$("[name='address']").val(actionClientJSON.home_address);
					$("[name='email']").val(actionClientJSON.email_address);
					$("[name='usern']").val(actionClientJSON.username);
					$("[name='upass']").val(actionClientJSON.user_pass);
					$("[name='repass']").val(actionClientJSON.user_pass);
					$("[name='contractStarted']").val(actionClientJSON.contract_start);
					$("[name='contractEnded']").val(actionClientJSON.contract_end);
				}
			});
		}

		else if (action == "delete"){
			if (confirm("Are you sure you sure you want to delete " + col2 + "?")){
				$.ajax({
					url: "php/client_action.php",
					type: "post",
					data: {action:action,customerID:customerID},
					success: function(data){
						var actionClientJSON = JSON.parse(data)
						alert(actionClientJSON.msg);
						location.reload();
						
					}
				});

			}
			else {
				alert('not deleted ' + col2);
			}
		
		}
		
	});

	//edit values and validation goes here

	$('#edit_form').on('submit', function(){
		var editForm = $(this).serialize();

		$.ajax({
			url: "php/editcustomer.php",
			type: "post",
			data: editForm,
			success: function(data){
				editFormJSON = JSON.parse(data);
				console.log(editFormJSON);
				// console.log(data);

				if (editFormJSON.passResult.passvalidate == "mismatch"){
					$("#upass").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#repass").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#passNotif").html("Mismatch Password");
				}
				else if(editFormJSON.passResult.passvalidate == "match"){
					$("#upass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#repass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#passNotif").html("");
				}
				else if(editFormJSON.passResult.passvalidate == "empty"){
					$("#upass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#repass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#passNotif").html("");
				}

				if (editFormJSON.emailResult.emailvalidate == "existing email"){
					$("#email").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#emailNotif").html("Existing Email");
				}
				else if(editFormJSON.emailResult.emailvalidate == "available email"){
					$("#email").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#emailNotif").html("");
				}
				else if(editFormJSON.emailResult.emailvalidate == "empty"){
					$("#email").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#emailNotif").html("");
				}

				if (editFormJSON.userResult.unamevalidate == "existing Username"){
					$("#usern").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#userNotif").html("Existing user");
				}
				else if (editFormJSON.userResult.unamevalidate == "user available"){
					$("#usern").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#userNotif").html("");
				}
				else if(editFormJSON.userResult.unamevalidate == "empty"){
					$("#email").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#emailNotif").html("");
				}

				alert('edited!');
				location.reload();

			}
		});
		return false;
		
	});

	//edit blur
	$(".onBlur").blur(function(){
		var action = $(this).data('action');
		var editFormOnBlur =  $("#edit_form").serialize();

		$.ajax({
			url: "php/editcustomer.php",
			type: "post",
			data: editFormOnBlur,
			success: function(data){
				onblurJSON = JSON.parse(data);
				console.log(onblurJSON);
				// console.log(data);

				if (onblurJSON.passResult.passvalidate == "mismatch"){
					$("#upass").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#repass").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#passNotif").html("Mismatch Password");
				}
				else if(onblurJSON.passResult.passvalidate == "match"){
					$("#upass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#repass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#passNotif").html("");
				}
				else if(onblurJSON.passResult.passvalidate == "empty"){
					$("#upass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#repass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#passNotif").html("");
				}

				if (onblurJSON.emailResult.emailvalidate == "existing email"){
					$("#email").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#emailNotif").html("Existing Email");
				}
				else if(onblurJSON.emailResult.emailvalidate == "available email"){
					$("#email").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#emailNotif").html("");
				}
				else if(onblurJSON.emailResult.emailvalidate == "empty"){
					$("#email").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#emailNotif").html("");
				}

				if (onblurJSON.userResult.unamevalidate == "existing Username"){
					$("#usern").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#userNotif").html("Existing user");
				}
				else if (onblurJSON.userResult.unamevalidate == "user available"){
					$("#usern").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#userNotif").html("");
				}
				else if(onblurJSON.userResult.unamevalidate == "empty"){
					$("#email").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#emailNotif").html("");
				}

			}
		});
		
	});

	//add blur
	$(".Blur").blur(function(){
		var action = $(this).data('action');
		var registerFormOnBlur =  $("#reg_form").serialize();

		$.ajax({
			url: "php/addcustomer.php",
			type: "post",
			data: registerFormOnBlur,
			success: function(data){
				registerformJSON = JSON.parse(data);
				console.log(registerFormOnBlur);
				// console.log(data);

				if (registerformJSON.passResult.passvalidate == "mismatch"){
					$("#upass").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#repass").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#passNotif").html("Mismatch Password");
				}
				else if(registerformJSON.passResult.passvalidate == "match"){
					$("#upass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#repass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#passNotif").html("");
				}
				else if(registerformJSON.passResult.passvalidate == "empty"){
					$("#upass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#repass").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#passNotif").html("");
				}

				if (registerformJSON.emailResult.emailvalidate == "existing email"){
					$("#email").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#emailNotif").html("Existing Email");
				}
				else if(registerformJSON.emailResult.emailvalidate == "available email"){
					$("#email").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#emailNotif").html("");
				}
				else if(registerformJSON.emailResult.emailvalidate == "empty"){
					$("#email").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#emailNotif").html("");
				}

				if (registerformJSON.userResult.unamevalidate == "existing Username"){
					$("#usern").css('box-shadow', '0px 0px 8px #bd21218c');
					$("#userNotif").html("Existing user");
				}
				else if (registerformJSON.userResult.unamevalidate == "user available"){
					$("#usern").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#userNotif").html("");
				}
				else if(registerformJSON.userResult.unamevalidate == "empty"){
					$("#email").css('box-shadow', '0px 0px 0px #bd21218c');
					$("#emailNotif").html("");
				}

			}
		});
		
	});

	$('#addCustomerNav').on('click',function(){
		$(location).attr('href','register.php');
	});
	
	$('#customerList').on('click',function(){
		$(location).attr('href','customerlist.php');
	});
	
});