<div class="type-userpassedit clr">
	<div class="title1">Mainīt parole</div>
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
	<form action="/?c=userpassedit" method="POST">
		<div class="form-item">
			<label for="form_password">Parole</label>
			<input type="password" required id="form_password" name="password">
		</div>
		<div class="form-item">
			<label for="form_password_confirm">Jauna parole</label>
			<input type="password" required id="form_password_confirm" name="new_password">
		</div>
		<div class="form-item">
			<label for="form_password_confirm2">Jauna parole atkārtota</label>
			<input type="password" required id="form_password_confirm2" name="new_password2">
		</div>
		<div class="form-actions">
			<input type="submit" value="Saglabāt">
		</div>
	</form>

	<div class="after-form btn"><a href="/?c=useredit">Rediģēt profilu</a></div>
</div>
