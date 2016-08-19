
$(document).ready(function() {
	
	$("body").on('hidden.bs.modal','#myModal', function () {
	
	$('#create-status').empty();
	$("#inputtext").val('');
	$("#user-grp-id").click();
	
	
});
$("body").on('hidden.bs.modal','#register-modal', function () {
	
	$('#edit-status').empty();
	$("#edittext").val('');
	//$("#user-grp-id").click();
	
});

	$("body").on('click','.edit-me',function(){
	
var temp=$(this).attr('data');
var arr=temp.split("|||");

		$("#edittext").val(arr[1]);
		/* $('#MainContent').append("<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js'></script><script type='text/javascript' src='bootstrap/js/common.js'></script><script src='bootstrap/js/bootstrap.min.js'></script>");
 */
		$('#register-modal').modal('show');
		$("#usr_grp_id").remove();
		$(".modal-body").append('<input type="hidden" value="'+arr[0]+'" id="usr_grp_id">');


	
});
	
  
$('#user-grp-id').css('cursor','pointer');
if(($('#MainContent').text()).trim() == "")
{
 var s = $.ajax({
 method:"POST",
 url:"group.php?page=page",
 success:function(){
 //console.log(s.responseText);
 var page = (s.responseText ).trim() ; 
  $('#' + page).click();
 
 }});
}



$("body").on('submit',"#modalform",function(event){
					//alert("ergergreg");
					event.preventDefault();
});	

$("body").on('submit',"#modalform2",function(event){
					event.preventDefault();
});	
	
$("body").on('click',"#user-grp-id",function(){
	
	//alert("gikuhguihg");
	 $.ajax({
 method:"POST",
 url:"group.php?page=show",
 success:function(data){
 
 $(".content-header small").remove();
	$(".content-header h1:first").html("Group Details");
  $('#MainContent').empty();
 $('#MainContent').html(data); 
 // document.title = "Show";
 
 }
 });
	
	
});
  
  
  
	$("body").on('click','#select_all',function () {
		//alert("yiugiuygu");
	$(".checkbox12").prop('checked',$(this).prop("checked"));
				var ns = $('#select_all:checked').length;
				//console.log(ns);
	if(ns==1)
	$("#delbtn").show();
	else	$("#delbtn").hide();


});
	$("body").on('click','.checkbox12', function() {
		$('#select_all').prop('checked', false);

			var n = $('input:checkbox:checked').length-1;
			if(n>1)
			$("#delbtn").show();
			else
			$("#delbtn").hide();
	});

 
/*$( "#inputtext" ).focus(function() {
  $( "#sve" ).focus();
}); */ 
/* $('#inputtext').keypress(function(event) {
  if (event.keyCode == '13') {
	  // $( "#sve" ).focus();
       $( "#sve" ).click();// press correct button
   }
});  */

 
});




function createjs(){
	

	
	var newgrp=$("#inputtext").val();
	
	//make validation for edit modal
	 $("#create-status").html('');
	 if (newgrp.match('^[a-zA-Z ]*$')) {
		if(newgrp.trim().length>=2){
			 $("#create-status").html('<label>'+newgrp+'<span style="color:green;"> is added</span></label>');

		}else {
					 $("#create-status").html('<label><span style="color:red;">The length of name must be more than 2</span></label>');

			return;
		}
    } else {
		 $("#create-status").html('<label><span style="color:red;">Invlaid name.Please Use Alphabets and spaces only</span></label>');
		 return;
    }
	//end
	
	
	$.ajax({
			method:"POST",
			url:"group.php?page=create", 
			data:{newgrp:newgrp},                                                                                         
			success:function(data)
	                              
			{
			
				$("#manage_group_table").append('<tr id="row_'+data+'"><td><input type="checkbox" class="checkbox12" id="'+data+'" name="chkbox[]" value="'+data+'"></td><td>'+newgrp+'</td><td><a href="javascript:void(0);" class="edit-me" data="'+data+'|||'+newgrp+'"><i class="fa fa-edit"></i></a></td><td><a href="javascript:void(0);" onclick="deletejs('+data+');"><i class="fa fa-trash"></i></a></td></tr>');
				$("#inputtext").val('');
				},
			error:function(data)
			{
			alert("Something went wrong!");
			}
			});
	
}




function editdata(){
	//alert('tasdas');
	
	var edit_value=$("#edittext").val();
	
	//make validation for edit modal
	 $("#edit-status").html('');
	 if (edit_value.match('^[a-zA-Z ]*$')) {
			if(edit_value.trim().length>=2){
				$("#closeid").click();
			//$("#edit-status").html('<label>'+edit_value+'<span style="color:green;"> is added</span></label>');
		}else {
					 $("#edit-status").html('<label><span style="color:red;">The length of name must be more than 2</span></label>');

			return;
		}
    } else {
		 $("#edit-status").html('<label><span style="color:red;">Invlaid name.Please Use Alphabets and spaces only</span></label>');
		 return;
    }
	//end
	
	var usr_id =$("#usr_grp_id").val();
	
	//alert(usr_id);
	//console.log(edit_value);
	$.ajax({
			method:"POST",
			url:"group.php?page=edit", 
			data:{edit_value:edit_value,edit_id:usr_id},                                                          
			success:function(data)
			{
				//alert(data);
				$("#row_"+usr_id+" td:nth-child(2)").html(edit_value);
				$("#row_"+usr_id+" td:nth-child(3)").html('<a href="javascript:void(0);" class="edit-me" data="'+usr_id+'|||'+edit_value+'"><i class="fa fa-edit"></i></a>');
				//$('#MainContent').empty();
				//$('#MainContent').html(data); 
				//$("#closeid").click();
				 //alert(data);
			//$("#user-grp-id").click();
			//$("body").click();
			},
			error:function(data)
			{
			alert("Something went wrong!");
			}
			});
	
}



function deletejs(delid){
	
	var s = $.ajax({
 method:"POST",
 url:"group.php?page=delete",
 data:{rowid:delid},
 success:function(data){
	
	//alert(s.responseText);
	$("#MainContent").empty();
	$('#MainContent').html(s.responseText).find(".timer").fadeOut(5000);
	/*  $('#MainContent').append("<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js'></script><script type='text/javascript' src='bootstrap/js/common.js'></script>");

 */
 }
 });
	
}
function delchkbox(){
	 var favorite = [];
            $.each($("input:checkbox:checked"), function(){            
               var chkval= favorite.push($(this).val());
				//alert("My favourite sports are: " + $(this).val());
            });
			favorite.pop();
		//console.log(favorite);
            var s=$.ajax({
						type: "POST",
						url: "group.php?page=delchkbox",
						data: {favorite:favorite},
						success: function(data) {
						$('#MainContent').empty();
						$('#MainContent').html(data).find(".timer").fadeOut(5000);
						/* $('#MainContent').append("<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js'></script><script type='text/javascript' src='bootstrap/js/common.js'></script>");
						 *///console.log(data);
						},
						error: function(){
							alert('error handing here');
						}
				});
}
