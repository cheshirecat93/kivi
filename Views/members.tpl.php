<div class="type-members clr">


		<div class="all-members-container">
			<div class="all-members-titles clearfix">
				<div class="title1">Biedri</div>
				<div class="title-black"><?php echo $season_name; ?></div>
			</div>
			<div class="alls-members-rows clearfix">
				<?php foreach($all_members as $member): ?>
					<div class="alls-members-row">
						<div class="row-image"><img src="/files/members/<?php echo $member['image'];?>"></div>
						<div class="row-name"><?php echo $member['name'];?></div>
						<div class="row-description"><?php echo $member['description'];?></div>
					</div>
				<?php endforeach; ?>	
			</div>
		</div>

</div>