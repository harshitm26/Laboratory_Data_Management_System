function alerts(){
	alert("hello");
}

function displayReportsHome(){
	//alert("displayReportsHome()");
	$.ajax({
		url: "getallreports.php",
		type: "post",
		data: {},
		error:function(){
			//alert("error in displaying home initially");
		},
		success: function(data){
			//console.log(data);
			$('#displayallreports').html(data);
		},
		beforeSend: function() {
			$('#loadmsg').html('Please wait');
			$('#loader').show();
		},
		complete: function() {
			$("#loader").hide();
		}
	});
}

function verifyReport(title, username, parentusername, decision){
	//alert("manageReports " + username);
	$.ajax({
		url: "verifyreport.php",
		type: "post",
		data: {'username':username,'title':title, 'decision':decision},
		error:function(){
			alert("error in Verification");
		},
		success: function(data){
			console.log(data);
			manageReports(parentusername);
			//$('#reviewDiv').html(data);
		},
		beforeSend: function() {
			$('#loadmsg').html('Saving Changes');
			$('#loader').show();
		},
		complete: function() {
			$("#loader").hide();
		}
	});
}
function manageReports(username){
	//alert("manageReports " + username);
	$.ajax({
		url: "managereports.php",
		type: "post",
		data: {'username':username},
		error:function(){
			alert("error in displaying review reports");
		},
		success: function(data){
			//console.log(data);
			$('#reviewDiv').html(data);
		},
		beforeSend: function() {
			$('#loadmsg').html('Please wait');
			$('#loader').show();
		},
		complete: function() {
			$("#loader").hide();
		}
	});
}

function displayReportsPersonal(username){
	//alert("displayreportspersonal " + username);
	$.ajax({
		url: "getreports.php",
		type: "post",
		data: {'username':username},
		error:function(){
			//alert("error in displaying personal reports");
		},
		success: function(data){
			//console.log(data);
			$('#displaypersonalreports').html(data);
		},
		beforeSend: function() {
			$('#loadmsg').html('Please wait');
			$('#loader').show();
		},
		complete: function() {
			$("#loader").hide();
		}
	});
}

function navview(nav,username){
	//alert("navview username---> " + username);
	if(nav == 'personal'){
		displayReportsPersonal(username);
	}
	if(nav =='home'){
		displayReportsHome();
	}
	if(nav =='manage'){
		manageReports(username);
	}
	if($('#home').hasClass('active')){
		$('#home').removeClass('active');
		$('#homeDiv').css('display','none');
	}
	if($('#personal').removeClass('active')){
		$('#personal').removeClass('active');	
		$('#personalDiv').css('display','none');
	}
	if($('#manage').removeClass('active')){
		$('#manage').removeClass('active');
		$('#manageDiv').css('display','none');
	}
	$('#'+nav).addClass('active');
	$('#'+nav+'Div').css('display','block')
}

function tabview(nav,username){
	navview('manage',username);
	$('#reviewDiv').hide();
	$('#accountsDiv').hide();
	clearDetails();
	$('#'+nav+'Div').show();
}

