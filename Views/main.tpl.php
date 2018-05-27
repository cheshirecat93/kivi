<div class="type-main clr">
	<div class="front-slider">
	  <div class="bg-image" style="background:url('../files/slideshow/sliedeshow1.jpg') no-repeat;">
	  	<div class="text">
	  	ERAB vizītes laikā spriež par iespējamo atbalstu<br>
	  	LU Akadēmiskā centra turpmākai attīstība
	  	</div>
	  </div>
	  <div class="bg-image" style="background:url('../files/slideshow/sliedeshow1.jpg') no-repeat;">
	  	<div class="text">
	  	ERAB vizītes laikā spriež par iespējamo atbalstu<br>
	  	LU Akadēmiskā centra turpmākai attīstība
	  	</div>
	  </div>
	  <div class="bg-image" style="background:url('../files/slideshow/sliedeshow1.jpg') no-repeat;">
	  	<div class="text">
	  	ERAB vizītes laikā spriež par iespējamo atbalstu<br>
	  	LU Akadēmiskā centra turpmākai attīstība
	  	</div>
	  </div>
	</div>

	<?php if( !empty($last_scenes) ): ?>
		<div class="last-scenes-container">
			<div class="title1">Jaunākie sižeti</div>
			<div class="last-scenes-rows clearfix">
				<?php foreach($last_scenes as $last_scene): ?>
					<?php
						parse_str( parse_url( $last_scene['youtube'], PHP_URL_QUERY ), $youtube );
						$youtube_id = $youtube['v'];
						$text = strlen($last_scene['text']) > 100 ? substr($last_scene['text'],0,100)."..." : $last_scene['text'];
					?>
					<div class="last-scenes-row">
						<div class="row-image"><a href="/?c=scene&id=<?php echo $last_scene['ID'];?>"><img src="https://img.youtube.com/vi/<?php echo $youtube_id;?>/mqdefault.jpg"></a></div>
						<div class="row-middle">
							<div class="row-title"><?php echo $last_scene['title'];?></div>
							<div class="row-text"><?php echo $text;?></div>
							<div class="row-info">
								<a href="/?c=scene&id=<?php echo $last_scene['ID'];?>">lasīt vairāk...</a>
								<span>pievienots: <?php echo date('d.m.y', $last_scene['timestamp']);?></span>
							</div>
						</div>
						<div class="row-bottom clearfix">
							<div class="left"><a href="/?c=scene&id=<?php echo $last_scene['ID'];?>"><span><?php echo $last_scene['comments_count'];?></span></a></div>
							<div class="right"><a target="_blank" href="<?php echo $last_scene['youtube'];?>">Youtube</a></div>
						</div>
					</div>
				<?php endforeach; ?>	
			</div>
		</div>

	<?php endif; ?>
</div>