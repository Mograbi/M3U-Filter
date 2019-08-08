<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../resources/css/style.css">
	</head>
	<body>
		<div class="groups-container">
			<?php
                session_start();
				$map = $_SESSION['map'];
			?>
			<ul class="checkbox-grid">
				<form action="#" method="post">
				<?php
					ksort($map);
					foreach (array_keys($map) as $key => $group) {
						echo "<li><div class=\"group-div\"><input type=\"checkbox\" class=\"group\" id=\"$group\" name=\"check_list[]\" value=\"$group\"><span style=\"font-size: 18px;\">$group</span></div></li>";
					}
					echo "<br><input type=\"submit\" name=\"submit\" value=\"Submit\"/>";
				?>
				</form>
			</ul>
			<?php
				if (isset($_POST['submit'])) {
					if (!empty($_POST['check_list'])) {
						foreach ($_POST['check_list'] as $selected) {
							echo $selected."</br>";
						}
					}
				}
			?>
		</div>
	</body>
</html>