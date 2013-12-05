<?php
session_start();

if(isset($_SESSION['name'])){
    $text = $_POST['text'];
    $filename = "log.html";
    $somecontent = $text;
    
    if(is_writable($filename)) {
	
	if (!$handle = fopen($filename, 'a')) {
	echo "cannot open file";
	exit;
	}
    
    
	$somecontent = "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['name']."</b>: ".stripslashes(htmlspecialchars($text))."</div>";
	if (fwrite($handle, $somecontent) === FALSE) {
        echo "Cannot write to file ($filename)";
        exit;
	}
	
	echo "Success, wrote ($somecontent) to file ($filename)";

	fclose($handle);
    
    }
    
    //$fp = fopen("log.html", "a");
    //fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['name']."
    //</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    
    //fclose($fp);
}

?>
