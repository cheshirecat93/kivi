<div class="row gallery-type">
  <div class="col-12">
    <p>&nbsp;</p>
    <?php if($seccess_msg): ?>
      <div class="alert alert-success" role="alert">
        <?php echo $seccess_msg; ?>
      </div>
    <?php endif; ?>
  	<table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nosaukums</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach($photos as $photo): ?>
          <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $photo['name']; ?></td>
            <td><a href="/admin?c=galleryedit&id=<?php echo $photo['ID']; ?>">Rediģēt</a></td>
            <td><a href="/admin?c=gallerydel&id=<?php echo $photo['ID']; ?>">Dzēst</a></td>
          </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <p>&nbsp;</p>
    <a href="/admin?c=galleryadd"><button type="button" class="btn btn-success">Pievienot foto</button></a>
	</div>
</div>
