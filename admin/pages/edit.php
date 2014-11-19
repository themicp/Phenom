<?php
    $openfile = $_POST[ 'openfile' ];
    $data = file( $openfile );
    if ( $openfile != "" ) {
        echo "Opened file : " . $openfile;
    }
    else
    {
        echo "No opened file!";
    }
?>
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <span id="openfile">Open file :</span>
            <input type="text" name="openfile" class="open" />
            <input type="submit" value="Open" />

        </form>
        <form action="savefile.php" method="post" enctype="multipart/form-data">
            <span id="savefile">Save file :</span>
            <input type="text" name="savefile" value="<?php echo $openfile; ?>"  class="save" />
            <input type="submit" value="Save" />
        <div id="texttoedit">
            <textarea class="content" name="contentsave"  ><?php if ( $openfile != "" ) {
                                                                    foreach ( $data as $key => $value ) {  
                                                                            echo $data[ $key ]; 
                                                                    } 
                                                                }
                                                                else
                                                                {
                                                                    echo "";
                                                                }
                                                                ?></textarea>
        </div>
        </form>