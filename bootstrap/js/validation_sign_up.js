
$( document ).ready(function() {

/**
* When user reloads the page,the MainContent division will be blank,
* So at this time,to prevent loading blank page,
* the page on which user was,is loaded back to main content division
* 
*/
if(($('#MainContent').text()).trim() == "")
{
	var s = $.ajax({
	method:"POST",
	url:"user.php?page=page",
	success:function(){
	var page = (s.responseText ).trim() ;
	console.log(page);
	
	if(page === 'viewall' || page === 'create' || page === 'menu_create' || page === 'menu_view' )
	{
		console.log(page);
		$('#' + page).click();
	}
	else
	if(page === 'view_menu_details')
	{
		
		$.ajax({
		type: "POST",
		url: "menu.php?page=form_menu_view",
		data: "",
		success: function(data) {
			$('#MainContent').empty();
			$('#MainContent').append(data);
			//console.log(data);
		},
		error: function(){
			  alert('error handing here');
		}
		});
	}	
	
	else
	if(page === 'view_form')
	{
		$.ajax({
		type: "POST",
		url: "user.php?page=view",
		data: "",
		success: function(data) {
			$('#MainContent').empty();
			$('#MainContent').append(data);
		},
		error: function(){
			  alert('error handing here');
		}
		});
		$('#header').text("View User");
		$('#description').text("User Related Details");
		$('#level').text("User");
		$('#current').text("View");
	}
	else
	if (page === 'edit_menu_form')
	{
		$.ajax({
		type: "POST",
		url: "user.php?page=edit_menu_form",
		data: "",
		success: function(data) {
			$('#MainContent').empty();
			$('#MainContent').append(data);
		},
		error: function(){
			  alert('error handing here');
		}
		});
		$('#header').text("View User");
		$('#description').text("User Related Details");
		$('#level').text("User");
		$('#current').text("View");	
	}		
	
	}});
}

$('#create').css('cursor','pointer');
$('#create').css('cursor','pointer');

/**
* 
* It will handle the click on 'Create User' Link
* It loads the create/edit user form to main division of the page.
* 
*/
$('body').on("click","#create",function() {
	var s = $.ajax({
	method:"POST",
	url:"user.php?page=create",
	success:function(){
	//console.log(s.responseText);
	$('#MainContent').empty();
	$('#MainContent').append(s.responseText);
	document.title = "Create / Edit";
	$('#header').text("Create User");
	$('#description').text("Add new user");
	$('#level').text("User");
	$('#current').text("Create");
	
	
	}});	
});

/**
* 
* It will handle the submission of the edit/create form
* If all goes fine,the view page is displayed 
* otherwise it displays the error along with the previous form.
* 
*/
$('body').on("submit","#form",function( event ) {
	
	event.preventDefault();
	var form_data = $(this).serialize() ;
	
	var page;
	if(jQuery('input[name="edit_id"]').val())
		page = "edit";
	else page = "save";
	//console.log(page);
	$.ajax({
            type: "POST",
            url: "user.php?page=" + page,
            data: form_data,
            success: function(data) {
				$('#MainContent').empty();
				$('#MainContent').append(data);
				//console.log(form_data);
            },
            error: function(){
                  alert('error handing here');
            }
        });
  
});
/**
* 
* It is for showing the search result if searched by department.
* 
*/
$( 'body').on("submit","#form_1",function( event ) {
	event.preventDefault();
	var form_data = $(this).serialize() ;
	
	$.ajax({
            type: "POST",
            url: "user.php?page=view_all",
            data: form_data,
            success: function(data) {
				$('#MainContent').empty();
				$('#MainContent').append(data);
				//console.log(form_data);
            },
            error: function(){
                  alert('error handing here');
            }
        });
  
});
/**
* 
* It is for showing the search result if searched by pattern of ID.
* 
*/

$('body').on("submit","#form_2",function( event ) {
	
	event.preventDefault();
	var form_data = $(this).serialize() ;
	$.ajax({
            type: "POST",
            url: "user.php?page=view_all",
            data: form_data,
            success: function(data) {
				$('#MainContent').empty();
				$('#MainContent').append(data);
			},
            error: function(){
                  alert('error handing here');
            }
        });
  
});

/**
* 
* It is for showing the search result if searched by pattern of Name.
* 
*/

$('body').on("submit","#form_3",function( event ) {
	
	event.preventDefault();
	var form_data = $(this).serialize() ;
	$.ajax({
            type: "POST",
            url: "user.php?page=view_all",
            data: form_data,
            success: function(data) {
				$('#MainContent').empty();
				$('#MainContent').append(data);
			},
            error: function(){
                  alert('error handing here');
            }
        });
  
});


/**
* 
* It sets the content of the main page to details if a particular user,whichever is selected.
* 
*/

$('body').on("submit",".view_form",function( event ) {
	
	event.preventDefault();
	var form_data = $(this).serialize() ;
	//console.log(form_data);
	$.ajax({
            type: "POST",
            url: "user.php?page=view",
            data: form_data,
            success: function(data) {
				$('#MainContent').empty();
				$('#MainContent').append(data);
			},
            error: function(){
                  alert('error handing here');
            }
        });
	$('#header').text("View User");
	$('#description').text("User Related Details");
	$('#level').text("User");
	$('#current').text("View");
	
  
});

/**
* 
* It is for showing the form where user details can be edited.
* 
*/

$('body').on("submit",".edit_form",function( event ) {
	
	event.preventDefault();
	var form_data = $(this).serialize() ;
	//console.log(form_data);
	$.ajax({
            type: "POST",
            url: "user.php?page=create",
            data: form_data,
            success: function(data) {
				$('#MainContent').empty();
				$('#MainContent').append(data);
			},
            error: function(){
                  alert('error handing here');
            }
        });
	$('#header').text("Edit");
	$('#description').text("Edit Details of the Existing one");
	$('#level').text("User");
	$('#current').text("Edit");
	
});

/**
* 
* It is performs the deletion of a user.
* 
*/
$('body').on("submit",".del_form",function( event ) {
	event.preventDefault();
	var form_data = $(this).serialize() ;
	console.log(form_data);
	$.ajax({
            type: "POST",
            url: "user.php?page=delete",
            data: form_data,
            success: function(data) {
				$('#MainContent').empty();
				$('#MainContent').append(data);
				$('.modal-backdrop').remove();
				
            },
            error: function(){
                  alert('error handing here');
            }
        });
  
});

/**
* 
* It is for showing the list of all users currently available in the database.
* 
*/
$('body').on("click","#viewall",function() {
	var view = $.ajax({
			method:"POST",
			url:"user.php?page=view_all",
			success:function(){
			//console.log(view.responseText);
			$('#MainContent').empty();
			
			$('#MainContent').append(view.responseText);
			document.title = "Existing Users";
			$('#header').text("Existing Users");
			$('#description').text("List of all Users");
			$('#level').text("User");
			$('#current').text("View All");
	
			}});
});
$('body').on("click","#sign_up_btn",function() {
	$('#sign_up_btn').attr("type","submit");
});



/**
* 
* It sets the value of Model content(the one which appears while deleting a user)
*
*/
$('body').on("click","button[name=del]",function() {
	
	//console.log($('#del').val());
	$('#usr').empty();
	$('#edit_id').val($(this).siblings('#del_id').val()); 
	$('#edit_group').val($(this).siblings('#del_group').val());
	$('#usr').append($(this).siblings('#del_name').val());
	
});

/*
* 
* for handling validations on name filled in the form	
*/
$('body').on("blur","#sign_up_name",function() {
	
    if ($(this).val().match('^[a-zA-Z ]*$')) {
		if($(this).val().length >= 4)
        {
			$(this.parentNode).removeClass('has-error');
			$(this).siblings(".control-label").remove();
			$(this.parentNode).addClass('has-success');
			$(this.parentNode).append('<label class="control-label"><i class="fa fa-check"></i> Name is correct</label>');
			name = 1;
		}
		else {
			$(this.parentNode).removeClass('has-success');
			$(this).siblings(".control-label").remove();
			name = 0;
			$(this.parentNode).addClass('has-error');
			$(this.parentNode).append('<label class="control-label"><i class="fa fa-times-circle-o"></i> The length of name must be more than 3</label>');
		}
    } else {
        $(this.parentNode).removeClass('has-success');
		$(this).siblings(".control-label").remove();

        $(this.parentNode).addClass('has-error');
		$(this.parentNode).append('<label class="control-label"><i class="fa fa-times-circle-o"></i> Invlaid name.Please Use Alphabets and spaces only</label>');
    }
});

/*
* 
* for handling validations on user_name filled in the form and for
* checking if the user already exists
*/
$('body').on("blur","#sign_up_user",function() {
     if ($(this).val().match('^[a-zA-Z0-9._]*$')) {
		
		if($(this).val().length >= 4)
        {
			var username = $(this).val();
			/* $.ajax({
				url: url,
				data: data,
				success: success,
				dataType: dataType
			}); */
			var s = $.post("user.php?page=check", { username: username },  
             function(result){  
				
				ss = result.slice(-1);
                if(ss == 0){  
				
                $("#aaa").removeClass('has-error');
				$("#aaa").children(".control-label").remove();
				$("#aaa").addClass('has-success');
				$("#aaa").append('<label class="control-label"><i class="fa fa-check"></i> User Name is correct</label>'); 
				}
				else
				{  
				
				
                $("#aaa").removeClass('has-success');
				$("#aaa").children(".control-label").remove();
				$("#aaa").addClass('has-error');
				$("#aaa").append('<label class="control-label"><i class="fa fa-times-circle-o"></i> This UserName is not Avialable.Use other one.</label>');
                }   
			}); 
		
			
		}
		else {
			$(this.parentNode).removeClass('has-success');
			$(this).siblings(".control-label").remove();

			$(this.parentNode).addClass('has-error');
			$(this.parentNode).append('<label class="control-label"><i class="fa fa-times-circle-o"></i> The length of user name must be more than 3</label>');
		}
    } else {
        $(this.parentNode).removeClass('has-success');
		$(this).siblings(".control-label").remove();

        $(this.parentNode).addClass('has-error');
		$(this.parentNode).append('<label class="control-label"><i class="fa fa-times-circle-o"></i> Invlaid name.Please Use Alphabets,digits,Underscore(_) and dots(.) only</label>');
    }
});

/*
* 
* for handling validations on e-mail filled in the form	
*/
$('body').on("blur","#sign_up_mail",function() {
     if ($(this).val().match('^[a-zA-Z0-9._]+[@]{1}[a-zA-Z0-9]+[.]{1}[a-zA-Z]+$')) {
			$(this.parentNode).removeClass('has-error');
			$(this).siblings(".control-label").remove();
			$(this.parentNode).addClass('has-success');
			$(this.parentNode).append('<label class="control-label"><i class="fa fa-check"></i> Mail Address Is valid</label>');
    } else {
        $(this.parentNode).removeClass('has-success');
		$(this).siblings(".control-label").remove();

        $(this.parentNode).addClass('has-error');
		$(this.parentNode).append('<label class="control-label"><i class="fa fa-times-circle-o"></i> Invlaid mail address</label>');
    }
});

/*
* 
* for handling validations on group filled in the form	
*/
$('body').on("blur","#sign_up_group",function() {
	    if ($(this).val().length > 0) {
			$(this.parentNode).removeClass('has-error');
			$(this).siblings(".control-label").remove();
			$(this.parentNode).addClass('has-success');
			$(this.parentNode).append('<label class="control-label"><i class="fa fa-check"></i> Department is valid</label>');
    } else {
        $(this.parentNode).removeClass('has-success');
		$(this).siblings(".control-label").remove();

        $(this.parentNode).addClass('has-error');
		$(this.parentNode).append('<label class="control-label"><i class="fa fa-times-circle-o"></i> Please Select Department</label>');
    }
});

/*
* 
* for handling validations on passwords filled in the form	
*/
$('body').on("blur","#sign_up_pwd1,#sign_up_pwd2",function() {
if($(this).val().indexOf("'") === -1 && $(this).val().indexOf('"') === -1 )
{
   	if($(this).val().length >= 6)
        {
			$(this.parentNode).removeClass('has-error');
			$(this).siblings(".control-label").remove();
			
			if($('#sign_up_pwd1').val().length < 6 || $('#sign_up_pwd2').val().length < 6)
			{
				$(this.parentNode).addClass('has-success');
				$(this.parentNode).append('<label class="control-label"><i class="fa fa-check"></i> Password is valid</label>');
			}
			else
			{
				if($('#sign_up_pwd1').val() === $('#sign_up_pwd2').val())
				{
					$(this.parentNode).addClass('has-success');
					$(this.parentNode).append('<label class="control-label"><i class="fa fa-check"></i> Passwords Matched</label>');
				}
				else {
					$(this.parentNode).addClass('has-error');
					$(this.parentNode).append('<label class="control-label"><i class="fa fa-times-circle-o"></i>Passwords Do Not Match</label>');
				}
			}
		}
		else {
			$(this.parentNode).removeClass('has-success');
			$(this).siblings(".control-label").remove();

			$(this.parentNode).addClass('has-error');
			
			$(this.parentNode).append('<label class="control-label"><i class="fa fa-times-circle-o"></i> The length of password must be more than 6.Please Use a Strong Password</label>');
			
		}
  
} 	else
	{
        $(this.parentNode).removeClass('has-success');
		$(this).siblings(".control-label").remove();
        $(this.parentNode).addClass('has-error');
		$(this.parentNode).append('<label class="control-label"><i class="fa fa-times-circle-o"></i> Invlaid Password.Please Do Not use Single and Double inverted Commas in Password</label>');
    }
	
	});
	
	/**
	*
	* Starting the jquery data handling for user menus
	*
	*/
	
	$('#menu_create').css('cursor','pointer');
	$('#menu_view').css('cursor','pointer');
	
	
	
	$('body').on("click","#menu_create", function() {
		var s = $.ajax({
	method:"POST",
	url:"menu.php?page=create_menu",
	success:function(){
	//console.log(s.responseText);
	$('#MainContent').empty();
	$('#MainContent').append(s.responseText);
		document.title = "Create / Edit";
	$('#header').text("Create User");
	$('#description').text("Add new user");
	$('#level').text("User");
	$('#current').text("Create");
	
	
	}});			
	});
	
	$('body').on("click","#menu_view", function() {
		var s = $.ajax({
	method:"POST",
	url:"menu.php?page=view_menu",
	success:function(){
	//console.log(s.responseText);
	$('#MainContent').empty();
	$('#MainContent').append(s.responseText);
	document.title = "Create / Edit";
	$('#header').text("Create User");
	$('#description').text("Add new user");
	$('#level').text("User");
	$('#current').text("Create");
	
	
	}});			
	});
	
	$('body').on( "click","input[type=checkbox]", function() {
		if($(this).val() === "a")
		{
			if($(this).is(':checked'))
			var val = true;
			else
			var val = false;
			var name = $(this).attr("name");
			
			$("input[name='"+name+"']").each( function () {
				$(this).prop('checked',val);
			});
		}
		else
		{
			var name = $(this).attr("name");
			$("input[name='"+name+"'][value='a']").each( function () {
				$(this).prop('checked',false);
			});
		}
	});
	
	$('body').on("blur","#menu,#order",function() {
		
		if($(this).val().length)
        {
			$(this.parentNode).removeClass('has-error');
			$(this).siblings(".control-label").remove();
			$(this.parentNode).addClass('has-success');
			$(this.parentNode).append('<label class="control-label"><i class="fa fa-check"></i> Value of '+$(this).attr("id")+' is Valid </label>');
		}
		else
		{  
		    $(this.parentNode).removeClass('has-success');
			$(this).siblings(".control-label").remove();
			$(this.parentNode).addClass('has-error');
			$(this.parentNode).append('<label class="control-label"><i class="fa fa-times-circle-o"></i> Do not leave this field empty</label>');
	    }   
	});
	
	$('body').on("blur",".checkbox",function() {
		var i = 0;
		$("input[type=checkbox]").each( function () {
			if($(this).prop('checked') == true )
			i ++;			
		});
		i--;
		if(i)
        {
			$("#chk").removeClass('has-error');
			$("#chk").empty();
			$("#chk").addClass('has-success');
			$("#chk").append('<label class="control-label"><i class="fa fa-check"></i> You have setted permissions. </label>');
		}
		else
		{  
		    $("#chk").removeClass('has-success');
			$("#chk").empty();
			$("#chk").addClass('has-error');
			$("#chk").append('<label class="control-label"><i class="fa fa-times-circle-o"></i> Warning : You Have NOT ALLOWED anyone to access this menu except superadmin');
	    }   
	});
	$('body').on("change",".checkbox",function() {
		$('.checkbox').blur();
	});
	
	$('body').on("submit","#menu_form",function( event ) {
	event.preventDefault();
	var form_data = $(this).serialize() ;
	console.log(form_data);
	$.ajax({
            type: "POST",
            url: "menu.php?page=create_menu",
            data: form_data,
            success: function(data) {
				$('#MainContent').empty();
				$('#MainContent').append(data);
			
            },
            error: function(){
                  alert('error handing here');
            }
        });  
	});

	$('body').on("submit",".form_menu_view",function( event ) {
	event.preventDefault();
	var form_data = $(this).serialize() ;
	//console.log(form_data);
	$.ajax({
            type: "POST",
            url: "menu.php?page=form_menu_view",
            data: form_data,
            success: function(data) {
				$('#MainContent').empty();
				$('#MainContent').append(data);
			
            },
            error: function(){
                  alert('error handing here');
            }
        });  
	});
	
	$('body').on("submit",".del_menu_form",function( event ) {
	
	event.preventDefault();
	var form_data = $(this).serialize() ;
	console.log(form_data);
	$.ajax({
            type: "POST",
            url: "menu.php?page=del_menu_form",
            data: form_data,
            success: function(data) {
				$('#MainContent').empty();
				$('#MainContent').append(data);
				$('.modal-backdrop').remove();
				$('body').removeAttr('style');
				$('body').removeClass('modal-open');
            },
            error: function(){
                alert('error handing here');
            }
        });  
	});
	
	$('body').on("submit",".edit_menu_form",function( event ) {
	event.preventDefault();
	var form_data = $(this).serialize() ;
	console.log(form_data);
	$.ajax({
            type: "POST",
            url: "menu.php?page=edit_menu_form",
            data: form_data,
            success: function(data) {
				$('#MainContent').empty();
				$('#MainContent').append(data);
			
            },
            error: function(){
                  alert('error handing here');
            }
        });  
	});
});