<form action="http://themis.kamibu.com/phenom/?p=messages&act=new" method="post" enctype="multipart/form-data">
	<div id="newmessage_form">
		<?php 
			if ( $pmsent == true ) {  
				echo '<span id="pm_sent">Το μήνυμα στάλθηκε με επιτυχία.</span>'; 
			}  
			if ( $message_recieverid == false ) {
				echo '<span id="reciever_false">Δεν υπάρχει χρήστης με αυτό το ψευδώνυμο</span>';
			}
			$ref = $_GET[ 'ref' ];
		?>
		<span class="newmessage_label">Παραλήπτης<?php if ( $reciever == "" ) { echo '<span class="missing">*</span>'; } ?></span><input type="text" name="reciever" <?php if ( $ref != "" ) { echo 'value="' . $ref . '"'; } ?> class="newmessage_input" />
		<span class="newmessage_label">Θέμα<?php if ( $subject == "" ) { echo '<span class="missing">*</span>'; } ?></span><input type="text" name="subject" class="newmessage_input" />
		<span class="newmessage_label">Κείμενο<?php if ( $message_text == "" ) { echo '<span class="missing">*</span>'; } ?></span><textarea name="message_text" class="newmessage_text"></textarea>
		<div id="submitmessage"><input type="submit" id="send_pm" value="Αποστολή" /></div>
	</div>
</form>