<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="resources/css/style.css">
	</head>
	<body>
		<form name="form" action="" method="get">
  			<input type="text" name="url" id="url" value="">
			  <input type="submit" name="submit" value="submit">
		</form>
		<div class="groups-container">
			<?php
				require "resources/php/parser.php";
				if (isset($_GET['submit'])) {
					if (!empty($_GET['url'])) {
						$url = $_GET['url'];
						session_start();
						$_SESSION['map'] = serialize(parse_m3u($url));
						header("Location: pages/groups.php");
					}
				}
			?>
		</div>
	</body>
</html>