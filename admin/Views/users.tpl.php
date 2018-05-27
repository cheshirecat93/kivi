<div class="row users-type">
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
          <th scope="col">Vārds</th>
          <th scope="col">Uzvārds</th>
          <th scope="col">E-pasts</th>
          <th scope="col">Statuss</th>
          <th scope="col">Loma</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach($users as $user): ?>
          <tr class="<?php echo ($user['ID'] ==  $is_login ? 'table-info' : '') ?>">
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['surname']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $statuses[$user['status']]; ?></td>
            <td><?php echo $roles[$user['role']]; ?></td>
            <td><a href="/admin?c=useredit&id=<?php echo $user['ID']; ?>">Rediģēt</a></td>
            <td>
              <?php if($user['ID'] !=  $is_login): ?>
                <a href="/admin?c=userdel&id=<?php echo $user['ID']; ?>">Dzēst</a>
              <?php endif; ?>
            </td>
          </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <p>&nbsp;</p>
    <a href="/admin?c=useradd"><button type="button" class="btn btn-success">Pievienot lietotāju</button></a>
	</div>
</div>
