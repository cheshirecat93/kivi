<div class="row friendedit-type">
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
        <img id="image-preview" width="200px" src="/files/friends/<?php echo $friend['image'] ;?>" />
      </div>
      <div class="form-group">
        <label for="name">Nosaukums</label>
        <input type="text" class="form-control" id="name" name="name" required placeholder="Nosaukums" value="<?php echo $friend['name'] ;?>">
      </div>
      <div class="form-group">
        <label for="url">Saite</label>
        <input type="text" class="form-control" id="url" name="url" required placeholder="Saite" value="<?php echo $friend['url'] ;?>">
      </div>
      <button type="submit" class="btn btn-primary">Saglabāt</button>
      <a href="/admin?c=friends"><button type="button" class="btn btn-secondary">Atpakaļ</button></a>
    </form>
    </table>
	</div>
</div>
