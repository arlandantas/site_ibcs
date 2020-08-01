<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title><?= isset($title) ? $title : 'IBCS - Admin' ?></title>
  <style>
    nav#menu h1 {
      text-align: center;
    }
    @media (min-width: 768px) {
      nav#menu #mobile {
        display: none;
      }
    }
    @media (max-width: 767px) {
      nav#menu #desktop {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-3" id="menu">
        <h1>IBCS</h1>
        <div id="desktop">
          <?php
          $menus = [
            [ 'href' => '/admin/users', 'name' => 'Usuários' ],
            [ 'href' => '/admin/programacoes', 'name' => 'Programações' ],
          ];
          ?>
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <?php foreach ($menus as $menu) { ?>
              <a class="nav-link <?= '/'.uri_string() == $menu['href'] ? 'active' : '' ?>" href="<?= $menu['href'] ?>" aria-selected="true"><?= $menu['name'] ?></a>
            <?php } ?>
          </div>
        </div>
        <div id="mobile">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <li class="nav-item dropdown">
            <?php foreach ($menus as $menu) { if ('/'.uri_string() == $menu['href']) { ?>
              <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <?= $menu['name'] ?>
              </a>
            <?php } } ?>
              <div class="dropdown-menu">
              <?php foreach ($menus as $menu) { ?>
                <a class="dropdown-item" href="<?= $menu['href'] ?>"><?= $menu['name'] ?></a>
              <?php } ?>
              </div>
            </li>
          </div>
        </div>
      </nav>
      <div class="col-md-9" id="content">