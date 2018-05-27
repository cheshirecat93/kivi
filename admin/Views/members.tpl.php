<div class="row members-type">
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
          <th scope="col">Vārds, Uzvārds</th>
          <th scope="col">Sezona</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach($members as $member): ?>
          <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $member['name']; ?></td>
            <td><?php echo $member['season_name']; ?></td>
            <td><a href="/admin?c=memberedit&id=<?php echo $member['ID']; ?>">Rediģēt</a></td>
            <td><a href="/admin?c=memberdel&id=<?php echo $member['ID']; ?>">Dzēst</a></td>
          </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <p>&nbsp;</p>
    <a href="/admin?c=memberadd"><button type="button" class="btn btn-success">Pievienot biedru</button></a>
	</div>
</div>