function showpi(){
	$.ajax({
		url: "getpi.php",
		type: "get",
		data: "",
		error:function(){
			alert("error obtaining PIs");
		},
		success: function(data){
			$('ul#pilist').html("<li>\
										<a href='#' id='pi-none'>\
											NONE\
										</a>\
									</li>\n" + data);
			//console.log(data);

			$(".dropdown-menu li a").click(function(){
			var selText = $(this).text();
			$(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
			});
		}
	});
}

function clearEditor(){
	$("#editor").html("");
}

function clearReport(){
	clearEditor();
	$('#reportTitle').val('');
	$('#reportDescription').val('');
	$('#reportTitleDiv').removeClass('error');
	$('#reportDescriptionDiv').removeClass('error');
	$('#titleCheck').html('');
	$('#descriptionCheck').html('');
}

function editreport(title,description){
	//alert("editreports " + title + "  "+  description);
	clearReport();
	$('#reportDescription').val(description);
	$('#reportTitle').val(title);
	title = title.replace(' ','');
	content = $('#personalcontent_' + title).html();
	$("#editor").html(content);
	//$('#myModal').attr('aria-hidden','false');
}

function saveReport(username){
	title = $('#reportTitle').val();
	description = $('#reportDescription').val();
	content = $('#editor').html();
	//alert(content);
	if(title == ""){
		$('#reportTitleDiv').addClass('error');
		$('#titleCheck').html('Title cannot be empty');
		return;
	}
	if(description == ""){
		$('#reportDescriptionDiv').addClass('error');
		$('#descriptionCheck').html('Description cannot be empty');
		return;
	}
	$.ajax({
		url: "savereport.php",
		type: "POST",
		data: {'username':username,'title':title, 'description':description, 'content':content},
		error:function(){
			alert("error in addition of Reports to database");
		},
		success: function(data){
			console.log(data);
			displayReportsPersonal(username);
			return true;
		},
		beforeSend: function() {
			$('#loadmsg').html('Saving Changes');
			$('#loader').show();
		},
		complete: function() {
			$('#myModal').modal('hide');
			$("#loader").hide();
		}
	});
}

function searchIn(username){
	var query = $('#searchString').val();
	if(query == "" || typeof(query) == "undefined"){
		alert('Please enter a search term');
		return;
	}
	//alert('search called for '+username+' with '+query);
	$.ajax({
		url: "search.php",
		type: "POST",
		data: {'username':username,'searchString':query},
		error:function(){
			alert("error in searching database");
		},
		success: function(data){
			//console.log(data);
			//displayReportsPersonal(username);
			$('#displaypersonalreports').html(data);
			return true;
		},
		beforeSend: function() {
			$('#loadmsg').html('Searching...');
			$('#loader').show();
		},
		complete: function() {
			$("#loader").hide();
		}
	});
}

function search(){
	var query = $('#searchAllString').val();
	if(query == "" || typeof(query) == "undefined"){
		alert('Please enter a search term');
		return;
	}
	//alert('search called + 'with '+query);
	$.ajax({
		url: "searchall.php",
		type: "POST",
		data: {'searchString':query},
		error:function(){
			alert("error in searching database");
		},
		success: function(data){
			//console.log(data);
			//displayReportsPersonal(username);
			$('#displayallreports').html(data);
			return true;
		},
		beforeSend: function() {
			$('#loadmsg').html('Searching...');
			$('#loader').show();
		},
		complete: function() {
			$("#loader").hide();
		}
	});
}

function register(){
	var pi = $("#piValue").text();
	pi = pi.trim();
	var username = $("#inputUsernameRegister").val();
	var firstname = $("#inputFirstnameRegister").val();
	var lastname = $("#inputLastnameRegister").val();
	var email = $("#inputEmailRegister").val();
	var password1 = $("#inputPasswordRegister1").val();
	var password2 = $("#inputPasswordRegister2").val();
	//alert (username + " $ " + firstname + " $ "+ lastname + " $ "+ email  + " $ "+ password1 + " $ "+ password2 + " $ " + pi);
	error = false;
	if(username == "" || typeof(username) == "undefined"){
		$('#inputUsernameRegisterDiv').addClass('error');
		$('#availabilityStatus').html('Username cannot be empty');
		error = true;
	}
	if($('#inputUsernameRegisterDiv').hasClass('error')){
		error = true;
	}
	if(firstname=="" || typeof(firstname)  == "undefined"){
		$('#inputFirstnameRegisterDiv').addClass('error');
		$('#firstnameCheck').html('Firstname cannot be empty');	
		error = true;
	}
	if(password1 == "" || typeof(password1) == "undefined"){
		$('#inputPasswordRegister1Div').addClass('error');
		$('#password1Check').html('Password cannot be empty');
		error = true;
	}
	if(password1 != password2){
		$('#inputPasswordRegister2Div').addClass('error');
		$('#password2Check').html('Passwords should match!');
		error = true;
	}
	if((pi.indexOf("Select Personal Investigator") !== -1) || typeof(pi)  == "undefined"){
		$('#piValueDiv').addClass('error');
		$('#piCheck').html('Please select a PI');	
		error = true;
	}
	if(error){
		$('#userRegistrationMessageC').hide();
		return false;
	}
	//alert("calling register.php");
	$.ajax({
		url: "register.php",
		type: "POST",
		data: {'username':username,'firstname':firstname, 'lastname':lastname, 'emailid':email, 'password1':password1, 'pi':pi},
		error:function(){
			alert("error registering user");
		},
		success: function(data){
			console.log(data);
			clearDetails();
			$('#userRegistrationMessage').html('User Registered Successfully');
			$('#userRegistrationMessageC').show();
			$('#userRegistrationMessageC').css('margin','');
			$('#registersuccessicon').show();
			return true;
		},
		beforeSend: function() {
			$('#loader').show();
			$('#loadmsg').html('Creating Account');
		},
		complete: function() {
			$("#loader").hide();
		}
	});
	//alert("Registered");
}

function clearDetails(){
	$('form#registerUser')[0].reset();
	$('#inputUsernameRegisterDiv').removeClass('error success');
	$('#inputFirstnameRegisterDiv').removeClass('error');
	$('#inputPasswordRegister1Div').removeClass('error');
	$('#inputPasswordRegister2Div').removeClass('error');
	$('#piValueDiv').removeClass('error');
	$('#availabilityStatus').html('');
	$('#firstnameCheck').html('');
	$('#password1Check').html('');
	$('#password2Check').html('');
	$('#piCheck').html('');
	$('#userRegistrationMessageC').hide();
}

function addComment(username,title,title_stripped,verified){
	//alert(username+'|'+title+'|'+title_stripped+'|'+verified);
	if(verified==1)
		selector = '#all_';
	else
		selector = '#review_';
	selector = selector + title_stripped + '>div.commentsDiv>div>input.ctext';
	var comment = $(selector).val();
	if(comment == "" || typeof(comment) == "undefined"){
		alert('Please enter some text');
		return;
	}
	$.ajax({
		url: "addcomment.php",
		type: "POST",
		data: {'username':username,'title':title,'verified':verified,'comment':comment},
		error:function(){
			alert("error adding comment");
		},
		success: function(data){
			//console.log(data);
			if(verified==0)
				tabview('review',data);	// data returned is current user
			else
				displayReportsHome();
		},
		beforeSend: function() {
			$('#loader').show();
			$('#loadmsg').html('Updating...');
		},
		complete: function() {
			$("#loader").hide();
		}
	});
}

var temp;
temp=new XMLHttpRequest();

$(document).ready(function() {
		$('#editor').wysiwyg();
		displayReportsHome();

		$("#inputUsernameRegister").blur(function() {
			var username = $("#inputUsernameRegister").val();
			var params = "username=" + username;
			temp.open("POST", "checkusername.php", true);
			temp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			if(username==''){
				$('#inputUsernameRegisterDiv').removeClass('success');
				$('#inputUsernameRegisterDiv').removeClass('error');
				$('#availabilityStatus').html('');
			}
			else{
				temp.onreadystatechange=function(){
					if(temp.readyState==4 && temp.status==200){
						// document.getElementById('temp').innerHTML=temp.responseText;
						if(temp.responseText != "0"){
							$('#inputUsernameRegisterDiv').removeClass('success');
							$('#inputUsernameRegisterDiv').addClass('error');
							$('#availabilityStatus').html('Username is not available');
							// $("<span class='help-inline'>Username is already taken</span>").insertAfter($('#inputUsernameRegister'));
						}
						else{
							$('#inputUsernameRegisterDiv').addClass('success');
							$('#inputUsernameRegisterDiv').removeClass('error');
							$('#availabilityStatus').html('Username available');
						}
						
					}
				}
				temp.send(params);
			}
		});
	}
);



function convertToPdf(){
	title = $('#reportTitle').val();
	description = $('#reportDescription').val();
	content = $('#editor').html();
	$.ajax({
		url: "converttopdf.php",
		type: "POST",
		data: {'title':title, 'description':description, 'content':content},
		error:function(){
			alert("error in conversion to pdf");
		},
		success: function(data){
			console.log(data);
			//$('#showpdf').html(data);
			//displayReportsPersonal(username);
			window.open("temp/output.pdf", "PDF Preview");
			return true;
		},
		beforeSend: function() {
			$('#loadmsg').html('Converting');
			$('#loader').show();
		},
		complete: function() {
			$("#loader").hide();
		}
	});
}