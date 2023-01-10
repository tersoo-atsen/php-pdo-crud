<?php
require_once './views/includes/header.php';
require_once './autoload.php';
require_once './controllers/ProfileController.php';

$home = new ProfileController();
$pages = ['profile', 'update', 'delete', 'logout'];

if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {

  if (isset($_GET['page'])) {
    if (in_array($_GET['page'], $pages)) {
      $page = $_GET['page'];
      $home->index($page);
    } else {
      include('views/includes/404.php');
    }
  } else {
    $home->index('profile');
  }

  require_once './views/includes/footer.php';
} else if (isset($_GET['page']) && $_GET['page'] === 'register') {
  $home->index('register');
} else {
  $home->index('login');
}
