<div class="type-useredit clr">
	<div class="title1">Rediģēt profilu</div>
	<?php if( !empty($reg_form_errors) ): ?>
	  <div class="errors-list">
	  <?php foreach( $reg_form_errors as $error ): ?>
	  	<div class="error-item"><?php echo $error; ?></div>
	  <?php endforeach; ?>
	  </div>
	<?php endif; ?>
	<?php if( !empty($reg_form_status) ): ?>
	  <div class="status-list">
	  <?php foreach( $reg_form_status as $status ): ?>
	  	<div class="status-item"><?php echo $status; ?></div>
	  <?php endforeach; ?>
	  </div>
	<?php endif; ?>
	<form action="/?c=useredit" method="POST">
		<div class="form-item">
			<label for="form_name">Vārds</label>
			<input type="text" required id="form_name" name="name" value="<?php echo $current_user_data['name'] ?>">
		</div>
		<div class="form-item">
			<label for="form_surname">Uzvārds</label>
			<input type="text" required id="form_surname" name="surname" value="<?php echo $current_user_data['surname'] ?>">
		</div>
		<div class="form-item">
			<label for="form_email">E-pasts</label>
			<input type="email" required id="form_email" name="email" value="<?php echo $current_user_data['email'] ?>" disabled>
		</div>
		<div class="form-actions">
			<input type="submit" value="Saglabāt">
		</div>
	</form>

	<div class="after-form btn"><a href="/?c=userpassedit">Mainīt parole</a></div>
</div>
