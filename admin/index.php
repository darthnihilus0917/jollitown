
<?php
$appName = "Jollitown Reservation System";

function getPageParameter() {
    // Check if the 'page' parameter exists in the URL
    if (isset($_GET['page'])) {
        // Return the value of the 'page' parameter
        return $_GET['page'];
    } else {
        // Return a default value or null if 'page' parameter is not set
        return null;
    }
}
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <script src="https://getbootstrap.com/docs/5.3/assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Jollibee | <?php echo $appName; ?></title>
    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="icon" href="../assets/images/favicon.png" sizes="32x32" type="image/png">
    <link rel="icon" href="../assets/images/favicon.png" sizes="16x16" type="image/png">
    <link rel="icon" type="image/png" href="../assets/images/favicon.png" />
    <link rel="stylesheet" href="../assets/styles/admin.styles.css" />
    <meta name="theme-color" content="#712cf9">

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
  </head>
  <body>
    <?php include('includes/theme_icons.php'); ?>

    <?php include('includes/themes.php'); ?>
    
    <?php include('includes/icons.php'); ?>

<header class="navbar sticky-top bg-danger flex-md-nowrap p-0 shadow" data-bs-theme="dark">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#"><?php echo $appName; ?></a>

  <ul class="navbar-nav flex-row d-md-none">
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
        <svg class="bi"><use xlink:href="#search"/></svg>
      </button>
    </li>
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <svg class="bi"><use xlink:href="#list"/></svg>
      </button>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel"><?php echo $appName; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <?php include('includes/navigation.php'); ?>
      </div>
    </div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php
        $page = getPageParameter();
        switch($page) {
            case "users":
                include('pages/user.php');
                break;
            case "reservations":
                include('pages/reservation.php');
                break;
            default:
                include('pages/dashboard.php');
        }
        ?>
    </main>
  </div>
</div>
    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/dashboard.js"></script></body>
</html>
