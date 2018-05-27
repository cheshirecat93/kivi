<div class="row seasonadd-type">
  <div class="col-12">
    <p>&nbsp;</p>
    <?php if($show_success): ?>
      <div class="alert alert-success" role="alert">
        Sezons izveidots!
      </div>
    <?php endif; ?>
    <?php if($reg_form_errors): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $reg_form_errors; ?>
      </div>
    <?php endif; ?>
    <form method="POST">
      <div class="form-group">
        <label for="name">Nosaukums</label>
        <input type="text" class="form-control" id="name" name="name" required placeholder="Nosaukums" value="<?php echo $season_add_form_values['name']; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Izveidot</button>
      <a href="/admin?c=seasons"><button type="button" class="btn btn-secondary">Atpakaļ</button></a>
    </form>
    </table>
	</div>
</div>
