<div class="row seasons-type">
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
        <?php foreach($seasons as $season): ?>
          <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $season['name']; ?></td>
            <td><a href="/admin?c=seasonedit&id=<?php echo $season['ID']; ?>">Rediģēt</a></td>
            <td><a href="/admin?c=seasondel&id=<?php echo $season['ID']; ?>">Dzēst</a></td>
          </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <p>&nbsp;</p>
    <a href="/admin?c=seasonadd"><button type="button" class="btn btn-success">Pievienot sezonu</button></a>
	</div>
</div>
