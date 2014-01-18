<?php
	include 'dblink.php';
	$sql = "SELECT * FROM reports where verified =1";
	$result = mysql_query($sql);
	while($row = mysql_fetch_assoc($result)){
		$sqlcomment = "SELECT * FROM comments WHERE username= '".$row['username']."' and title='".$row['title']."' and verified =1 
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
		$titlestripped = str_replace(' ','',$row['title']);
		echo "	<div class='accordion-group'>
					<div class='accordion-heading'>

						<a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#all_".$titlestripped."'
						style='text-decoration:none'>
							"."<b>Title : </b>".
							$row['title']."<br><b>Description : </b>".$row['description']."
						</a>
					</div>
					<div id='all_".$titlestripped."' class='accordion-body collapse'>
						<div class='accordion-inner'>
							".$row['content']."
						</div>
						<div class='accordion-inner commentsDiv'>
							<table class='commentTable'>".$comment."</table>
							<div>
								<input class='ctext' type='text'/>
								<a class='btn cbtn' 
								href=\"javascript:addComment('".$row['username']."','".$row['title']."','".$titlestripped."',1);\">
								Add Comment</a>
							</div>
						</div>
					</div>
				</div>";
	}
?>