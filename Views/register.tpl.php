<div class="type-register clr">
	<div class="title1">Reģistrācija</div>
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
	<?php if( empty($reg_form_status) ): ?>
	<form action="/?c=register" method="POST">
		<div class="form-item">
			<label for="form_name">Vārds</label>
			<input type="text" required id="form_name" name="name" value="<?php echo $_SESSION['reg_form_values']['name']; ?>">
		</div>
		<div class="form-item">
			<label for="form_surname">Uzvārds</label>
			<input type="text" required id="form_surname" name="surname" value="<?php echo $_SESSION['reg_form_values']['surname']; ?>">
		</div>
		<div class="form-item">
			<label for="form_email">E-pasts</label>
			<input type="email" required id="form_email" name="email" value="<?php echo $_SESSION['reg_form_values']['email']; ?>">
		</div>
		<div class="form-item">
			<label for="form_password">Parole</label>
			<input type="password" required id="form_password" name="password">
		</div>
		<div class="form-item">
			<label for="form_password_confirm">Apstipriniet paroli</label>
			<input type="password" required id="form_password_confirm" name="password_confirm">
		</div>
		<div class="form-actions">
			<input type="submit" value="Reģistrēties">
		</div>
	</form>
	<?php endif; ?>
</div>
