<?php
	include 'dblink.php';
	session_start();
?>
<?php

?>
    <div class="navbar">
	    <div class="navbar-inner">
		    <ul class="nav">
				<li class="active" id='home'>
					<a href="#" onclick="navview('home');">Home</a>
				</li>
				<li class="divider-vertical"></li>
				<li id='personal'>
					<a href="#" onclick="navview('personal');" >Personal</a>
				</li>
				<li class="divider-vertical"></li>
				<li id='manage'>
					<a href="#" onclick="navview('manage');">Manage</a>
				</li>
			</ul>

			<ul class="nav pull-right">
				<li id="usermsg">
					<a> Welcome <?php echo ucwords($_SESSION['firstname'])." ".ucwords($_SESSION['lastname']);?> !</a>
				</li>
				<li class="divider-vertical"></li>
				<li id="logoutmsg">
					<form action="login.php" method="post" id="logoutform">
						<button type="submit" class="btn btn-inverse">Logout</button>
					</form>
				</li>
			</ul>
 		</div>
    </div>

    <!-- <div class="tabbable tabs-left"> -->
    <div id='homeDiv'>
		<input class="offset2" type="text" x-webkit-speech />
    </div>

    <div id='personalDiv'>
	    <div class="navbar" id="reportnavbar">
		    <div class="navbar-inner">
			    <ul class="nav">
					<li href="#myModal" data-toggle="modal" class="btn btn-success" id="addr">
						<a href="#"><i class="icon-plus-sign icon-white"></i>  Add Report</a>
					</li>
				</ul>

				<ul class="nav pull-right">
					<li id="reportsearch">
						<form class="navbar-search">
						 	<input type="text" class="search-query" placeholder="Search">
						</form>
					</li>
				</ul>
	 		</div>
		</div>

		<!-- Editor -->
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#10006;
				</button>
				<h3 id="myModalLabel">
					Add New Report
				</h3>
			</div>		  
		  
		  
		<!--Editor begins ---- very very long----------------------------------->
			<div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
				<div class="btn-group">
					<a class="btn dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Font"><i class="icon-font"></i><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li>
							<a data-edit="fontName Serif" style="font-family:&#39;Serif&#39;">Serif</a>
						</li>
						<li>
							<a data-edit="fontName Sans" style="font-family:&#39;Sans&#39;">
								Sans
							</a>
						</li>
						<li>
							<a data-edit="fontName Arial" style="font-family:&#39;Arial&#39;">
								Arial
							</a>
						</li>
						<li>
							<a data-edit="fontName Arial Black" style="font-family:&#39;Arial Black&#39;">
								Arial Black
							</a>
						</li>
						<li>
							<a data-edit="fontName Courier" style="font-family:&#39;Courier&#39;">
								Courier
							</a>
						</li>
						<li>
							<a data-edit="fontName Courier New" style="font-family:&#39;Courier New&#39;">
								Courier New
							</a>
						</li>
						<li>
							<a data-edit="fontName Comic Sans MS" style="font-family:&#39;Comic Sans MS&#39;">
								Comic Sans MS
							</a>
						</li>
						<li>
							<a data-edit="fontName Helvetica" style="font-family:&#39;Helvetica&#39;">
								Helvetica
							</a>
						</li>
						<li>
							<a data-edit="fontName Impact" style="font-family:&#39;Impact&#39;">
								Impact
							</a>
						</li>
						<li>
							<a data-edit="fontName Lucida Grande" style="font-family:&#39;Lucida Grande&#39;">
								Lucida Grande
							</a>
						</li>
						<li>
							<a data-edit="fontName Lucida Sans" style="font-family:&#39;Lucida Sans&#39;">
								Lucida Sans
							</a>
						</li>
						<li>
							<a data-edit="fontName Tahoma" style="font-family:&#39;Tahoma&#39;">
								Tahoma
							</a>
						</li>
						<li>
							<a data-edit="fontName Times" style="font-family:&#39;Times&#39;">
								Times
							</a>
						</li>
						<li>
							<a data-edit="fontName Times New Roman" style="font-family:&#39;Times New Roman&#39;">
								Times New Roman
							</a>
						</li>
						<li>
							<a data-edit="fontName Verdana" style="font-family:&#39;Verdana&#39;">
								Verdana
							</a>
						</li>
					</ul>
				</div>
				<div class="btn-group">
					<a class="btn dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Font Size">
						<i class="icon-text-height">
						</i>
						&nbsp;
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a data-edit="fontSize 5">
								<font size="5">
									Huge
								</font>
							</a>
						</li>
						<li>
							<a data-edit="fontSize 3">
								<font size="3">
									Normal
								</font>
							</a>
						</li>
						<li>
							<a data-edit="fontSize 1">
								<font size="1">
									Small
								</font>
							</a>
						</li>
					</ul>
				</div>
				<div class="btn-group">
					<a class="btn" data-edit="bold" title="" data-original-title="Bold (Ctrl/Cmd+B)">
						<i class="icon-bold">
						</i>
					</a>
					<a class="btn" data-edit="italic" title="" data-original-title="Italic (Ctrl/Cmd+I)">
						<i class="icon-italic">
						</i>
					</a>
					<a class="btn" data-edit="strikethrough" title="" data-original-title="Strikethrough">
						<i class="icon-strikethrough">
						</i>
					</a>
					<a class="btn" data-edit="underline" title="" data-original-title="Underline (Ctrl/Cmd+U)">
						<i class="icon-underline">
						</i>
					</a>
				</div>
				<div class="btn-group">
					<a class="btn" data-edit="insertunorderedlist" title="" data-original-title="Bullet list">
						<i class="icon-list-ul">
						</i>
					</a>
					<a class="btn btn-info" data-edit="insertorderedlist" title="" data-original-title="Number list">
						<i class="icon-list-ol">
						</i>
					</a>
					<a class="btn" data-edit="outdent" title="" data-original-title="Reduce indent (Shift+Tab)">
						<i class="icon-indent-left">
						</i>
					</a>
					<a class="btn" data-edit="indent" title="" data-original-title="Indent (Tab)">
						<i class="icon-indent-right">
						</i>
					</a>
				</div>
				<div class="btn-group">
					<a class="btn btn-info" data-edit="justifyleft" title="" data-original-title="Align Left (Ctrl/Cmd+L)">
						<i class="icon-align-left">
						</i>
					</a>
					<a class="btn" data-edit="justifycenter" title="" data-original-title="Center (Ctrl/Cmd+E)">
						<i class="icon-align-center">
						</i>
					</a>
					<a class="btn" data-edit="justifyright" title="" data-original-title="Align Right (Ctrl/Cmd+R)">
						<i class="icon-align-right">
						</i>
					</a>
					<a class="btn" data-edit="justifyfull" title="" data-original-title="Justify (Ctrl/Cmd+J)">
						<i class="icon-align-justify">
						</i>
					</a>
				</div>
				<div class="btn-group">
					<a class="btn dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Hyperlink">
						<i class="icon-link">
						</i>
					</a>
					<div class="dropdown-menu input-append">
						<input class="span2" placeholder="URL" type="text" data-edit="createLink">
						<button class="btn" type="button">
							Add
						</button>
					</div>
					<a class="btn" data-edit="unlink" title="" data-original-title="Remove Hyperlink">
						<i class="icon-cut">
						</i>
					</a>
				</div>
				<div class="btn-group">
					<a class="btn" title="" id="pictureBtn" data-original-title="Insert picture (or just drag &amp; drop)">
						<i class="icon-picture">
						</i>
					</a>
					<input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" style="opacity: 0; position: absolute; top: 0px; left: 0px; width: 36px; height: 29px;">
				</div>
				<div class="btn-group">
					<a class="btn" data-edit="undo" title="" data-original-title="Undo (Ctrl/Cmd+Z)">
						<i class="icon-undo">
						</i>
					</a>
					<a class="btn" data-edit="redo" title="" data-original-title="Redo (Ctrl/Cmd+Y)">
						<i class="icon-repeat">
						</i>
					</a>
				</div>
				<input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="" style="position: absolute; top: 279.3333435058594px; left: 1121.6666666269302px;">
			</div>
		<!--Editor Ends ---- very very long------------------------------------->
		
		
		
			<div id="editor" name="editor" contenteditable="true">
				Go ahead…
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<button class="btn btn-primary" onclick="saveReport()" >Save changes</button>
			</div>
		</div>
		
	</div>
    

    <div class="container-fluid" id='manageDiv'>
	    <div class="row-fluid">
		    <div class="span1">
		    	<ul class="nav nav-list">
		    		<li class="active" id='accounts'>
		    			<a href="#" onclick="tabview('accounts');">Accounts</a>
		    		</li>
					<li id='review'>
		    			<a href="#" onclick="tabview('review');">Review</a>
		    		</li>
    			</ul>
		    </div>
		    <!-- Accounts pane -->
		    <div class="span11" id='accountsDiv'>
		    	<div class="span6 offset3">
		    		<form class="form-horizontal"  onsubmit="return register();" id="registerUser">
					    <div class="control-group" id='inputUsernameRegisterDiv'>
					    	<label class="control-label" for="inputUsernameRegister">Username</label>
						    <div class="controls">
						    	<input type="text" id="inputUsernameRegister"  name="inputUsernameRegister" placeholder="Username">
								<span class='help-inline' id='availabilityStatus'></span>
						    </div>
					    </div>
					    <div class="control-group" id="inputFirstnameRegisterDiv">
					    	<label class="control-label" for="inputFirstnameRegister">Firstname</label>
					    	<div class="controls">
					    		<input type="text" id="inputFirstnameRegister"  name="inputFirstnameRegister" placeholder="Firstname">
					    		<span class='help-inline' id='firstnameCheck'></span>
					    	</div>
					    </div>
					    <div class="control-group" id="inputLastnameRegisterDiv">
					    	<label class="control-label" for="inputLastnameRegister">Lastname</label>
					    	<div class="controls">
					    		<input type="text" id="inputLastnameRegister"  name="inputLastnameRegister" placeholder="Lastname">
					    	</div>
					    </div>
					    <div class="control-group" id="inputEmailRegisterDiv">
					    	<label class="control-label" for="inputEmailRegister">Email</label>
					    	<div class="controls">
					    		<input type="text" id="inputEmailRegister"  name="inputEmailRegister" placeholder="Email">
					    	</div>
					    </div>
					    <div class="control-group" id="inputPasswordRegister1Div">
					    	<label class="control-label" for="inputPasswordRegister1">Password</label>
					    	<div class="controls">
					    		<input type="password" id="inputPasswordRegister1"  name="inputPasswordRegister1" placeholder="Password">
					    		<span class='help-inline' id='password1Check'></span>
					    	</div>
					    </div>
					    <div class="control-group" id="inputPasswordRegister2Div">
					    	<label class="control-label" for="inputPasswordRegister2">Password</label>
					    	<div class="controls">
					    		<input type="password" id="inputPasswordRegister2"  name="inputPasswordRegister2" placeholder="Retype Password">
					    		<span class='help-inline' id='password2Check'></span>
					    	</div>
					    </div>
					    <div class="control-group">

						     <div class="btn-group controls" onclick="showpi();">
							    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
									Select Personal Investigator
									<span class="caret"></span>
							    </a>
							    <ul class="dropdown-menu" id="pilist">
									<li>
										<a href='#' onclick="setpi('none')">
											None
										</a>
									</li>
							    </ul>
							</div>
						</div>
					    <div class="control-group">
					    	<div class="controls">
					    		<button type="submit" class="btn">Register</button>
					    		<span class='help-inline' id='userRegistrationMessage'></span>
					    	</div>
					    </div>
					</form>
				</div>
		    </div>
			<!-- Review pane -->
			<div class="span11" id='reviewDiv'>
				<!--Body content-->
				<p>approve/disapprove</p>
			</div>
	    </div>
    </div>
    <div id='temp' class="alert alert-info span4">
    	harshit
    </div>
   
</body>

</html>

