<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $site_title; ?></title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="theme.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src='cms.js'></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $site_description; ?>">
	<meta name="keywords" content="<?php echo $site_tags; ?>">
</head>
<body>
	<div class="wrapper">
		<div class="main-content">
			<header>
				<nav class="nav">
					<div class="nav-title">
						<?php echo $site_title; ?>
					</div>
					 <button onclick="nav_toggle()" class="nav-toggle">
						<div class="nav-toggle-overlay">
							<div class="nav-toggle-line"></div>
							<div class="nav-toggle-line"></div>
							<div class="nav-toggle-line"></div>
						</div>
					</button> 
					<div id="nav-menu" class="expand">
						<div class="nav-bar"></div>
						<ul>
						<?php 
						foreach ($site_nav as &$menu) {
							$link = str_replace(' ', '-', $menu);
							if (!$site_urlrw)
								$link = "?$link";
							if (strcmp($m, $menu) == 0)
								$menu = "<b>".$menu."</b>";
							echo "<a href='$link'><li>$menu</li></a>";
						}
						?>
						</ul>
					</div>
				</nav>
			</header>
			<div class="editable"><?php echo loadContent($p) ?></div>
		</div>
	</div>
	<div class="footer">
	        <?php echo $site_copyright;?> <?php echo $login_link;?>
	</div>
	<?php login_check(); ?>
</body>
</html>
