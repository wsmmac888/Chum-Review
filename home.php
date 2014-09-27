<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chum Review - Trusted Reviews From Your Friends</title>
<link href="main.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Kreon:700' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="img/icon.ico" >
<script type="text/javascript" src="jQuery1.10.2.js"></script>
</head>

<body>
<a href="/"><div id="banner">
	<div id="banner-wrapper"><div id="logo">Chum Review</div><img src="img/logo.png" /></div>
</div></a>
<h3 id="motto">Get reviews you trust from people you know.</h3>
<?php
	include("tcin_from_url.php");
	if(isset($_GET['url'])) {
		$url = $_GET['url'];
		$tcin = tcin_from_url($url);
		$url = clean_url($url, $tcin);
		$json = json_from_tcin($tcin);
		$title = title_from_json($json);
		//$title = "Beats by Dre";
?>

<div id="share-button">Click to Ask for Reviews</div>

<script>
function myPopup(url) {
	var top = window.innerHeight - 350;
	window.open( url, "Share", "status = 1, height = 250, width = 700, resizable = 0, top = " + top)
} 
//$('#left-column').remove();
$('#share-button').click(function() {
	myPopup("http://www.facebook.com/share.php?u=<?php echo $url;?>");
	$('#column-super-box').css({'visibility':'visible'});
	$('#share-button').hide();
});
$('#share-button').hover(function() {
	$('#share-button').css('background','linear-gradient(#602870,#60C)');
},function() {
	$('#share-button').css('background','linear-gradient(#60C, #602870)');
});
</script>
<div id="column-super-box"><div id="left-column">Congratulations, you're done!</div><div id="right-column"><img src="img/arrow2.png" width="150px"/><br /><br />Type your message here.<div id="late-example">I was thinking about buying <?php echo $title?>. What do you think?</div></div></div>

<?php
	}
	else {
?>
<div id="description">Paste a URL from a Target product</div>
<form id="form" action="" method="get">
	<input id="url-input" type="text" name="url" placeholder="Enter a URL" autocomplete="off"/><div id="submit-button">Submit</div>
</form>
<div id="example-box">
<img id="fb-example" src="img/fbex2.png" />
</div>
<script type="text/javascript">
$('#submit-button').hover(function() {
	$('#submit-button').css('background','linear-gradient(#602870,#60C)');
},function() {
	$('#submit-button').css('background','linear-gradient(#60C, #602870)');
});
$('#submit-button').click(function() {
	$('#form').submit();
});
</script>
<?php
	}
?>




</body>
</html>
