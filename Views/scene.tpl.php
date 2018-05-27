<div class="type-scene clr">
	<div class="title1">Raidījuma sižeti</div>
	<div class="season1"><?php echo $scene_data['season_name']; ?></div>
	<div class="middle-container clearfix">
		<div class="youtube-video">
			<iframe width="494" height="280" src="https://www.youtube.com/embed/<?php echo $scene_data['youtube_id']; ?>?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>
		<div class="right-block">
			<div class="title2"><?php echo $scene_data['title']; ?> <span><?php echo $scene_data['season_name']; ?></span></div>
			<div class="text1"><?php echo $scene_data['text']; ?></div>
			<div class="categories1">Atslēgas vārdi: <?php echo $scene_data['categories']; ?></div>
			<div class="rating-counter">
				<div class="raty" data-score="<?php echo $scene_data['rating']; ?>"></div>
				<div class="counter">skatijumi: <?php echo $scene_data['counter']; ?></div>
			</div>
		</div>
	</div>
	<div class="bottom-container clearfix">
		<div class="comments-block">
			<div class="comments-count">Komentāri: <?php echo $comments_count; ?></div>
			<?php if( $comments_count > 0): ?>
				<div class="comments-rows">
					<?php foreach( $comments_data as $comment): ?>
						<div class="comments-row clearfix">
							<div class="avatar"></div>
							<div class="right-comment">
								<div class="comment-name-surname"><?php echo $comment['user_name'].' '.$comment['user_surname']; ?>:<div class="comment-date"><?php echo date('d.m.Y', $comment['timestamp']); ?></div></div>
								<div class="comment-text"><?php echo $comment['text']; ?></div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<?php if( $comments_count > 5): ?>
					<div class="comments-pager">
						<?php
							$cur_page = 1;
							for( $i=0; $i < $comments_count; $i+=5 ){
								$cur_page_code = $cur_page - 1;
								$cur_link = '/?c=scene&id='.$_GET['id'].'&page='.$cur_page_code;
								$class = '';
								if( $comment_page == $cur_page_code ){
									$class = 'active';
								}
								echo '<a href="'.$cur_link.'" class="'.$class.'">'.$cur_page.'</a>';
								$cur_page++;
							}
						?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div class="comments-form-block">

			<?php if( $is_login ): ?>
				<form method="POST">

					<textarea required placeholder="Komentārs..." name="comment_text"></textarea>
					<input type="submit" value="Nosūtīt !">

				</form>

			<?php endif; ?>

		</div>
	</div>
</div>
