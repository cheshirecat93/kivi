<div class="row scenes-type">
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
          <th scope="col">Sezona</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach($scenes as $scene): ?>
          <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $scene['title']; ?></td>
            <td><?php echo $scene['season_name']; ?></td>
            <td><a href="/admin?c=sceneedit&id=<?php echo $scene['ID']; ?>">Rediģēt</a></td>
            <td><a href="/admin?c=scenedel&id=<?php echo $scene['ID']; ?>">Dzēst</a></td>
          </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <p>&nbsp;</p>
    <a href="/admin?c=sceneadd"><button type="button" class="btn btn-success">Pievienot sižetu</button></a>
	</div>
</div>
