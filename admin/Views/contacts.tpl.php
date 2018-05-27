<div class="row contacts-type">
  <div class="col-12">
    <p>&nbsp;</p>
    <?php if($show_success): ?>
      <div class="alert alert-success" role="alert">
        Dati veiksmīgi saglabāti!
      </div>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="facebook">Facebook saite</label>
        <input type="text" class="form-control" id="facebook" name="facebook" required placeholder="Facebook saite" value="<?php echo $contacts['facebook'] ;?>">
      </div>
      <div class="form-group">
        <label for="youtube">Youtube saite</label>
        <input type="text" class="form-control" id="youtube" name="youtube" required placeholder="Youtube saite" value="<?php echo $contacts['youtube'] ;?>">
      </div>
      <div class="form-group">
        <label for="instagram">Instagram saite</label>
        <input type="text" class="form-control" id="instagram" name="instagram" required placeholder="Instagram saite" value="<?php echo $contacts['instagram'] ;?>">
      </div>
      <div class="form-group">
        <label for="latitude">Latitude (koordinates)</label>
        <input type="text" class="form-control" id="latitude" name="latitude" required placeholder="Latitude (koordinates)" value="<?php echo $contacts['latitude'] ;?>">
      </div>
      <div class="form-group">
        <label for="longitude">Longitude (koordinates)</label>
        <input type="text" class="form-control" id="longitude" name="longitude" required placeholder="Longitude (koordinates)" value="<?php echo $contacts['longitude'] ;?>">
      </div>
      <div class="form-group">
        <label for="email">E-pasts</label>
        <input type="email" class="form-control" id="email" name="email" required placeholder="E-pasts" value="<?php echo $contacts['email'] ;?>">
      </div>
      <div class="form-group">
        <label for="address">Adrese</label>
        <input type="text" class="form-control" id="address" name="address" required placeholder="Adrese" value="<?php echo $contacts['address'] ;?>">
      </div>
      <button type="submit" class="btn btn-primary">Saglabāt</button>
      <a href="/admin?c=main"><button type="button" class="btn btn-secondary">Atpakaļ</button></a>
    </form>
    </table>
	</div>
</div>
