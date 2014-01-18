<?php
	include 'dblink.php';
	$username = $_POST['username'];
	$sql = "SELECT * FROM reports where username='".$username."'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_assoc($result)){
		$sqlcomment = "SELECT * FROM comments WHERE username= '".$row['username']."' and title='".$row['title']."' ORDER BY commented_at";
		$resultcomment = mysql_query($sqlcomment);
		$comment = '';
		while($rowcomment  = mysql_fetch_assoc($resultcomment)){
			$comment = $comment."<tr>";
			$comment = $comment."<td class='cowner'><p class='text-info'><strong>".$rowcomment['owner'].
			"</strong>&nbsp(".date('H:i:s d-M-Y', strtotime($rowcomment['commented_at'])).")</td>";
			$comment = $comment."</p><td>".$rowcomment['comment']."</td>";
			$comment = $comment."</tr>";
		}
		//echo '<script> alert("maybe")</script>';
		if($row['verified'] == 0)
			$str = 'color: orangered;';
		else
			$str = '';

		$titlestripped = str_replace(' ','',$row['title']);
		echo "
		<div class='accordion-group'>
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
						<div class='accordion-inner commentsDiv'>
							<table class='commentTable'>".$comment."</table>
						</div>
					</div>
				</div>" ;
	}
	
?>