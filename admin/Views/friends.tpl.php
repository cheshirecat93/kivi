<div class="row friends-type">
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
        <?php foreach($friends as $friend): ?>
          <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $friend['name']; ?></td>
            <td><a href="/admin?c=friendedit&id=<?php echo $friend['ID']; ?>">Rediģēt</a></td>
            <td><a href="/admin?c=frienddel&id=<?php echo $friend['ID']; ?>">Dzēst</a></td>
          </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <p>&nbsp;</p>
    <a href="/admin?c=friendadd"><button type="button" class="btn btn-success">Pievienot draugu</button></a>
	</div>
</div>
