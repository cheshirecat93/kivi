<div class="type-gallery clr">

		<div class="all-gallery-container">
			<div class="title1">Foto</div>
			<div class="alls-gallery-rows clearfix">
				<?php foreach($all_images as $image): ?>
					<div class="alls-gallery-row">
						<a class="group1 cboxElement" href="/files/gallery/<?php echo $image['image'];?>" alt="<?php echo $image['description'];?>" title="<?php echo $image['name'];?>"><img src="/files/gallery/<?php echo $image['image'];?>"></a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

</div>
