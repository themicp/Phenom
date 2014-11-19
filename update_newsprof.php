<?php
   	$getuserid = mysql_query(" SELECT
									new_id , 
									new_itemid ,
									new_comment
								FROM
									news
								WHERE
                                    new_comment='$commentid' ");
    $res = mysql_fetch_array($getuserid);
   	if ( $userid == $res[ 'new_itemid' ] ) { 
		$delete = mysql_query("DELETE FROM 
								news
							WHERE 
								new_comment='$commentid' LIMIT 1");
   	}
?>