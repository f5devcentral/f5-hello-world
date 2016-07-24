<!--
ADC Test Site
Artiom Lichtenstein
v2.1, 27/02/2016
-->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Real Server <?php echo substr(substr(strrchr($_SERVER["SERVER_ADDR"],'.'),1),-1); echo " " . $_SERVER["REQUEST_URI"]; ?></title>
	<script language="JavaScript" type="text/javascript">
		function funColExpand(obj, link) {
			var elobj=document.getElementById(obj);
			var elink=document.getElementById(link);
			if ( (!elobj) || (!elink) ) return false;
			if ( elobj.style.display=="none" ) {
				elobj.style.display="block"
				elink.innerHTML="<b>-Less Raw Data</b>"
			}
			else {
				elobj.style.display="none"
				elink.innerHTML="<b>+More Raw Data</b>"
			}
		}
	</script>
</head>

<body style="font-family:Calibri; font-size:13px; color:#000000; margin-left:25px;"><br>
<p style="font: 12pt/17pt Calibri;">
Hello <?php if ($_SERVER["HTTP_X_USERNAME"]!="") { echo $_SERVER["HTTP_X_USERNAME"]; } else { echo "World"; } ?>!<br>
ip.src: <?php echo $_SERVER["REMOTE_ADDR"]; ?><br>
tcp.srcport: <?php echo $_SERVER["REMOTE_PORT"]; ?><br>
ip.dst: <?php echo $_SERVER["SERVER_ADDR"]; ?><br>
tcp.dstport: <?php echo $_SERVER["SERVER_PORT"]; ?><br><br></p>

<span style="color:#ff0000;">
<?php echo $_SERVER["REQUEST_METHOD"] . " "; echo $_SERVER["REQUEST_URI"] . " "; echo $_SERVER["SERVER_PROTOCOL"] . "<br>";
$arrHeaders = apache_request_headers();
foreach ($arrHeaders as $header => $value)
	echo "$header: $value <br />\n";
?>
</span><br><br>

<span style="color:#0000ff;">
<?php echo $_SERVER["SERVER_PROTOCOL"] . " 200 OK<br>";
echo "Server: " . $_SERVER["SERVER_SOFTWARE"] . "<br>";
flush();
$arrHeaders = apache_response_headers();
foreach ($arrHeaders as $header => $value)
	echo "$header: $value <br />\n";
?>
<br><br><br>

<div style="cursor:hand; cursor:pointer;" onClick="funColExpand('RawData','RawLink')" id="RawLink"><b>+More Raw Data</b></div>
<div id="RawData" style="display:none"><ol>
<?php
foreach($_SERVER as $header => $value)
	echo "<li>$header = $value</li>\n";
?>
</ol></div>
</span><br><br>

<span style="float:right; margin-right:100px;">Artiom Lichtenstein<br>Application Delivery Architect<br>CCIE #37173</span>
</body>
</html>
