<div class="row about-type">
  <div class="col-12">
    <p>&nbsp;</p>
    <?php if($show_success): ?>
      <div class="alert alert-success" role="alert">
        Dati veiksmīgi saglabāti!
      </div>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label for="title">Bilde</label>
        <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png">
        <img id="image-preview" width="200px" src="/files/about/<?php echo $about['image'] ;?>" />
      </div>
      <div class="form-group">
        <label for="text">Teksts</label>
        <textarea class="form-control" id="text" name="text" required placeholder="Teksts"><?php echo $about['text'] ;?></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Saglabāt</button>
      <a href="/admin?c=main"><button type="button" class="btn btn-secondary">Atpakaļ</button></a>
    </form>
    </table>
	</div>
</div>
