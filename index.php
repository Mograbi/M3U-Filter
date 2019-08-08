<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="resources/css/style.css">
	</head>
	<body>
		<form name="form" action="" method="get">
  			<input type="text" name="url" id="url" value="">
		</form>
		<button>Refresh</button>
		<div class="groups-container">
			<?php
				require "resources/php/parser.php";
				$map = array();
				if ( isset( $_GET['url'] ) ) {
					$url = $_GET['url'];
					session_start();
					$_SESSION['map'] = parse_m3u($url);;
					header("Location: pages/groups.php");
				}
			?>
		</div>
	</body>
</html>