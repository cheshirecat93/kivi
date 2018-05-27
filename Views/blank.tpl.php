<!doctype html>
<html lang="lv">
<head>
  <meta charset="utf-8">
  <title><?php echo $page_title; ?> | KIVI</title>
  <meta name="description" content="KIVI">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="lib/slick/slick.css">
  <link rel="stylesheet" href="lib/slick/slick-theme.css">
  <link rel="stylesheet" href="lib/raty/jquery.raty.css">
  <link rel="stylesheet" href="lib/colorbox/example1/colorbox.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/styles.css">
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body>
	<div class="main-container">
		<div class="head-menu clearfix">
			<div class="left-logo"><a href="/">LOGO</a></div>
			<div class="center-menu">
				<ul>
					<li <?php echo ($cur_manu_id == 'main' ? 'class="active"' : '') ?> ><a href="/">Sākums</a></li>
					<li <?php echo ($cur_manu_id == 'about' ? 'class="active"' : '') ?> ><a href="/?c=about">Par KIVI</a></li>
					<li <?php echo ($cur_manu_id == 'scenes' ? 'class="active has-childs"' : 'class="has-childs"') ?>><a href="/?c=scenes">Raidījuma sižeti</a>
						<?php if( !empty($seasons_menu) ): ?>
							<ul>
							<?php foreach($seasons_menu as $seasons_menu_item): ?>
								<li <?php echo ( $cur_manu_id == 'scenes' && isset($cur_menu_season_id) && $cur_menu_season_id == $seasons_menu_item['ID'] ? 'class="active"' : '') ?>><a href="/?c=scenes&id=<?php echo $seasons_menu_item['ID']; ?>"><?php echo $seasons_menu_item['name']; ?></a></li>
							<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</li>
					<li <?php echo ($cur_manu_id == 'members' ? 'class="active has-childs"' : 'class="has-childs"') ?>><a href="/?c=members">Biedri</a>
						<?php if( !empty($seasons_menu) ): ?>
							<ul>
							<?php foreach($seasons_menu as $seasons_menu_item): ?>
								<li <?php echo ( $cur_manu_id == 'members' && isset($cur_menu_season_id) && $cur_menu_season_id == $seasons_menu_item['ID'] ? 'class="active"' : '') ?>><a href="/?c=members&id=<?php echo $seasons_menu_item['ID']; ?>"><?php echo $seasons_menu_item['name']; ?></a></li>
							<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</li>
					<li <?php echo ($cur_manu_id == 'gallery' ? 'class="active"' : '') ?> ><a href="/?c=gallery">Foto</a></li>
					<li <?php echo ($cur_manu_id == 'friends' ? 'class="active"' : '') ?> ><a href="/?c=friends">Draugi</a></li>
					<li <?php echo ($cur_manu_id == 'howto' ? 'class="active"' : '') ?> ><a href="/?c=howto">Kā pievienoties?</a></li>
					<li <?php echo ($cur_manu_id == 'contacts' ? 'class="active"' : '') ?> ><a href="/?c=contacts">Kontakti</a></li>
				</ul>
			</div>
			<div class="right-login-logout">
				<div class="right-login-name"><span><?php echo $login_user_name; ?></span></div>
				<?php if($is_login): ?>
					<div class="logout-form">
						<a href="/?c=useredit">Rediģēt profilu</a>
						<a href="/?c=logout">Iziet</a>
					</div>
				<?php else: ?>
					<div class="login-form">
						<form method="post" action="/?c=login">
							<div class="form-item">
								<label for="form_email">E-pasts</label>
								<input type="email" required id="form_email" name="email">
							</div>
							<div class="form-item">
								<label for="form_password">Parole</label>
								<input type="password" required id="form_password" name="password">
							</div>
							<div class="form-actions">
								<input type="submit" value="Pieslēgties">
							</div>
						</form>
						<a href="/?c=register" class="register-button">Reģistrēties</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	   <?php echo $body; ?>
	   <div class="footer">
	   		<div class="footer-top clearfix">
		   		<div class="left-logo"><a href="/">LOGO</a></div>
				<div class="center-menu">
					<ul>
						<li <?php echo ($cur_manu_id == 'main' ? 'class="active"' : '') ?> ><a href="/">Sākums</a></li>
						<li <?php echo ($cur_manu_id == 'about' ? 'class="active"' : '') ?> ><a href="/?c=about">Par KIVI</a></li>
						<li <?php echo ($cur_manu_id == 'scenes' ? 'class="active"' : '') ?>><a href="/?c=scenes">Raidījuma sižeti</a></li>
						<li <?php echo ($cur_manu_id == 'members' ? 'class="active"' : '') ?>><a href="/?c=members">Biedri</a></li>
						<li <?php echo ($cur_manu_id == 'gallery' ? 'class="active"' : '') ?> ><a href="/?c=gallery">Foto</a></li>
						<li <?php echo ($cur_manu_id == 'friends' ? 'class="active"' : '') ?> ><a href="/?c=friends">Draugi</a></li>
						<li <?php echo ($cur_manu_id == 'howto' ? 'class="active"' : '') ?> ><a href="/?c=howto">Kā pievienoties?</a></li>
						<li <?php echo ($cur_manu_id == 'contacts' ? 'class="active"' : '') ?> ><a href="/?c=contacts">Kontakti</a></li>
					</ul>
				</div>
				<div class="right-icons">
					<span>Seko līdzi mūsu jaunumiem:</span>
					<a class="youtube" target="_blank" href="<?php echo $contacts_data['youtube']; ?>">Youtube</a>
					<a class="instagram" target="_blank" href="<?php echo $contacts_data['instagram']; ?>">Instagram</a>
					<a class="facebook" target="_blank" href="<?php echo $contacts_data['facebook']; ?>">Facebook</a>
				</div>
	   		</div>
	   		<div class="footer-bottom clearfix">
	   			<div class="left-made">Made By WhiteHouse</div>
	   			<div class="right-made">&copy; <?php echo date('Y'); ?> All rights reserved 'Raidījums KIVI'</div>
	   		</div>
	   </div>
	</div>

  <script src="lib/jquery.min.js"></script>
  <script src="lib/slick/slick.min.js"></script>
  <script src="lib/raty/jquery.raty.js"></script>
  <script src="lib/colorbox/jquery.colorbox-min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4W1G-X50uAOrJiOGBN-DZZrVTZM01sm4"></script>
  <script src="js/scripts.js"></script>
</body>
</html>
