<div class="type-contacts clr">
	<div class="title1">Kontakti</div>
	<div class="contacts-container clearfix">
		<div class="left">
			<div class="soc-icon-facebook"><a href="<?php echo $contacts_data['facebook']; ?>" target="_blank"><span>FACEBOOK: <?php echo $contacts_data['facebook_id']; ?></span></a></div>
			<div class="soc-icon-instagram"><a href="<?php echo $contacts_data['instagram']; ?>" target="_blank"><span>INSTAGRAM: <?php echo $contacts_data['instagram_id']; ?></span></a></div>
			<div class="soc-icon-youtube"><a href="<?php echo $contacts_data['youtube']; ?>" target="_blank"><span>YOUTUBE: <?php echo $contacts_data['youtube_id']; ?></span></a></div>
			<div class="email"><span>E-pasts</span>: <a href="mailto:<?php echo $contacts_data['email']; ?>"><?php echo $contacts_data['email']; ?></a></div>
			<div class="address"><span>Adrese</span>: <?php echo $contacts_data['address']; ?></div>
		</div>
		<div class="right">
			<div id="map-canvas-contacts" data-lat="<?php echo $contacts_data['latitude']; ?>" data-lon="<?php echo $contacts_data['longitude']; ?>" style="height:200px;"></div>
		</div>
	</div>
</div>
