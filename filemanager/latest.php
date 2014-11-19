				<table border="1" id="lastupl">
					<caption>Τελευταία 5 αρχεία</caption>
					<thead>
						<tr>
							<td id="size" >Μέγεθος</td>
							<td id="file" >Αρχείο</td>
							<td id="tablname" >Όνομα</td>
						</tr>
					</thead>
					<?php
					$dir = "./uploads/";
					$user = $_SESSION['username'];
					$a = array();
					$b = array();
					$i = 0;
					$filename = $split[ 0 ];
					$uploader = $split[ 1 ];
					$data = file( './uploads/uploads.txt' );
					$uploaders = array();
					if ($dh = opendir($dir)) {
						while (($file = readdir($dh)) !== false) {		
							$onedot = ( $file == "." );
							$twodot = ( $file == ".." );
							$uploadss = ( $file == "uploads.txt" );
							    
									if ( !$onedot && !$twodot && !$uploadss ) {
									    
										$a[ $file ] = filemtime( $dir . $file );						
									       arsort( $a );
								    }
							}
							foreach ( $a as $file => $str ) {
							    $i = $i + 1;
								if ( $i < 6 ) {
									$b[ $file ] = $str;
								}
							}
							foreach ( $data as $value ) {						
								$explosion = explode( ' -> ', $value);
								$key = $explosion[ 0 ];
								$uploaders[ $key ] = $explosion[ 1 ];	
								}
								//var_dump($uploaders);
								//die();
							mysql_connect("localhost", "themis", "gamaoua55wiiihaaa") or
    							die("Could not connect: " . mysql_error());
							mysql_select_db("themis");
							foreach ( $b as $file => $mtime ) {	
								$filenames = "./uploads/" . $file;
								$conv = filesize($filenames)/1048576;
								$convres = substr($conv, 0, 1);
								$size = substr($conv, 0, 4);
								$finaluploader = $uploaders[ $file ];
								if ( $convres == "0" ) {
									$convtokb = filesize($filenames)/1024;
									$convtokbres = substr($convtokb, 0, 4);
									echo "<tr><td>";
									echo $convtokbres . " KB";
									echo "</td>";
									echo "<td>";
									echo "<a href=";	
									echo '"';
									echo "uploads/" . $file;
									echo '"';
									echo ">" . $file;
									echo "</a>";
									echo "</td>";
									echo "<td>";
									$result = mysql_query("SELECT user_id, user_firstname, user_lastname FROM users WHERE user_id='$finaluploader' ");
									while ($row = mysql_fetch_array($result)) {
										echo "<strong>" . $row['1'] . " " . $row['2'] . "</strong>";
									}
									echo "</td></tr>";
								}
								else
								{
									echo "<tr><td>";
									echo $size . " MB";
									echo "</td>";
									echo "<td>";
									echo "<a href=";	
									echo '"';
									echo "uploads/" . $file;
									echo '"';
									echo ">" . $file;
									echo "</a>";
									echo "</td>";
									echo "<td>";
									$result = mysql_query("SELECT user_id, user_firstname, user_lastname FROM users WHERE user_id='$finaluploader' ");
									while ($row = mysql_fetch_array($result)) {
										echo "<strong>" . $row['1'] . " " . $row['2'] . "</strong>";
									}
									echo "</td></tr>";	
								}						
							}
 

							}
					        closedir($dh);
  

					?>
				</table>
