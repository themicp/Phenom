<?php
   if ( $commentid != "" ) {
		$getuserid = mysql_query(" SELECT
									new_id , 
									new_itemid
								FROM
									news
								WHERE
									new_comment='$commentid' AND new_type='image'
								");
		$res = mysql_fetch_array($getuserid);
		$itemres = $res[ 'new_itemid' ];
		if ( $res != "" ) {
			$getuser = mysql_query("SELECT image_userid FROM images WHERE image_id=$itemres");
			$touserres = mysql_fetch_array($getuser);
		}
		$delete = sprintf(" DELETE FROM 
								news
							WHERE 
								new_comment='$commentid'
							");

		if ( $myid == $touserres[ 'image_userid' ] ) { 
			$dodelete = mysql_query($delete);
		}
	}
?>