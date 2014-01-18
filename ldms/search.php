<?php
	libxml_use_internal_errors(true);
	include 'dblink.php';
	$str = $_POST['searchString'];
	$words = explode(' ',$str);
	$username = $_POST['username'];
	$sql = "SELECT * FROM reports where username='".$username."'";
	$result = mysql_query($sql);
	echo "<div class='alert alert-info' id='searchInfoBar'> Search Results for 
	<b>$str</b></div>";
	$doc = new DOMDocument();

	while($row = mysql_fetch_assoc($result)){
		$found = FALSE;
		$doc->loadHTML($row['content']);
		$root = $doc->documentElement;
		$text_content = $root->textContent;

		for ($i=0; $i<count($words); $i++){
			if (stripos($row['title'].$row['description'].$text_content,$words[$i]) !== FALSE){
				$found = TRUE;
				break;
			}
		}
		if($found){
		if($row['verified'] == 0)
			$str = 'color: orangered;';
		else
			$str = '';
		$titlestripped = str_replace(' ','',$row['title']);
		echo 
		"<div class='accordion-group'>
			<div class='accordion-heading'>
			<table class='titletable'>
				<tr>
				<td>
				<a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#personal_".$titlestripped."'
				style='".$str."text-decoration:none'>
					"."<b>Title : </b>".
					$row['title']."<br><b>Description : </b>".$row['description']."
				</a>
				</td>
				<td align='right'>
				<a href='#myModal' data-toggle='modal' class='btn btn-primary editbtn' onclick=\"editreport
				('".$row['title']."','".$row['description']."')\">
					Edit Report</a>
				</a>
				</td>
				</tr>
			</table>
			</div>
			<div id='personal_".$titlestripped."' class='accordion-body collapse'>
				<div class='accordion-inner' id='personalcontent_".$titlestripped."'>
					".$row['content']."
				</div>
			</div>
		</div>" ;

		}
	}
	// echo "<script>alert('$text_content')</script>";
?>