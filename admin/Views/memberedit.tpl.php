<div class="row memberedit-type">
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
    <form method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label for="title">Bilde</label>
        <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png">
        <img id="image-preview" width="200px" src="/files/members/<?php echo $member['image'] ;?>" />
      </div>
      <div class="form-group">
        <label for="name">Vārds, Uzvārds</label>
        <input type="text" class="form-control" id="name" name="name" required placeholder="Vārds, Uzvārds" value="<?php echo $member['name'] ;?>">
      </div>
      <div class="form-group">
        <label for="text">Apraksts</label>
        <textarea class="form-control" id="description" name="description" required placeholder="Apraksts"><?php echo $member['description'] ;?></textarea>
      </div>
      <div class="form-group">
        <label for="season_id">Sezona</label>
        <select class="form-control" id="season_id" name="season_id" required>
          <?php foreach($seasons as $season): ?>
            <option value="<?php echo $season['ID']; ?>" <?php echo ($season['ID'] == $member['season_id'] ? 'selected="selected"' : '') ?>><?php echo $season['name']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Saglabāt</button>
      <a href="/admin?c=members"><button type="button" class="btn btn-secondary">Atpakaļ</button></a>
    </form>
    </table>
	</div>
</div>
