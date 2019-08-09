<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../resources/css/style.css">
	</head>
	<body>
		<div class="groups-container">
            <h3>GROUPS</h3>
			<?php
                session_start();
                $map = unserialize($_SESSION['map']);
			?>
			<ul class="checkbox-grid">
				<form action="#" method="post">
				<?php
                    require "../resources/php/parser.php";
					ksort($map);
					foreach (array_keys($map) as $key => $group) {
                        echo "<div class=\"dropdown\">
                            <button class=\"dropbtn\">$group</button>
                            <div class=\"dropdown-content\">";
                        
                        if (array_key_exists($group, $map)) {
                            foreach ($map[$group] as $m3uitem) {
                                $name = json_decode($m3uitem)->name;
                                echo "<a href=\"#\">$name</a><br>";
                            }
                        }
                        echo "</div></div>";
						//echo "<li><div class=\"group-div\"><input type=\"checkbox\" class=\"group\" id=\"$group\" name=\"check_list[]\" value=\"$group\"><span style=\"font-size: 18px;\">$group</span></div></li>";
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