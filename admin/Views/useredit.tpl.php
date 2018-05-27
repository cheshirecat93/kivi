<div class="row useredit-type">
  <div class="col-12">
    <p>&nbsp;</p>
    <?php if($show_success): ?>
      <div class="alert alert-success" role="alert">
        Dati veiksmīgi saglabāti!
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
        <input type="text" class="form-control" id="name" name="name" required placeholder="Vārds" value="<?php echo $user['name'] ;?>">
      </div>
      <div class="form-group">
        <label for="surname">Uzvārds</label>
        <input type="text" class="form-control" id="surname" name="surname" required placeholder="Uzvārds" value="<?php echo $user['surname'] ;?>">
      </div>
      <div class="form-group">
        <label for="email">E-pasts</label>
        <input type="email" class="form-control" id="email" name="email" required placeholder="E-pasts" value="<?php echo $user['email'] ;?>">
      </div>
      <div class="form-group">
        <label for="role">Loma</label>
        <select class="form-control" id="role" name="role" required>
          <option value="1" <?php echo ($user['role'] == 1 ? 'selected="selected"' : '') ?>>Reģistrēts lietotājs</option>
          <option value="2" <?php echo ($user['role'] == 2 ? 'selected="selected"' : '') ?>>Moderators</option>
          <option value="3" <?php echo ($user['role'] == 3 ? 'selected="selected"' : '') ?>>Admins</option>
        </select>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="status" id="status" <?php echo ($user['status'] == 1 ? 'checked' : '') ?>>
        <label class="form-check-label" for="status">Aktīvs</label>
      </div>
      <button type="submit" class="btn btn-primary">Saglabāt</button>
      <a href="/admin?c=users"><button type="button" class="btn btn-secondary">Atpakaļ</button></a>
    </form>
    </table>
	</div>
</div>
