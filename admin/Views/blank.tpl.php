<!doctype html>
<html lang="lv">
<head>
  <meta charset="utf-8">
  <title><?php echo $page_title; ?> | KIVI admin panelis</title>
  <meta name="description" content="KIVI admin panelis">
  <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body>
  <div class="container">
    <div class="row navigation-top">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="/">Mājaslapa</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item <?php echo ($cur_manu_id == 'main' ? 'active' : '') ?>">
                <a class="nav-link" href="/admin?c=main">Sākumlapa</a>
              </li>
              <?php if($login_user_role == 3 ): ?>
                <li class="nav-item <?php echo ($cur_manu_id == 'users' ? 'active' : '') ?>">
                  <a class="nav-link" href="/admin?c=users">Lietotāji</a>
                </li>
              <?php endif; ?>
              <?php if($login_user_role == 3 ): ?>
                <li class="nav-item <?php echo ($cur_manu_id == 'seasons' ? 'active' : '') ?>">
                  <a class="nav-link" href="/admin?c=seasons">Sezonas</a>
                </li>
              <?php endif; ?>
              <?php if($login_user_role == 3 || $login_user_role == 2 ): ?>
                <li class="nav-item <?php echo ($cur_manu_id == 'scenes' ? 'active' : '') ?>">
                  <a class="nav-link" href="/admin?c=scenes">Raidījuma sižeti</a>
                </li>
              <?php endif; ?>
              <?php if($login_user_role == 3 ): ?>
                <li class="nav-item <?php echo ($cur_manu_id == 'members' ? 'active' : '') ?>">
                  <a class="nav-link" href="/admin?c=members">Biedri</a>
                </li>
              <?php endif; ?>
              <?php if($login_user_role == 3 || $login_user_role == 2 ): ?>
                <li class="nav-item <?php echo ($cur_manu_id == 'gallery' ? 'active' : '') ?>">
                  <a class="nav-link" href="/admin?c=gallery">Foto</a>
                </li>
              <?php endif; ?>
              <?php if($login_user_role == 3 ): ?>
                <li class="nav-item <?php echo ($cur_manu_id == 'friends' ? 'active' : '') ?>">
                  <a class="nav-link" href="/admin?c=friends">Draugi</a>
                </li>
              <?php endif; ?>
              <?php if($login_user_role == 3 ): ?>
                <li class="nav-item <?php echo ($cur_manu_id == 'about' ? 'active' : '') ?>">
                  <a class="nav-link" href="/admin?c=about">Par KIVI</a>
                </li>
              <?php endif; ?>
              <?php if($login_user_role == 3 ): ?>
                <li class="nav-item <?php echo ($cur_manu_id == 'contacts' ? 'active' : '') ?>">
                  <a class="nav-link" href="/admin?c=contacts">Kontakti</a>
                </li>
              <?php endif; ?>

            </ul>

            <a href="/admin?c=logout"><button type="button" class="btn btn-danger">Iziet</button></a>
          </div>
        </nav>
      </div>
    </div>

    <?php echo $body; ?>

  </div>


  <script src="lib/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>
</body>
</html>
