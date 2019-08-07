<html>
	<body>
	<form name="form" action="" method="get">
  		<input type="text" name="m3uurl" id="m3uurl" value="">
	</form>
</body>
</html>
<?php
	require "M3U-Filter/parser.php";
	if ( isset( $_GET['m3uurl'] ) ) {
		$url = $_GET['m3uurl'];
		parse_m3u($url);
	}
	
?>