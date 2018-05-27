<div class="row useradd-type">
  <div class="col-12">
    <p>&nbsp;</p>
    <?php if($show_success): ?>
      <div class="alert alert-success" role="alert">
        Lietotājs izveidots!
      </div>
    <?php endif; ?>
    <?php if($show_error1): ?>
      <div class="alert alert-danger" role="alert">
        Paroles nesakrit!
      </div>
    <?php endif; ?>
    <?php if($show_error2): ?>
      <div class="alert alert-danger" role="alert">
        Lietotājs ar šadu e-pastu jau reģistrēts!
      </div>
    <?php endif; ?>
    <?php if($reg_form_errors): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $reg_form_errors; ?>
      </div>
    <?php endif; ?>
    <form method="POST">
      <div class="form-group">
        <label for="name">Vārds</label>
        <input type="text" class="form-control" id="name" name="name" required placeholder="Vārds" value="<?php echo $user_add_form_values['name']; ?>">
      </div>
      <div class="form-group">
        <label for="surname">Uzvārds</label>
        <input type="text" class="form-control" id="surname" name="surname" required placeholder="Uzvārds" value="<?php echo $user_add_form_values['surname']; ?>">
      </div>
      <div class="form-group">
        <label for="email">E-pasts</label>
        <input type="email" class="form-control" id="email" name="email" required placeholder="E-pasts" value="<?php echo $user_add_form_values['email']; ?>">
      </div>
      <div class="form-group">
        <label for="password">Parole</label>
        <input type="password" class="form-control" id="password" name="password" required placeholder="Parole">
      </div>
      <div class="form-group">
        <label for="password2">Apstipriniet paroli</label>
        <input type="password" class="form-control" id="password2" name="password2" required placeholder="Apstipriniet paroli">
      </div>
      <div class="form-group">
        <label for="role">Loma</label>
        <select class="form-control" id="role" name="role" required>
          <option value="1" <?php echo ($user_add_form_values['role'] == 1 ? 'selected="selected"' : '') ?>>Reģistrēts lietotājs</option>
          <option value="2" <?php echo ($user_add_form_values['role'] == 2 ? 'selected="selected"' : '') ?>>Moderators</option>
          <option value="3" <?php echo ($user_add_form_values['role'] == 3 ? 'selected="selected"' : '') ?>>Admins</option>
        </select>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="status" id="status" <?php echo ($user_add_form_values['status'] == 1 ? 'checked' : '') ?>>
        <label class="form-check-label" for="status">Aktīvs</label>
      </div>
      <button type="submit" class="btn btn-primary">Izveidot</button>
      <a href="/admin?c=users"><button type="button" class="btn btn-secondary">Atpakaļ</button></a>
    </form>
    </table>
	</div>
</div>
