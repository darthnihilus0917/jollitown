
<?php
$appName = "Jollitown Reservation System";

function getPageParameter() {
    return (isset($_GET['page'])) ? $_GET['page'] : null;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Jollibee | <?php echo $appName; ?></title>
    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="icon" href="../assets/images/favicon.png" sizes="32x32" type="image/png">
    <link rel="icon" href="../assets/images/favicon.png" sizes="16x16" type="image/png">
    <link rel="icon" type="image/png" href="../assets/images/favicon.png" />
    <link rel="stylesheet" href="../assets/scripts/datatables.css" />
    <link rel="stylesheet" href="../assets/scripts/datatables.min.css" />
    <link rel="stylesheet" href="../assets/styles/admin.styles.css" />

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
  </head>
  <body>
    <?php include('includes/icons.php'); ?>

<header class="navbar sticky-top bg-danger flex-md-nowrap p-0 shadow" data-bs-theme="light">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#"><?php echo $appName; ?></a>

  <ul class="navbar-nav flex-row d-md-none">
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
        <svg class="bi"><use xlink:href="#search"/></svg>
      </button>
    </li>
    <li class="nav-item text-nowrap">
      <button class="nav-link toggle-menu px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
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
            case "reports":
                include('pages/reports.php');
                break;            
            case "settings":
                include('pages/settings.php');
                break;            
            case "customers":
                include('pages/customers.php');
                break;            
            case "users":
                include('pages/user.php');
                break;
            case "reservations":
                include('pages/reservation.php');
                break;
            case "calendar":
                include('pages/calendar.php');
                break;                
            default:
                include('pages/dashboard.php');
        }
        ?>
    </main>
  </div>
</div>
    <script src="../assets/scripts/jquery-2.1.4.min.js"></script>
    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/scripts/datatables.js"></script>
    <script src="../assets/scripts/datatables.min.js"></script>
    <script src="../assets/scripts/fullcalendar-6.1.13/dist/index.global.min.js"></script>    
    <script src="../assets/scripts/admin.jollitown.js"></script>
</body>
</html>
