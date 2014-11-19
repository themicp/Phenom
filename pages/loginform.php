<?php 
    header( 'Content-type: text/html; charset=utf8' );
    $regusername = $_POST[ 'regusername' ];
    $regpassword = $_POST[ 'regpassword' ];
    $regmail = $_POST[ 'regmail' ];
    $regfirstname = $_POST[ 'regfirstname' ];
    $reglastname = $_POST[ 'reglastname' ];
    $link = mysql_connect('localhost', 'themis', 'gamaoua55wiiihaaa');
    $error = false;
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("themis");

    $select = mysql_query("SELECT user_name, user_mail 
                FROM users ");
    $success = true;
    $query = sprintf("INSERT INTO `users` (
            `user_id` ,
            `user_name` ,
            `user_password` ,
            `user_mail` ,
            `user_firstname` ,
            `user_lastname`,
            `user_avatar`
            )
            VALUES (
            NULL , '$regusername', '$regpassword', '$regmail', '$regfirstname', '$reglastname', 'http://themis.kamibu.com/images/noimage.jpg')"
            );
    if ( $regusername != "" && $regpassword != "" && $regmail != "" && $regfirstname != "" && $reglastname != "" ) {	
        while ($row = mysql_fetch_array($select)) {	
            if ( $regusername == $row[ 'user_name' ] || $regmail == $row[ 'user_mail' ] ) {
                $success = false;
                break;
            }
            else
            {
                $success = true;
                $registered = true;
            }
        }
        if ( $success == false) {
            $error = true;
        }
        else 
        {
            $result = mysql_query($query);
            $registered = true;
        }
    }		
    session_start();
    include 'login.php';
    echo '<?xml version="1.0" encoding="utf-8"?>';
    include 'html_header.php';
?>
        <div class="link_home"><a href="?p=home" ><img src="bg/logo.gif" class="logo_phenom" alt="logo"/></a></div>
        <div id="content">
            <div class="page_login">
                <div id="div_connect_friends">
                    <span class="connect_friends">Βρές νέους φίλους, επικοινώνησε με παλιούς με τον πιο εύκολο τρόπο!</span>
                    <img src="bg/bg_people.jpg" alt="people" class="social" />
                </div>
                <div id="loginform">
                    <h2 class="login_header">Είσοδος</h2>
                    <?php if ( $loggedin == false && $username != "" && $password != "" ) { echo '<div id="falseinfo">Ο κωδικός ή το ψευδώνυμο είναι λάθος.</div>'; } ?>
                    <form action="?p=home" method="post" enctype="multipart/form-data">
                        <div class="username"><span id="usercaption">Ψευδώνυμο  </span><input type="text" name="username" class="usertext" /></div>
                        <div class="password"><span id="passcaption">Κωδικός  </span><input type="password" name="password" class="passtext" /></div>
                        <div class="forgottxt"><span id="forgot"><a href="reset.php">Επαναφορά στοιχείων</a>.</span></div>
                        <div class="login_submit_btn"><input type="submit" value="Είσοδος" class="loginbtn" /></div>
                    </form>
                </div>
            <div id="registerform">
                <h2 class="register_header">Δωρεάν εγγραφή</h2>
                <?php if ( $error == true ) { echo '<span id="error">Υπάρχει ήδη λογαριασμός με το ίδιο mail ή ψευδώνυμο.</span>'; } ?>
                <?php if ( $registered == true ) { echo '<span id="registered_success">Ο λογαριασμός σας δημιουργήθηκε.</span>'; } ?>
                <form action="?p=home" method="post" enctype="multipart/form-data">
                    <div class="username">
                        <span id="regusercaption">Ψευδώνυμο  </span>
                        <?php 
                            if ( $regusername == "" ) { 
                                echo '<span class="missing">*</span>'; 
                            } 
                        ?>
                        <input type="text" name="regusername" class="usertext" value="<?php echo $regusername; ?>" />
                    </div>
                    <div class="password">
                        <span id="regpasscaption">Κωδικός  </span>
                        <?php 
                            if ( $regpassword == "" ) { 
                                echo '<span class="missing">*</span>'; 
                            } 
                        ?>
                        <input type="password" name="regpassword" class="passtext" value="<?php echo $regpassword; ?>" />
                    </div>
                    <div class="mail">
                        <span id="regmailcaption">E-Mail  </span>
                        <?php 
                            if ( $regmail == "" ) { 
                                echo '<span class="missing">*</span>'; 
                            } 
                        ?>
                        <input type="text" name="regmail" class="mailtext" value="<?php echo $regmail; ?>" />
                    </div>
                    <div class="firstname">
                        <span id="regfirstcaption">Όνομα  </span><?php if ( $regfirstname == "" ) { echo '<span class="missing">*</span>'; } ?><input type="text" name="regfirstname" class="firsttext" value="<?php echo $regfirstname; ?>" /></div>
                    <div class="lastname"><span id="reglast">Επίθετο  </span><?php if ( $reglastname == "" ) { echo '<span class="missing">*</span>'; } ?><input type="text" name="reglastname" class="lasttext" value="<?php echo $reglastname; ?>" /></div>
                    <div class="register_submit_btn"><input type="submit" value="Εγγραφή" class="registerbtn" /></div>
                </form>
            </div>

                <div style="clear:both"></div>
            </div>
        </div>
        <div class="footer">
            <div class="links_footer">
                <a href="#"><span class="about_link">Πληροφορίες</span></a>
                <a href="#"><span class="advertise_link">Διαφήμιση</span></a>
            </div>
            <span class="copyright">Phenom &copy; 2010</span>
        </div>
<?php include 'html_footer.php'; ?>



