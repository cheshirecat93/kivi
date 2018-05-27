<div class="type-scenes clr">


		<div class="all-scenes-container">
			<div class="all-scenes-titles clearfix">
				<div class="title1">Raidījuma sižeti</div>
				<div class="title-black"><?php echo $season_name; ?></div>
			</div>
			<div class="alls-scenes-rows clearfix">
				<?php foreach($all_scenes as $scene): ?>
					<?php
						parse_str( parse_url( $scene['youtube'], PHP_URL_QUERY ), $youtube );
						$youtube_id = $youtube['v'];
						$text = strlen($scene['text']) > 100 ? substr($scene['text'],0,100)."..." : $scene['text'];
					?>
					<div class="alls-scenes-row">
						<div class="row-image"><a href="/?c=scene&id=<?php echo $scene['ID'];?>"><img src="https://img.youtube.com/vi/<?php echo $youtube_id;?>/mqdefault.jpg"></a></div>
						<div class="row-middle">
							<div class="row-title"><?php echo $scene['title'];?></div>
							<div class="row-text"><?php echo $text;?></div>
							<div class="row-info rating-counter clearfix">
								<div class="raty" data-score="<?php echo $scene['rating']; ?>"></div>
								<div class="counter">skatijumi: <?php echo $scene['counter']; ?></div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>	
			</div>
		</div>

</div>