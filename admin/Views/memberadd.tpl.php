<div class="row memberadd-type">
  <div class="col-12">
    <p>&nbsp;</p>
    <?php if($show_success): ?>
      <div class="alert alert-success" role="alert">
        Biedrs izveidots!
      </div>
    <?php endif; ?>
    <?php if($reg_form_errors): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $reg_form_errors; ?>
      </div>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label for="title">Bilde</label>
        <input type="file" class="form-control" id="image" required name="image" accept=".jpg, .jpeg, .png">
        <img id="image-preview" width="200px" src="http://via.placeholder.com/200x150" />
      </div>
      <div class="form-group">
        <label for="name">Vārds, Uzvārds</label>
        <input type="text" class="form-control" id="name" name="name" required placeholder="Vārds, Uzvārds" value="<?php echo $member_add_form_values['name']; ?>">
      </div>
      <div class="form-group">
        <label for="text">Apraksts</label>
        <textarea class="form-control" id="description" name="description" required placeholder="Apraksts"><?php echo $member_add_form_values['description']; ?></textarea>
      </div>
      <div class="form-group">
        <label for="season_id">Sezona</label>
        <select class="form-control" id="season_id" name="season_id" required>
          <?php foreach($seasons as $season): ?>
            <option value="<?php echo $season['ID']; ?>" <?php echo ($season['ID'] == $member_add_form_values['season_id'] ? 'selected="selected"' : '') ?>><?php echo $season['name']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Izveidot</button>
      <a href="/admin?c=members"><button type="button" class="btn btn-secondary">Atpakaļ</button></a>
    </form>
    </table>
	</div>
</div>
