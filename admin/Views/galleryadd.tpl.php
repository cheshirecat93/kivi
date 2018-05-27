<div class="row galleryadd-type">
  <div class="col-12">
    <p>&nbsp;</p>
    <?php if($show_success): ?>
      <div class="alert alert-success" role="alert">
        Foto izveidota!
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
        <input type="file" class="form-control" id="image" name="image" required accept=".jpg, .jpeg, .png">
        <img id="image-preview" width="200px" src="http://via.placeholder.com/200x150" />
      </div>
      <div class="form-group">
        <label for="name">Nosaukums</label>
        <input type="text" class="form-control" id="name" name="name" required placeholder="Nosaukums" value="<?php echo $gallery_add_form_values['name']; ?>">
      </div>
      <div class="form-group">
        <label for="text">Apraksts</label>
        <input type="text" class="form-control" id="description" name="description" required placeholder="Apraksts" value="<?php echo $gallery_add_form_values['description']; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Izveidot</button>
      <a href="/admin?c=gallery"><button type="button" class="btn btn-secondary">Atpakaļ</button></a>
    </form>
    </table>
	</div>
</div>
