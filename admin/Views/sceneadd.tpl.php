<div class="row sceneadd-type">
  <div class="col-12">
    <p>&nbsp;</p>
    <?php if($show_success): ?>
      <div class="alert alert-success" role="alert">
        Sižets izveidots!
      </div>
    <?php endif; ?>
    <?php if($reg_form_errors): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $reg_form_errors; ?>
      </div>
    <?php endif; ?>
    <form method="POST">
      <div class="form-group">
        <label for="title">Nosaukums</label>
        <input type="text" class="form-control" id="title" name="title" required placeholder="Nosaukums" value="<?php echo  $scene_add_form_values['title']; ?>">
      </div>
      <div class="form-group">
        <label for="youtube">YouTube links</label>
        <input type="text" class="form-control" id="youtube" name="youtube" required placeholder="YouTube links" value="<?php echo $scene_add_form_values['youtube']; ?>">
      </div>
      <div class="form-group">
        <label for="text">Teksts</label>
        <textarea class="form-control" id="text" name="text" required placeholder="Teksts"><?php echo $scene_add_form_values['text']; ?></textarea>
      </div>
      <div class="form-group">
        <label for="categories">Kategorijas</label>
        <input type="text" class="form-control" id="categories" name="categories" required placeholder="Kategorijas" value="<?php echo $scene_add_form_values['categories']; ?>">
      </div>
        <div class="form-group">
        <label for="rating">Reitings</label>
        <input type="number" min="1" max="5" class="form-control" id="rating" name="rating" required placeholder="Reitings" value="<?php echo $scene_add_form_values['rating']; ?>">
      </div>
      <div class="form-group">
        <label for="season_id">Sezona</label>
        <select class="form-control" id="season_id" name="season_id" required>
          <?php foreach($seasons as $season): ?>
            <option value="<?php echo $season['ID']; ?>" <?php echo ($season['ID'] == $scene_add_form_values ? 'selected="selected"' : '') ?>><?php echo $season['name']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Izveidot</button>
      <a href="/admin?c=scenes"><button type="button" class="btn btn-secondary">Atpakaļ</button></a>
    </form>
    </table>
	</div>
</div>
