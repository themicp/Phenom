<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="el" lang="el" >
	<head>
		<title>
			<?php 
				session_start();
				$act = $_GET[ 'act' ];
				$get_page = $_GET[ 'p' ];
				if ( $_SESSION[ 'id' ] != "" ) {
					include './title.php'; 
				}
				else {
					echo 'Είσοδος | Phenom';
				}
			?>
		</title>
		<link href="./css/style.css" rel="stylesheet" type="text/css" /> 
        <script type="text/javascript" src="js/jquery.js"></script>
        <style type="text/css">
            div.opt<?php if ( $act == "sent" ) { echo "sent"; } if ( $act == "inbox" ) { echo "inbox"; } if ( $act == "new" ) { echo "new"; } ?> {
                font-weight:bold;
                background-color:rgb(135,206,250);
            }
        </style>
        <script type="text/javascript" >
            function reloadPages() {
                $.get( 'chat.php', function( data ) { 
                    var messages = data;
                    if ( messages != $( '#chatmessages' )[0].innerHTML ) {
                        $( '#chatmessages' )[0].innerHTML = messages; 
                    }
                    setTimeout("reloadPages()", 1000);
                    } 
                );
                $.get( 'online.php', function( data ) { 
                    var online = data;
                    if ( online != $( '.show_online_now' )[0].innerHTML ) {
                        $( '.show_online_now' )[0].innerHTML = online;
                        //alert($( '.show_online_now' )[0].innerHTML +"---------"+  online);
                    }
                    setTimeout("reloadPages()", 1000);
                    } 
                );
            }
            function sendIM() {
                $.post( 'postchat.php', { chatmessage: $( '#chattxt' )[0].value } );
                $( '#chattxt' )[0].value = "";
            }
        </script>
		<?php 
		 if ( $get_page == "twitter" ) { ?>
			<script src="http://platform.twitter.com/anywhere.js?id=6f2HniFrvPBdfGiOQJjQ&amp;v=1">
			</script>
			<script type="text/javascript">
				twttr.anywhere(function(twitter) {
						twitter.hovercards();
				});
			</script>
		<?php } ?>
	</head>
	<body onload="reloadPages()">