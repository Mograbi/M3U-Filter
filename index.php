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
					$map = parse_m3u($url);
				}
			?>
			<ul class="checkbox-grid">
				<form action="#" method="post">
				<?php
					ksort($map);
					foreach (array_keys($map) as $key => $group) {
						echo "<li><div class=\"group-div\"><input type=\"checkbox\" class=\"group\" id=\"$group\" name=\"check_list[]\" value=\"$group\"><span style=\"font-size: 18px;\">$group</span></div></li>";
					}
				?>
				<input type="submit" name="submit" value="Submit"/>
				</form>
			</ul>
			<?php
				if(isset($_POST['submit'])) {
					if(!empty($_POST['check_list'])) {
						foreach($_POST['check_list'] as $selected) {
							echo $selected."</br>";
						}
					}
				}
			?>
		</div>
	</body>
</html>