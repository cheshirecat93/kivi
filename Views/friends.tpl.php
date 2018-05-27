<div class="type-friends clr">

		<div class="all-friends-container">
			<div class="title1">Draugi</div>
			<div class="alls-friends-rows clearfix">
				<?php foreach($all_friends as $friend): ?>
					<div class="alls-friends-row">
						<?php if( !empty($friend['url']) ): ?>
							<a href="<?php echo $friend['url'];?>" target="_blank">
						<?php endif; ?>
						<img src="/files/friends/<?php echo $friend['image'];?>">
						<?php if( !empty($friend['url']) ): ?>
							</a>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

</div>
