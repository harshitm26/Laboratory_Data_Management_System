<?php
	include 'dblink.php';
	$username = $_POST['username'];
	$username = trim($username, " ");
	$sql = "SELECT * FROM users where pi='".$username."'";
//	echo $sql;
	$result = mysql_query($sql);
	while($row = mysql_fetch_assoc($result)){
		$dependent = $row['username'];
		$sql = "SELECT * FROM reports where username='".$dependent."' AND verified =0";
	//	echo $sql;
		$resultReports = mysql_query($sql);
		while($rowReports = mysql_fetch_assoc($resultReports)){
			$sqlcomment = "SELECT * FROM comments WHERE username= '".$rowReports['username']."' and title='".$rowReports['title']."' and verified =0 
			ORDER BY commented_at";
			$resultcomment = mysql_query($sqlcomment);
			$comment = '';
			while($rowcomment = mysql_fetch_assoc($resultcomment)){
				$comment = $comment."<tr>";
				$comment = $comment."<td class='cowner'><p class='text-info'><strong>".$rowcomment['owner'].
				"</strong>&nbsp(".date('H:i:s d-M-Y', strtotime($rowcomment['commented_at'])).")</td>";
				$comment = $comment."</p><td>".$rowcomment['comment']."</td>";
				$comment = $comment."</tr>";
			}
			$titlestripped = str_replace(' ','',$rowReports['title']);
			echo "	<div class='accordion-group'>
					<div class='accordion-heading'>
						<table class='titletable'>
						<tr><td>
						<a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#review_".$titlestripped."'
						style='text-decoration:none'>
							"."<b>Title : </b>".
							$rowReports['title']."<br><b>Description : </b>".$rowReports['description']."
						</a>
						</td>
						<td align='right'>
						<a class='btn btn-success' onclick=\"verifyReport
						('".$rowReports['title']."','".$rowReports['username']."','".$username."','1')\">
							Approve Changes</a>
						</td></tr>
						</table>
					</div>
					<div id='review_".$titlestripped."' class='accordion-body collapse'>
						<div class='accordion-inner' id='reviewcontent_".$titlestripped."'>
							".$rowReports['content']."
						</div>
						<div class='commentsDiv accordion-inner'>
							<table class='commentTable'>".$comment."</table>
							<div>
								<input class='ctext' type='text'/>
								<a class='btn cbtn' 
								href=\"javascript:addComment('".$rowReports['username']."','".$rowReports['title']."','".$titlestripped."',0);\">
								Add Comment</a>
							</div>
						</div>
					</div>
				</div>" ;


		}
	}
?>